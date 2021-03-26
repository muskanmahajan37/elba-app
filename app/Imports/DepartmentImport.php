<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Department;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class DepartmentImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        if ($row["department_name"] !== null){
            return Department::updateOrCreate([
                "department_name" => $row["department_name"]
            ],$this->generatePayload($row));
     }
 }

    public function generatePayload($row){
        $data = array([
            'department_name' => $row["department_name"],
            'department_phone' => ImportHelpers::checkFieldNotNull($row["department_phone"]),
            'department_leader' => $row["department_leader"]
        ]);
        return $data[0];
    }
}
