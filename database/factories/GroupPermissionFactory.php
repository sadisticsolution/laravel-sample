<?php

namespace Database\Factories;

use App\Models\GroupPermissionType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GroupPermission>
 */
class GroupPermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => fake()->randomElement(array_map(
                fn(GroupPermissionType $enum) => $enum->value,
                GroupPermissionType::cases()
            ))
        ];
    }
}
