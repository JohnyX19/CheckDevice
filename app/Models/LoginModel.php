<?php

namespace App\Models;

use App\Models\DB\Database;

class LoginModel
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
}