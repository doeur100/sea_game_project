<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'country'
    ];
    public function competition()
    {
        return $this->belongsToMany(Competition::class, 'competition_team')->withTimestamps();
    }
    public static function store($request, $id = null)
    {
        $teams = $request->only(['name','country']);
        $teams = self::updateOrCreate(['id' => $id],$teams);
        return $teams;
    }
}
