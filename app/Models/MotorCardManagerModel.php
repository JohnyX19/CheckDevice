<?php

namespace App\Models;

use App\Models\DB\Database;

class MotorCardManagerModel
{
    private $database;
    
    public function __construct(Database $database)
    {
        $this->database = $database;
    }
    
    public function getAllMotorAttributes()
    {
        $result = $this->database->queryAll('SELECT * FROM company');
        
        return $result;
    }
}
