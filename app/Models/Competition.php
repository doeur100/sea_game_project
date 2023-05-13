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
    public static function store($request, $id = null)
    {
        $competions = $request->only(['time','schedule_id','venue_id']);
        $competions = self::updateOrCreate(['id' => $id],$competions);
        return $competions;
    }
    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class);
    }
   

}
