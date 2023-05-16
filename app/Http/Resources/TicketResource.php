<?php

namespace App\Http\Resources;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'user'=>$this->user,
            'schedule'=>$this->schedule,
            'competitions' => CompetitiontResource::collection($this->schedule->competition),
            
        ];
    }
}
