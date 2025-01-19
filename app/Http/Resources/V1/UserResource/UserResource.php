<?php

namespace App\Http\Resources\V1\UserResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'Name' => $this->name,
            'E-mail' => $this->email,
            'Gender' => $this->gender,
            'Number' => $this->mobile_number,
            'Created' => $this->created_at->format('Y-m-d'),
            'Updated' => $this->updated_at->format('Y-m-d'),
        ];
    }
}
