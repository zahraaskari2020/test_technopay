<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Order;
use App\Models\User;

class OrderFilterTest extends TestCase
{
    public function filter_status()
    {
        Order::factory()->create(['status' => 'in_progress']);
        Order::factory()->create(['status' => 'finished']);

        $response = $this->getJson('api/backoffice/orders?status=finished');

        $response->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment(['status' => 'finished']);
    }

    public function filter_user()
    {
        $user1 = User::factory()->create(['mobile' => '09111111111']);
        $user2 = User::factory()->create(['national code' => '1111111111']);
        Order::factory()->create(['user_id' => $user1->id]);
        Order::factory()->create(['user_id' => $user2->id]);

        $response = $this->getJson('api/backoffice/orders?mobile=09111111111');

        $response->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment(['user_id' => $user2->id]);
        $response = $this->getJson('api/backoffice/orders?national_code=1111111111');

        $response->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment(['user_id' => $user2->id]);
    }


    /** @test */
    public function filter_price()
    {
        Order::factory()->create(['price' => 100000]);
        Order::factory()->create(['price' => 80000]);

        $response = $this->getJson('api/backoffice/orders?price_from=90000');

        $response->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment(['price' => 100000]);
    }

}
