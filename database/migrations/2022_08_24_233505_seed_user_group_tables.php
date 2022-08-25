<?php

use App\Models\Group;
use App\Models\GroupPermission;
use App\Models\GroupPermissionType;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Why run seed via migration? We only want this running only once. artisan migrate:seed acts differently than
         * artisan migrate where it can be run multiple times.
         */

        /** @var Group $adminGroup */
        $adminGroup = Group::factory()->create(['name' => 'Admin']);
        $adminGroup->permissions()->create([
            'type' => GroupPermissionType::ADMIN
        ]);

        /** @var Group $userGroup */
        $userGroup = Group::factory()->create(['name' => 'User']);
        $userGroup->permissions()->create([
            'type' => GroupPermissionType::USER
        ]);

        /** @var Collection<int, User> $users */
        $users = User::factory(9)->create();
        foreach ($users as $k => $user) {
            if ($k < 3)
                $user->groups()->attach($adminGroup->id);

            if ($k % 3 === 0)
                $user->groups()->attach($userGroup->id);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::table('group_permissions')->truncate();
        \DB::table('group_user')->truncate();
        \DB::table('groups')->truncate();
        \DB::table('users')->truncate();
    }
};
