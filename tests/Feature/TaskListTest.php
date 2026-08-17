<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskListTest extends TestCase
{
    use RefreshDatabase;

    public function test_task_index_shows_priority_styles_completed_status_and_edit_action(): void
    {
        Task::factory()->create([
            'task_name' => 'Ship report',
            'priority' => 'low',
            'completed' => true,
        ]);

        Task::factory()->create([
            'task_name' => 'Review plan',
            'priority' => 'medium',
            'completed' => false,
        ]);

        $response = $this->get('/tasks');

        $response->assertOk();
        $response->assertSee('priority-low');
        $response->assertSee('priority-medium');
        $response->assertSee('✓ Completed');
        $response->assertSee('Edit');
    }
}
