<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'user_added', 'gamertag', 'xuid', 'ip', 'port'
    ];

    public function scopeLastHour($query) 
    {
        return $query->where('created_at', '>=', \Carbon\Carbon::now('EST')->subHour());
    }

    public function scopeLastDay($query) 
    {
        return $query->where('created_at', '>=', \Carbon\Carbon::now('EST')->yesterday());
    }

    public function scopeAddedBy($query, $username)
    {
    	return $query->where('user_added', '=', $username);
    }

    public function scopeGamertag($query, $gamertag)
    {
    	return $query->where('gamertag', '=', $gamertag);
    }

    public function scopeXUID($query, $xuid)
    {
    	return $query->where('xuid', '=', $xuid);
    }

    public function scopeIP($query, $ip)
    {
    	return $query->where('ip', '=', $ip);
    }
}
