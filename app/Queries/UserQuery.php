<?php

namespace App\Queries;

use App\Models\GroupPermissionType;
use Illuminate\Database\Eloquent\Builder;

class UserQuery extends Builder
{

    public function whereHasPermission(GroupPermissionType $type): self
    {
        return $this->hasByNonDependentSubquery('groups', function (GroupQuery $query) use ($type) {
            $query->whereHasPermission($type);
        });
    }

}
