<?php

namespace App\Imports;

use App\Models\Department;
use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return  Employee::updateOrCreate(["email" => $row["email"]],$this->generatePayload($row));
    }

    public function generatePayload($row){
        $data = array([
            'name' => $row["name"],
            'manager' => $row["manager"],
            'username' => $row["username"],
            'email' => $row["email"],
            'department_id' => $this->matchDepartment($row["department"]),
            'phone_number' => $row['phone_number'],
            'address' => $row["address"],
            'is_active' => $this->generateEmployeeStatus($row),
    ]);
        return $data[0];
    }

    public static function matchDepartment($departmentName){
        $department = Department::where('department_name', $departmentName)->first();
        if ($department == null){
            return Department::first()->id;
        }
        return $department->id;
    }


    public function generateEmployeeStatus($dateStr)
    {
        $endDate = \DateTime::createFromFormat('Ymd', $dateStr['end_date'])->format('Y-m-d');
        $currentDate = new \DateTime('now');
        $currentDateFormatted = $currentDate->format('Y-m-d');
        return $endDate > $currentDateFormatted;
    }
}
