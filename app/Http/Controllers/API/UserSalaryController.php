<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\UserInformation;
use App\Models\UserSalary;
use App\Http\Resources\UserSalaryResources;


class UserSalaryController extends Controller
{
    //
    public function index()
    {
        $UserSalary = UserSalary::latest()->get();
        return response()->json(['All User Salary Records', UserSalaryResources::collection($UserSalary)]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'user_id'=> 'required',
            'payslip_link' => 'required',
            'basic_salary' => 'required'
        ]);
    
        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $UserSalary = UserSalary::create($request->all());
        
        return response()->json(['Successfully Create Employee Salary Records.', new UserSalaryResources($UserSalary)]);
    }
    
    public function show($id)
    {
        $UserSalary = UserSalary::where('user_id', $id)->get();

        if (is_null($UserSalary)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json([UserSalaryResources::collection($UserSalary)]);
    }


}
