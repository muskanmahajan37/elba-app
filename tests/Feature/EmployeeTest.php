<?php

namespace Tests\Feature;

use App\Models\Employee;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use DatabaseMigrations;
    public function test_getAllEmployees()
    {
        $employees = Employee::factory()->count(3)->create();
        $this->json('GET' , 'api/employees', [], ['Accept' => 'application/json'])
            ->assertStatus(200);
        $emps = Employee::all();
        self::assertEquals(3,count($emps));
    }

    public function test_getEmployeeById()
    {
        $employee = Employee::factory()->create();
        $this->json('GET', 'api/employees/' . $employee->id, [], ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "data" => [
                    "name" => $employee->name,
                    "manager" => $employee->manager,
                    "email" => $employee->email,
                    "is_active" => $employee->is_active,
                ],
                "message" => ""
            ]);
    }

    public function test_noEmployeeFound(){
        $this->json('GET' , 'api/employees', [], ['Accept' => 'application/json'])
            ->assertStatus(204);
    }

    public function test_employeeByIdNotFound(){
        $id = 500;
        $this->json('GET', 'api/employees/' . $id, [], ['Accept' => 'application/json'])
            ->assertStatus(404)
            ->assertJson([
                "data" => [],
                "message" => "Employee with id:".$id . " not found!"
            ]);
    }

}
