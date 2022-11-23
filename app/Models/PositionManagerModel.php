<?php

namespace App\Models;

use App\Models\DB\Database;

class PositionManagerModel
{
    private $database;
    
    public function __construct(Database $database)
    {
        $this->database = $database;
    }
    
    public function getPositionByNameDepartment($positionName, $departmentId)
    {
        $result = $this->database->queryAll(
                'SELECT * FROM position WHERE position_name = ? AND department_id = ?',$positionName, $departmentId
                );
        return $result; 
    }
    
    public function getPositionById($positionId)
    {
        $result = $this->database->queryOne(
                'SELECT * FROM position WHERE ID = ?',$positionId
                );
        return $result; 
    }
    
    public function insertPosition($positionName, $departmentId)
    {
        $result = $this->database->query(
                'INSERT INTO position (department_id, position_name) VALUES (?, ?)',$departmentId, $positionName
                );
        return $result; 
    }
    
    public function deletePosition($positionId)
    {
        $result = $this->database->query(
                'DELETE FROM position WHERE ID = ?',$positionId
                );
        return $result; 
    }
    
    public function editPosition($positionId, $positionName)
    {
        $result = $this->database->query(
                'UPDATE position SET position_name = ? WHERE ID = ?',$positionName, $positionId
                );
        return $result; 
    }
}