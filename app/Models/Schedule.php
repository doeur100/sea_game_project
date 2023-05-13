<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'event_id'
    ];
    public static function store($request, $id = null)
    {
        $schedules = $request->only(['date','event_id']);
        $schedules = self::updateOrCreate(['id' => $id],$schedules);
        return $schedules;
    }
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
    public function schedule(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }
    
}
