<?php

namespace Database\Factories\Domains\Contact\Models;

use Domains\Contact\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Domains\Contact\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'category' => $this->faker->randomElement(Contact::getCategories()),
            'subject' => $this->faker->sentence(3),
            'message' => $this->faker->paragraph(3),
            'status' => $this->faker->randomElement(Contact::getStatuses()),
        ];
    }

    /**
     * Indicate that the contact is new.
     */
    public function new(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'New',
        ]);
    }

    /**
     * Indicate that the contact is in progress.
     */
    public function inProgress(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'In Progress',
        ]);
    }

    /**
     * Indicate that the contact is resolved.
     */
    public function resolved(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'Resolved',
        ]);
    }

    /**
     * Indicate that the contact is closed.
     */
    public function closed(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'Closed',
        ]);
    }
}
