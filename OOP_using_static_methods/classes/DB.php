<?php

namespace Workshops;

class DB
{
    private static $instance = null;

    public function __construct()
    {
        try {
            self::$instance = new \PDO("mysql:host=localhost;dbname=workshop", "guest", "guest");
        } catch (\PDOException $e) {
            echo "Database down";
            die();
        }
    }


    public static function connect()
    {
        if (is_null(self::$instance)) {
            new self();
        }

        return self::$instance;
    }

    public static function select($table, $id = null)
    {
        $pdo = self::connect();

        $data = [];
        if (is_null($id)) {
            $sql = "SELECT * FROM {$table}";
        } else {
            $sql = "SELECT * FROM {$table} WHERE id = :id";
            $data['id'] = $id;
        }

        $stmt = $pdo->prepare($sql);

        $stmt->execute($data);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
