<?php

namespace App\Http\Controllers;
use App\Models\Department;

class DepartmentController extends Controller
{

    public function findAll(){
        $departments = Department::all();
        if (!$departments->isEmpty()){
            $departments->load('employees');
            return response()->json(["data" => $departments, "message" => ""], 200);
        }
        return response()->json([],204);
    }

    public function findById($id){
        $department = Department::find($id);
        if ($department!=null){
            $department->load("employees");
            return response()->json(["data"=>$department,"message" => ""], 200);
        }
        return response()->json(["data" => [], "message" => "No department found with id ".$id], 404);
    }
}
