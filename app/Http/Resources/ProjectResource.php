<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'name' => $this->name,
            'clas' => $this->clas,
            'address' => $this->address,
            'country' => $this->country->name,
            'state' => $this->state->name,
            'dob' => $this->dob,
            'language' => collect($this->language)->pluck('name')->implode(', '),
            'text' => $this->text,

        ];
    }
}
