<?php

namespace App\Enums;

enum StatusEnum: string
{
    const PENDING = 'pending';
    const CONFIRMED = 'confirmed';
    const ACCEPTED = 'accepted';
    const REJECTED = 'rejected';
}
