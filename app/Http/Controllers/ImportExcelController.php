<?php

namespace App\Http\Controllers;

use App\Imports\DepartmentImport;
use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelController extends Controller
{

    public function importCsv()
    {
        $filePath = "employees.xlsx";
        Excel::import(new DepartmentImport, $filePath);
        Excel::import(new EmployeeImport, $filePath);
        return response()->json(["message"=>"Data imported succesfully"], 200);
    }
}
