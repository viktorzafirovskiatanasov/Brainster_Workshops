<?php

class QuestionSet {
    protected static $table = 'questions';

    public static function getAllQuestions($pdo = null){
        return DB::select(self::$table, null, $pdo);
    }

    public static function getLeveledQuestions($level, $pdo = null){
        $req['sql'] = 'SELECT * FROM ' . self::$table . ' WHERE level = :level ORDER BY RAND() LIMIT 5';
        $req['data'] = ['level' => $level];

        return DB::select(self::$table, $req, $pdo);
    }

    public static function getSingleQuestion($id, $pdo = null){
        $req['sql'] = 'SELECT * FROM ' . self::$table . ' WHERE id = :id LIMIT 1';
        $req['data'] = ['id' => $id];

        return DB::select(self::$table, $req, $pdo);
    }

    public static function query($sql, $params, $pdo = null){
        if(is_null($pdo)){
            $pdo = DB::connect();
        }

        $stmt = $pdo->prepare($sql);

        if($stmt->execute($params)){
            return 'Query successful.';
        } else {
            return 'Something went wrong';
        }
    }

    
    // public static function createNewQuestion($params, $pdo = null){
    //     if(is_null($pdo)){
    //         $pdo = DB::connect();
    //     }

    //     $sql = 'INSERT INTO ' . self::$table . ' (text, level, answer1, answer2, answer3, answer4, correct) VALUES (:text, :level, :answer1, :answer2, :answer3, :answer4, :correct)';

    //     $stmt = $pdo->prepare($sql);

    //     if($stmt->execute($params)){
    //         return 'New question created';
    //     } else {
    //         return 'Something went wrong';
    //     }
    // }

    // public static function updateQuestion($params, $pdo = null){
    //     if(is_null($pdo)){
    //         $pdo = DB::connect();
    //     }

    //     $sql = 'UPDATE ' . self::$table . ' SET text = :text, level = :level, answer1 = :answer1, answer2 = :answer2, answer3 = :answer3, answer4 = :answer4, correct = :correct WHERE id = :id';

    //     $stmt = $pdo->prepare($sql);

    //     if($stmt->execute($params)){
    //         return 'Question updated';
    //     } else {
    //         return 'Something went wrong';
    //     }
    // }

    // public static function deleteQuestion($id, $pdo = null){
    //     if(is_null($pdo)){
    //         $pdo = DB::connect();
    //     }

    //     $sql = 'DELET FROM ' . self::$table . ' WHERE id = :id';

    //     $stmt = $pdo->prepare($sql);

    //     if($stmt->execute(['id' => $id])){
    //         return 'Question deleted.';
    //     } else {
    //         return 'Something went wrong';
    //     }
    // }



}