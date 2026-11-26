<?php

namespace Tests\Feature;

use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;

    private function payload(array $over = []): array
    {
        return array_merge([
            'name' => 'Test Employee',
            'position' => 'Butcher',
            'salary' => 5000,
            'phone' => '01000000000',
            'hire_date' => '2024-01-15',
        ], $over);
    }

    public function test_dashboard_and_index_load(): void
    {
        $this->get('/')->assertOk();
        Employee::factory()->create(['name' => 'Listed Person']);
        $this->get('/employees')->assertOk()->assertSee('Listed Person');
    }

    public function test_store_validates_and_creates(): void
    {
        $this->post('/employees', [])->assertSessionHasErrors(['name', 'position', 'salary', 'phone', 'hire_date']);
        $this->post('/employees', $this->payload())->assertRedirect('/employees');
        $this->assertDatabaseHas('employees', ['name' => 'Test Employee', 'status' => 'active']);
    }

    public function test_show_edit_update(): void
    {
        $e = Employee::factory()->create();
        $this->get("/employees/{$e->id}")->assertOk();
        $this->get("/employees/{$e->id}/edit")->assertOk();
        $this->put("/employees/{$e->id}", $this->payload(['name' => 'Renamed']))->assertRedirect('/employees');
        $this->assertSame('Renamed', $e->fresh()->name);
    }

    public function test_destroy_is_soft_and_hides_from_index(): void
    {
        $e = Employee::factory()->create(['name' => 'To Remove']);
        $this->delete("/employees/{$e->id}")->assertRedirect('/employees');
        $this->assertSame('inactive', $e->fresh()->status);
        $this->get('/employees')->assertDontSee('To Remove');
    }
}
