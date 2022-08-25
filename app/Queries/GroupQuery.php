<?php

namespace App\Queries;

use App\Models\GroupPermissionType;
use Illuminate\Database\Eloquent\Builder;

class GroupQuery extends Builder
{

    public function whereHasPermission(GroupPermissionType $type): self
    {
        return $this->hasByNonDependentSubquery('permissions', function (Builder $query) use ($type) {
            $query->where('type', '=', $type->value);
        });
    }

}
