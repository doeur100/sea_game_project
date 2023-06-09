<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Competition extends Model
{
    use HasFactory;
    protected $fillable = [
        'time',
        'schedule_id',
        'venue_id'
    ];
   
    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class);
    }
    public function venue(): BelongsTo
    {
        return $this->belongsTo(Venue::class);
    }
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'competition_team')->withTimestamps();
    }
    public static function store($request, $id = null)
    {
        $teams = $request->only(['time','schedule_id','venue_id']);
        $teams = self::updateOrCreate(['id' => $id],$teams);
        $competition = request('teams');
        $teams->teams()->sync($competition);
        return $teams;
    }
}
