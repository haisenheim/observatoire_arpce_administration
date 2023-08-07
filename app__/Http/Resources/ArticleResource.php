<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            'id'=>$this->id,
            'name'=>$this->name,
            'body'=>$this->body,
            'photo'=>$this->photo,
            'category'=>new CategoryResource($this->category),
            'tags'=>$this->tags,
            'created'=>$this->created,
            'user'=>$this->user,
            'fichier'=>$this->fichier
        ];
    }
}
