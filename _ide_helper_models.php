<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Group
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\GroupPermission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\GroupFactory factory(...$parameters)
 * @method static \App\Queries\GroupQuery|Group newModelQuery()
 * @method static \App\Queries\GroupQuery|Group newQuery()
 * @method static \App\Queries\GroupQuery|Group query()
 * @method static \App\Queries\GroupQuery|Group whereCreatedAt($value)
 * @method static \App\Queries\GroupQuery|Group whereHasPermission(\App\Models\GroupPermissionType $type)
 * @method static \App\Queries\GroupQuery|Group whereId($value)
 * @method static \App\Queries\GroupQuery|Group whereName($value)
 * @method static \App\Queries\GroupQuery|Group whereUpdatedAt($value)
 */
	class Group extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\GroupPermission
 *
 * @property int $id
 * @property int $group_id
 * @property int $type
 * @method static \Database\Factories\GroupPermissionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupPermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupPermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupPermission query()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupPermission whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupPermission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupPermission whereType($value)
 */
	class GroupPermission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Group[] $groups
 * @property-read int|null $groups_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \App\Queries\UserQuery|User newModelQuery()
 * @method static \App\Queries\UserQuery|User newQuery()
 * @method static \App\Queries\UserQuery|User query()
 * @method static \App\Queries\UserQuery|User whereCreatedAt($value)
 * @method static \App\Queries\UserQuery|User whereEmail($value)
 * @method static \App\Queries\UserQuery|User whereEmailVerifiedAt($value)
 * @method static \App\Queries\UserQuery|User whereHasPermission(\App\Models\GroupPermissionType $type)
 * @method static \App\Queries\UserQuery|User whereId($value)
 * @method static \App\Queries\UserQuery|User whereName($value)
 * @method static \App\Queries\UserQuery|User wherePassword($value)
 * @method static \App\Queries\UserQuery|User whereRememberToken($value)
 * @method static \App\Queries\UserQuery|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

