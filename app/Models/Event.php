<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'typeOfSport',
        'description',
    ];
    public static function store($request, $id = null)
    {
        $events = $request->only(['typeOfSport','description']);
        $events = self::updateOrCreate(['id' => $id],$events);
        return $events;
    }
    public function event(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
