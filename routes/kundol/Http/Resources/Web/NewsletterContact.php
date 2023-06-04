<?php

namespace App\Http\Resources\Web;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsletterContact extends JsonResource
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
            'newslettercontact_id' => $this->id,
            'newslettercontact_name' => $this->name,
            'newslettercontact_email' => $this->email,
            'date' => date('d M,Y', strtotime($this->created_at)),
        ];
    }
}
