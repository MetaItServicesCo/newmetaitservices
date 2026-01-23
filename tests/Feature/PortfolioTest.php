<?php

namespace Tests\Feature;

use App\Models\Portfolio;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PortfolioTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_user_can_view_portfolios_list()
    {
        $this->actingAs($this->user);

        Portfolio::factory()->count(3)->create();

        $response = $this->get(route('admin.portfolios.list'));

        $response->assertStatus(200);
        $response->assertViewHas('dataTable');
    }

    public function test_user_can_create_portfolio()
    {
        $this->actingAs($this->user);

        $data = [
            'category_id' => 1,
            'title' => 'Test Portfolio',
            'slug' => 'test-portfolio',
            'sub_title' => 'Test subtitle',
            'description' => 'Test description',
            'image_alt' => 'Test alt',
            'is_active' => true,
        ];

        $response = $this->post(route('admin.portfolios.store'), $data);

        $response->assertRedirect(route('admin.portfolios.list'));
        $this->assertDatabaseHas('portfolios', ['slug' => 'test-portfolio']);
    }

    public function test_user_can_update_portfolio()
    {
        $this->actingAs($this->user);

        $portfolio = Portfolio::factory()->create();

        $updatedData = [
            'category_id' => 1,
            'title' => 'Updated Portfolio',
            'slug' => 'updated-portfolio',
            'sub_title' => 'Updated subtitle',
            'description' => 'Updated description',
            'image_alt' => 'Updated alt',
            'is_active' => false,
        ];

        $response = $this->put(route('admin.portfolios.update', $portfolio), $updatedData);

        $response->assertRedirect(route('admin.portfolios.list'));
        $this->assertDatabaseHas('portfolios', ['slug' => 'updated-portfolio']);
    }

    public function test_user_can_delete_portfolio()
    {
        $this->actingAs($this->user);

        $portfolio = Portfolio::factory()->create();

        $response = $this->delete(route('admin.portfolios.destroy', $portfolio));

        $response->assertRedirect(route('admin.portfolios.list'));
        $this->assertDatabaseMissing('portfolios', ['id' => $portfolio->id]);
    }

    public function test_validation_fails_for_invalid_data()
    {
        $this->actingAs($this->user);

        $invalidData = [
            'category_id' => '',
            'title' => '',
            'slug' => '',
        ];

        $response = $this->post(route('admin.portfolios.store'), $invalidData);

        $response->assertSessionHasErrors(['category_id', 'title', 'slug']);
    }
}
