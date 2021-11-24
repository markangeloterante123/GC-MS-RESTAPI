<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserSalaryResources extends JsonResource
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
            'payslip_link'=>$this->payslip_link,
            'basic_salary'=>$this->basic_salary,
            'food_allowance'=>$this->food_allowance,
            'position_allowance'=>$this->position_allowance,
            'effective_date'=>$this->effective_date,
            'end_date'=>$this->end_date,
            'notes'=>$this->notes,
            'salaray_status'=>$this->salaray_status,
        ];
    }
}
