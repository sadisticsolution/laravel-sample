This repo is to showcase some interesting laravel snippets that I have personally worked on in closed-source environments.

# Setup

Requirements: `docker`, `docker-compose`, port:8000

```bash
git clone git@github.com:sadisticsolution/laravel-sample.git
cd laravel-sample
docker-compose up -d
open localhost:8000
```

# Reuse of eloquent query snippets

For large applications with complex data objects, the database layer often gets saturated with duplicated code. This was a solution I employed in a closed source enterprise application where we leveraged eloquent query builder override in addition to joined eloquent relations.

See example at http://localhost:8000/sample01

```php
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
```

The logic to check if a user has a permission is the same as the check for whether a group has a permission. This reuse can propagate up to every relationship depending on how complex the database relationships is. By referencing the original query snippet, there is only one place that needs to be updated.

`hasByNonDependentSubquery` is provided by package `mpyw/eloquent-has-by-non-dependent-subquery`. This is to replace the default Eloquent Builder method `whereHas` which the raw query causes significant performance issues depending on database size.
