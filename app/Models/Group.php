<?php

namespace App\Models;

use App\Queries\GroupQuery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';
    protected $fillable = ['name'];

    public function permissions(): HasMany
    {
        return $this->hasMany(GroupPermission::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function newEloquentBuilder($query)
    {
        return new GroupQuery($query);
    }

}
