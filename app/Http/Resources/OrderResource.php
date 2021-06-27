<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\UserResource;
use App\Http\Resources\ProductResource;
use App\User;
class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        
        return [
            'id' => $this->id,
            'product_id' => $this->product_id,
            'product_name' => $this->product_name,
            'description' => $this->description,
            'image' => $this->image,
            'user_id' => $this->user_id,
            'quantity' => $this->quantity,
            'order_id' => $this->order_id,
            'vendor_name' => User::find($this->vendor_id)->name,
            'user' =>  new UserResource( $this->user ),
            'product' =>  new ProductResource( $this->product ),
            'created_at' => $this->created_at->toFormattedDateString(),
            'updated_at' => $this->updated_at->toFormattedDateString(),

        ];
    }
}

