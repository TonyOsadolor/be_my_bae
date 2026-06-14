<?php

namespace App\Enums;

enum AuditTrailEnum: string
{
    const LEVEL_INFO = 'info';
    const LEVEL_WARNING = 'warning';
    const LEVEL_CRITICAL = 'critical';
}
