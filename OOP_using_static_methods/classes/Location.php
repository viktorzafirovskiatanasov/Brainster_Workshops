<?php

namespace Workshops;

require_once __DIR__ . "/DB.php";

class Location
{
    protected static $table = 'locations';

    public static function all()
    {
        return DB::select(self::$table);
    }
}
