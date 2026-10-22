<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminUsageChartTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_usage_chart_for_each_period(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
        $periodLabels = [
            'daily' => 'Harian',
            'weekly' => 'Mingguan',
            'monthly' => 'Bulanan',
        ];

        foreach ($periodLabels as $period => $label) {
            $this->actingAs($admin)
                ->get(route('admin.index', ['periode' => $period]))
                ->assertOk()
                ->assertSee('Grafik Penggunaan Web')
                ->assertSee($label);
        }

        $this->assertDatabaseCount('page_visits', 3);
    }
}
