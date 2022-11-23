<?php

namespace App\Models;

use App\Models\DB\Database;

class HomeModel
{
    private $database;
    
    public function __construct(Database $database)
    {
        $this->database = $database;
    }
    
    public function getAllCompany()
    {
        $result = $this->database->queryAll('SELECT * FROM company');
        return $result;
    }
    
    public function getAllRecordsCompany()
    {
        $result = $this->database->queryAll(
                'SELECT c.ID AS company_id, c.company_name AS company_name, d.ID AS department_id, d.department_name AS department_name,p.ID AS position_id, p.position_name AS position_name
                    FROM company c
                    LEFT JOIN department d ON d.company_id = c.ID
                    LEFT JOIN position p ON p.department_id = d.ID'
                );
        return $result;
    }
    
    public function getPositionById($id)
    {
        $result = $this->database->queryOne(
                'SELECT * FROM position WHERE id = ?', $id
                );
        return $result;
    }
    
    public function getDepartmentById($id)
    {
        $result = $this->database->queryOne(
                'SELECT * FROM department WHERE id = ?', $id
                );
        return $result;
    }
    
    public function getCompanyById($id)
    {
        $result = $this->database->queryOne(
                'SELECT * FROM company WHERE id = ?', $id
                );
        return $result;
    }
}
