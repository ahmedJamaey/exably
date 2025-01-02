<?php

namespace App\Http\Resources\V1\PermissionResource;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PermissionResource extends JsonResource
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
            'Model' => $this->model,
            'Can' => $this->can,
            'Created' => $this->created_at->format('Y-m-d'),
            'Updated' => $this->updated_at->format('Y-m-d'),
        ];
    }
}
