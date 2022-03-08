<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
//        dd($this); # this is class can access the object content
        return [
            "id"=>$this->id,
            "title"=>$this->title,
            "description"=>$this->description,
//            "user"=> $this->user ? $this->user->name : null,
            "user"=> new UserResource($this->user)
        ];
    }
}
