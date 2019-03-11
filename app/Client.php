<?php

namespace App;

class Client extends Model
{
    public static function getByIp($ip)
    {
        return static::where('ip', $ip)->firstOrFail();
    }
}
