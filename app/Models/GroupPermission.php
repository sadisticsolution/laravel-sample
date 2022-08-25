<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupPermission extends Model
{
    use HasFactory;

    protected $table = 'group_permissions';
    protected $fillable = ['type'];
    public $timestamps = false;

    protected function type(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => GroupPermissionType::tryFrom($value),
            set: fn ($value) => $value instanceof GroupPermissionType ? $value->value : $value
        );
    }

}
