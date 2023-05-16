<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'schedule_id',
        'venue_id'
    ];
    public static function store($request, $id = null)
    {
        $ticket = $request->only(['user_id','schedule_id','venue_id']);
        $ticket = self::updateOrCreate(['id' => $id],$ticket);
        return $ticket;
    }
    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class);
    }
    public function venue(): BelongsTo
    {
        return $this->belongsTo(Venue::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
