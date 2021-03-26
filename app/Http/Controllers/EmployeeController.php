<?php
namespace App\Http\Controllers;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function findAll(){
        $employees = Employee::all();
        $employees->load('department');
        if(!$employees->isEmpty()){
            return response()->json(["data" => $employees],200);
        }
        return response()->json([], 204);
    }

    public function findById($id){
        $employee = Employee::find($id);
        if (!$employee == null) {
            $employee->load('department');
            return response()->json(["data" => $employee, "message" => ""], 200);
        }
        return response()->json([
            "data" => [],
            "message"=> "Employee with id:".$id . " not found!"],404);
    }
}
