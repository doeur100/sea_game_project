<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Venue extends Model
{
    use HasFactory;
    protected $fillable = [
        'zone',
        'address',
    ];
    public static function store($request, $id = null)
    {
        $venue = $request->only(['zone','address']);
        $venue = self::updateOrCreate(['id' => $id],$venue);
        return $venue;
    }
    public function competition(): HasMany
    {
        return $this->hasMany(Competition::class);
    }
    public function ticket(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}
