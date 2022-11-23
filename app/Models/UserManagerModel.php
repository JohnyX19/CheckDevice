<?php

namespace App\Models;

use App\Models\DB\Database;

class UserManagerModel
{
    private $database;
    
    public function __construct(Database $database)
    {
        $this->database = $database;
    }
    
    
    public function getUser($userName)
    {
        $result = $this->database->queryOne('SELECT * FROM users WHERE user_name = ?', $userName);
        
        return $result;
    }
    
    public function getAllUsers($page, $onPage)
    {
        $result = $this->database->queryAll(
                'SELECT u.ID as user_id, user_name, company_id, company_name
                FROM users u
                LEFT JOIN company c ON c.ID = u.company_id LIMIT ?, ?', ($page - 1) * $onPage, $onPage
                );
        return $result;
    }
    
    public function getCountAllUsers()
    {
        $result = $this->database->querySingle(
                'SELECT COUNT(*) FROM users'
                );
        return $result;
    }
    
    public function insertUser($userName, $comapnyId)
    {
        $result = $this->database->query(
                'INSERT INTO users(user_name, user_password, role_id, company_id) VALUES (?, 123, 2, ?)',$userName, $comapnyId
                );

        return $result; 
    }
    
    public function deleteUser($userId)
    {
        $result = $this->database->query(
                'DELETE FROM users WHERE ID = ?',$userId
                );

        return $result; 
    }
    
    public function getAllCompany()
    {
        $result = $this->database->queryAll('SELECT * FROM company');
        return $result;
    }
    
    public function changePassword($id, $password)
    {
        $result = $this->database->query(
                'UPDATE users SET user_password = ? WHERE ID = ?',$password, $id
                );

        return $result; 
    }
}