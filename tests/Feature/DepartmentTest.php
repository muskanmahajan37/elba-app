<?php

namespace Tests\Feature;

use App\Models\Department;
use Tests\TestCase;

class DepartmentTest extends TestCase
{
    public function test_noDepartmentFound()
    {
        $response = $this->get('/api/departments');
        $response->assertStatus(204);
    }

    public function test_getAllDepartments(){
        $departments = Department::factory()->count(4)->create();
        $this->json('GET', '/api/departments',[], ['Accept' => 'application/json'])
            ->assertStatus(200);
        self::assertEquals(4, count(Department::all()));
    }

    public function test_getSingleDepartment(){
        $department = Department::factory()->create();
        $this->json('GET', 'api/departments/' . $department->id, [], ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "data" => [
                    "department_name" => $department->department_name,
                    "department_leader" => $department->department_leader,
                    "department_phone" => $department->department_phone,
                ],
                "message" => ""
            ]);
    }

    public function test_departmentNotFound(){
        $id = 10;
        $this->json('GET', 'api/departments/' . $id, [], ['Accept' => 'application/json'])
            ->assertStatus(404)
            ->assertJson([
                "data" => [],
                "message" => "No department found with id ".$id
            ]);
    }
}
