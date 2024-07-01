<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class EmploiCandidatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // "id": 11,
        // "titre": "Titré par Ilyas",
        // "description": "Description fait par ilyas",
        // "created_at": "2024-07-01T11:07:34.000000Z",
        // "updated_at": "2024-07-01T11:07:51.000000Z",
        // "lieu": "Maroc, Berkane",
        // "employeur": 6
        return [
            'id'=>$this->resource->id,
            'titre'=>$this->resource->titre,
            'description'=>$this->resource->description,
            'lieu'=>$this->resource->lieu,
            'employeur'=> new UserResource(
                $this->resource->users
            ),
        ];
    }
}
