<?php

namespace App\Models;

use App\Models\DB\Database;

class NavigationModel
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
    
    public function getDeptByCompany($company)
    {
        $result = $this->database->queryAll(
                'SELECT * FROM department WHERE company_id = ?', $company
                );
        return $result;
    }
    
    public function getPositionByDepartment($department)
    {
        $result = $this->database->queryAll(
                'SELECT * FROM position WHERE department_id = ?', $department
                );
        return $result;
    }
    
    public function getAllUserCompany($id)
    {
        $result = $this->database->queryAll('SELECT * FROM company WHERE id = ?', $id);
        return $result;
    }
    
    public function getCompanyNameById($id)
    {
        $result = $this->database->querySingle('SELECT company_name FROM company WHERE id = ?', $id);
        return $result;
    }
}