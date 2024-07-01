<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\EmploiCandidatureResource;

class CandidatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // "id": 6,
        //     "candidat": 7,
        //     "emploi": 11,
        //     "cv": "uploads/OOix5gJCab8fET8pyPADauX0TmM3Yxk5zCYSSG93.pdf",
        return [
            "id" => $this->resource->id,
            "cv" => $this->resource->cv,
            "candidat" => new CandidatResource(
                $this->resource->candidats
            ),
            "emploi" => new EmploiCandidatureResource(
                $this->resource->emplois
            ),
        ];
    }
}
