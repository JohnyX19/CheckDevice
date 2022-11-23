<?php

namespace App\Models;

use App\Models\DB\Database;

class DepartmentManagerModel
{
    private $database;
    
    public function __construct(Database $database)
    {
        $this->database = $database;
    }
    
    public function getDepartmentByNameCompany($departmentName, $companyId)
    {
        $result = $this->database->queryAll(
                'SELECT * FROM department WHERE department_name = ? AND company_id = ?',$departmentName, $companyId
                );
        return $result; 
    }
    
    public function getDepartmentById($departmentId)
    {
        $result = $this->database->queryOne(
                'SELECT * FROM department WHERE ID = ?',$departmentId
                );
        return $result; 
    }
    
    public function insertDepartment($departmentName, $companyId)
    {
        $result = $this->database->query(
                'INSERT INTO department (company_id, department_name) VALUES (?, ?)',$companyId, $departmentName
                );
        return $result; 
    }
    
    public function deleteDepartment($departmentId)
    {
        $result = $this->database->query(
                'DELETE FROM department WHERE ID = ?',$departmentId
                );
        return $result; 
    }
    
    public function editDepartment($departmentId, $departmentName)
    {
        $result = $this->database->query(
                'UPDATE department SET department_name = ? WHERE ID = ?',$departmentName, $departmentId
                );
        return $result; 
    }
    
    
}