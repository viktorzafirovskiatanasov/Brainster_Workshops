<?php

class User extends DB 
{
    private $query = [
                        'create' => 'INSERT INTO users(name, surname, email, location_id, joined) VALUES (:name, :surname, :email, :location_id, :joined)',
                        'read' => 'SELECT users.id, name, surname, email, location_id,location, joined FROM `users` JOIN locations ON locations.id = users.location_id',
                        'update' => 'UPDATE users SET name = :name, surname = :surname, email = :email, location_id = :location_id WHERE id = :id',
                        'delete' => 'DELETE FROM users WHERE id = :id'
                    ];


    public function __construct(){
        parent::__construct();
    }

    public function getAllUsers(){
        $pdo = $this->instance;
        
        $sql = $this->query['read'];
        
        $stmt = $pdo->query($sql);
        
        return $stmt->fetchAll();
    }

    public function getSingleUser($id){
        $pdo = $this->instance;
        
        $sql = $this->query['read'] . ' WHERE users.id = :id LIMIT 1';
        
        $stmt = $pdo->prepare($sql);

        $stmt->execute(['id' => $id]);

        return $stmt->fetch();
    }

    public function createUser(array $params){
        $pdo = $this->instance;
        
        $sql = $this->query['create'];

        $stmt = $pdo->prepare($sql);

        if($stmt->execute($params)){
            return '<h3 class="text-success">User created.</h3>';
        } else {
            return '<h3 class="text-danger">Somethig went wrong.</h3>';
        };
    }

    public function updateUser(array $params){
        $pdo = $this->instance;
        
        $sql = $this->query['update'];

        $stmt = $pdo->prepare($sql);

        if($stmt->execute($params)){
            return '<h3 class="text-success">User updated.</h3>';
        } else {
            return '<h3 class="text-danger">Somethig went wrong.</h3>';
        };
    }

    public function deleteUser($id){
        $pdo = $this->instance;
        
        $sql = $this->query['delete'];

        $stmt = $pdo->prepare($sql);

        if($stmt->execute(['id' => $id])){
              return '<h3 class="text-success">User deleted.</h3>';
        } else {
              return '<h3 class="text-danger">Somethig went wrong.</h3>'; 
        };
    }

}