<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserInformationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'user_id'=>$this->user_id,
            'gc_id' => $this->gc_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'middle_name' => $this->middle_name,
            'profile' => $this->profile,
            'birthday' => $this->birthday,
            'gender'=> $this->gender,
            'marital_status' => $this->marital_status,
            'spouce_work' => $this->spouce_work,
            'spouce_name' => $this->spouce_name,
            'spouce_birthdate' => $this->spouce_birthdate,
            'no_children' => $this->no_children,
            'personal_email' => $this->personal_email,
            'phone_no' => $this->phone_no,
            'cel_no' => $this->cel_no,
            'address_1' => $this->address_1,
            'address_2' => $this->address_2,
            'emergency_name' => $this->emergency_name,
            'emergency_relation' => $this->emergency_relation,
            'emergency_contact' => $this->emergency_contact,
            'work_email' => $this->work_email,
            'position' => $this->position,
            'level' => $this->level,
            'team_id' => $this->team_id,
            '404_records_link'=>$this->records_link,
            'pay_slip_link' => $this->pay_slip_link,
            'salary'=>$this->salary,
            'date_hired'=>$this->date_hired,
            'date_end'=>$this->date_end,
            'contract_status'=>$this->contract_status
        ];
    }
}
