<?php

namespace App\Traits;

use App\Models\User;
use App\Models\AuditTrail;
use App\Enums\AuditTrailEnum;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

trait AuditTrailTrait
{
    // declare use2FA property
    protected $use2FA = false;

    /**
     * Create a static boot method to listen for model events
     * and log the changes to the database using the AppLog model
     * @return void
     */
    public static function bootAuditTrailTrait()
    {
        // When a Model Record is Created
        static::created(function ($model) {
            // Move the logic inside the closure!
            $use2FA = request()->has('twofa_otp');
            $model->logAuditTrail($model, 'created', [], $model->toArray(), $use2FA, AuditTrailEnum::LEVEL_INFO);
        });

        static::updated(function ($model) {
            $use2FA = request()->has('twofa_otp');
            $model->logAuditTrail($model, 'updated', $model->getOriginal(), $model->getDirty(), $use2FA, AuditTrailEnum::LEVEL_WARNING);
        });

        static::deleted(function ($model) {
            $use2FA = request()->has('twofa_otp');
            $model->logAuditTrail($model, 'deleted', $model->getOriginal(), [], $use2FA, AuditTrailEnum::LEVEL_CRITICAL);
        });
    }

    /**
     * Store the Audit Trail Log Data
     * @param Model $model
     * @param string $action
     * @param array $oldData
     * @param array $newData
     * @param bool $use2FA
     * @param string $level
     * 
     * @return void
     */
    protected function logAuditTrail($model, string $action, array $oldData = [], array $newData = [], bool $use2FA = false, string $level = AuditTrailEnum::LEVEL_INFO): void
    {
        $user = $this->getUser();
        $userId = $user ? $user->id : null;

        // Perform Action
        try {
            AuditTrail::create([
                'loggable_type' => get_class($model),
                'loggable_id' => $model->id,
                'user_id' => $userId,
                'before' => !in_array($action, ['updated', 'deleted']) ? $oldData : null,
                'after' => in_array($action, ['created', 'updated']) ? $newData : null,
                'ip_address' => request()->ip(),
                'user_agent' => request()->header('User-Agent'),
                'location' => $this->getUserLocation(request()->ip()),
                'used_otp' => $use2FA,
                'action' => $action,
                'level' => $level,
                'description' => $this->getDescription($model, $action),
                'tags' => [$action, "Model ID: " . $model->id, "User ID: " . $userId],
            ]);
        } catch (\Exception $e) {
            // Handle any exceptions that may occur during logging
            Log::error("Failed to log audit trail: " . $e->getMessage());
        }
    }

    /**
     * Implement get Location
     */
    private function getUserLocation()
    {
        // IP parameter can be used here for location lookup in the future
        return null;
    }

    /**
     * Generate Description for Logs
     */
    private function getDescription(Model $model, string $action)
    {
        $modelName = class_basename($model);

        $descriptions = $this->getModelDescriptions($modelName, $model);
        $baseDescription = $descriptions[$action] ?? "performed an action on a record";

        $description = "{$baseDescription}";

        return $description;
    }

    /**
     * Get user-friendly descriptions for different models
     */
    private function getModelDescriptions(string $modelName, Model $model): array
    {
        // User
        $user = $this->getUser();
        $userName = $user ? $user->username : ($user ? $user->full_name : 'System User');
        $statusInfo = $this->getStatusInfo($model);
        $statusText = $statusInfo ? " (Status: {$statusInfo})" : '';

        $modelDescriptions = [
            'User' => [
                'created' => "{$userName} created a new user account for: {$model->full_name}",
                'updated' => "{$userName} updated a user account for: {$model->full_name}",
                'deleted' => "{$userName} deleted a user account for: {$model->full_name}",
            ],
            'Proposal' => [
                'created' => "{$userName} added a new proposal: {$model->name}",
                'updated' => "{$userName} updated proposal details for: {$model->name}",
                'deleted' => "{$userName} removed a proposal: {$model->name}",
            ],
        ];

        return $modelDescriptions[$modelName] ?? [
            'created' => 'created a new record',
            'updated' => 'updated a record',
            'deleted' => 'deleted a record',
        ];
    }

    /**
     * Extract and format status information from model
     */
    private function getStatusInfo(Model $model): ?string
    {
        $statusFields = ['status', 'is_active'];

        foreach ($statusFields as $field) {
            if ($model->hasAttribute($field)) {
                $status = $model->getAttribute($field);
                if ($status) {
                    return ucfirst(str_replace('_', ' ', $status));
                }
            }
        }

        return null;
    }

    /**
     * Get the default user or default to system user
     * @return User|null
     */
    protected function getUser(): User|null
    {
        $user = Auth::user();
        if (!$user) {
            $systemUser = \App\Models\User::where('email', 'systemuser@' . config('app.domain'))->first();
            return $systemUser ? $systemUser : null;
        }

        return $user ?? null;
    }
}
