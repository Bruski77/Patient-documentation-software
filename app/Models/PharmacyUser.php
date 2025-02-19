<?php

namespace App\Models;

use App\Enums\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;


class PharmacyUser extends Pivot
{
    protected function casts(): array
    {
        return [
            'role' => Role::class
        ];
    }
}
