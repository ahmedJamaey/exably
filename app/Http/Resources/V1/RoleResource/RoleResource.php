<?php

namespace App\Http\Resources\V1\RoleResource;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Name' => $this->name,
            'Unique-name' => $this->slug,
            'Description' => $this->description,
            'Created' => $this->created_at->format('Y-m-d'),
            'Updated' => $this->updated_at->format('Y-m-d'),
        ];
    }
}
