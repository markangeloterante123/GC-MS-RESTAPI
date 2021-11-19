<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\UserInformation;
use App\Http\Resources\UserInformationResource;

class UserInformationController extends Controller
{
    //
    public function index()
    {
        $UserInformation = UserInformation::latest()->get();
        return response()->json(['All User Informations.', UserInformationResource::collection($UserInformation)]);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'user_id'=> 'required',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_hired' => 'required',
            'contract_status'=> 'required'
        ]);
    
        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $UserInformation = UserInformation::create($request->all());
        
        return response()->json(['Successfully Create Employee Records.', new UserInformationResource($UserInformation)]);
    }

    public function show($id)
    {
        $UserInformation = UserInformation::find($id);
        if (is_null($UserInformation)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json([new UserInformationResource($UserInformation)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserInformation $UserInformation, $id)
    {
        $UserInformation = UserInformation::find($id);
        if (is_null($UserInformation)) {
            return response()->json('Data not found', 404); 
        }

        $UserInformation->update($request->all());   
        return response()->json(['Program updated successfully.', new UserInformationResource($UserInformation)]);
    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(UserInformation $UserInformation, $id)
    {
        $UserInformation = UserInformation::find($id);
        if (is_null($UserInformation)) {
            return response()->json('Data not found', 404); 
        }

        $UserInformation->delete();
        return response()->json('User Information deleted successfully');
    }

    public function search(Request $request, $name)
    {
        $UserInformation = UserInformation::query()
            ->where('first_name','like','%'.$name.'%')
            ->orWhere('last_name','like', '%'.$name.'%')
            ->orWhere('gc_id','like','%'.$name.'%')
            ->orWhere('gc_id','like','%'.$name.'%')
            ->orWhere('personal_email','like','%'.$name.'%')
            ->orWhere('contract_status','like','%'.$name.'%')
            ->orWhere('contract_status','like','%'.$name.'%')
            ->orWhere('position','like','%'.$name.'%')
            ->get();
        return response()->json(['results', UserInformationResource::collection($UserInformation)]);
    }


}
