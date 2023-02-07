<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
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
            'slug'=>$this->slug,
            'brand_id'=>$this->brand_id,
            'cate_id'=>$this->cate_id,
            'rate'=>$this->rate,
            's_disc'=>$this->s_disc,
            'disc'=>$this->disc,
            'o_price'=>$this->o_price,
            's_price'=>$this->s_price,
            'image'=>$this->image,
            'dis'=>$this->dis,
            'qty'=>$this->qty,
            'tax'=>$this->tax,
            'status'=>$this->status,
            'trending'=>$this->trending,
            'meta_title'=>$this->meta_title,
            'meta_disc'=>$this->meta_disc,
            'meta_keywords'=>$this->meta_keywords,
        ];
    }
}
