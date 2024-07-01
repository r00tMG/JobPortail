<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class EmploisResource extends JsonResource
{
    public static $wrap = 'emplois';
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
    //     "id": 3,
    // "titre": "Titre1",
    // "description": "Description1",
    // "created_at": "2024-06-26T15:47:46.000000Z",
    // "updated_at": "2024-06-26T23:00:13.000000Z",
    // "lieu": "lieu1",
    // "employeur": 2
        return [
            "id" => $this->resource->id,
            "titre" => $this->resource->titre,
            "description" => $this->resource->description,
            "lieu" => $this->resource->lieu,
            "employeur" => new UserResource(
                $this->resource->users
            )
        ];
    }
}
