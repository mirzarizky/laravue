<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FormulaResource extends JsonResource
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
            'uuid'                         => $this->uuid,
            'skin_type' => [
                'name'                     => $this->skinType->name,
                'solution'                 => $this->skinType->solution,
                'ingredients_text'         => $this->skinType->ingredients_text,
                'products_guideline'       => $this->skinType->products_guideline,
                'illustration_image_url'   => $this->skinType->image_asset_url,
                'skintype_table_image_url' => $this->skinType->skintypes_table_image_asset_url,
                'ingredients_image_url'    => $this->skinType->ingredients_image_asset_url,
            ],
            // @phpstan-ignore-next-line
            'has_nps_score'               => $this->npsScore()->exists(),
        ];
    }
}
