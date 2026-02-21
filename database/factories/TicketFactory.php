<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = fake()->randomElement(['new', 'in_progress', 'resolved']);

        return [
            'customer_id' => \App\Models\Customer::factory(),
            'subject' => fake()->sentence(4),
            'message' => fake()->paragraph(),
            'status' => $status,
            'responded_at' => $status !== 'new' ? fake()->dateTimeBetween('-1 week', 'now') : null,
        ];
    }
}
