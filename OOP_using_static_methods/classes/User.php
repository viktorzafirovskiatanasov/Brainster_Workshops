<?php

namespace Workshops;

require_once __DIR__ . "/DB.php";

class User
{
    protected static $table = 'users';

    public static function all()
    {
        return DB::select(self::$table);
    }

    public static function find($id)
    {
        $user = DB::select(self::$table, $id);
        if ($user) {
            return $user[0];
        }

        return null;
    }
}
