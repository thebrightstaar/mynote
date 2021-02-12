<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Notes extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
        return [

        'id'                => $this->id,
        'user_id'           => $this->user_id,
        'title'             => $this->title,
        'content'           => $this->content,
        'prioity'           => $this->prioity,
        'photo'             => $this->photo,
        'created_at'        => $this->created_at->format('d/m/Y'),
        'updated_at'        => $this->updated_at->format('d/m/Y'),
      ];
    }
}
