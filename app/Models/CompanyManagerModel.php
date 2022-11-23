<?php

namespace App\Models;

use App\Models\DB\Database;

class CompanyManagerModel
{
    private $database;
    
    public function __construct(Database $database)
    {
        $this->database = $database;
    }
    
    public function getCompanies()
    {
        $result = $this->database->queryAll('SELECT * FROM company');
        return $result;
    }
    
    public function insertCompany($companyName)
    {
        $result = $this->database->query(
                'INSERT INTO company(company_name) VALUES (?)',$companyName
                );

        return $result; 
    }
    
    public function deleteCompany($companyId)
    {
        $result = $this->database->query(
                'DELETE FROM company WHERE ID = ?',$companyId
                );

        return $result; 
    }
    
    public function editCompany($companyId, $companyName)
    {
        $result = $this->database->query(
                'UPDATE company SET company_name = ? WHERE ID = ?',$companyName, $companyId
                );

        return $result; 
    }
    
    public function getCompanyById($companyId)
    {
        $result = $this->database->queryOne(
                'SELECT * FROM company WHERE ID = ?',$companyId
                );
        return $result;
    }
    
    public function getCompanyByName($companyName)
    {
        $result = $this->database->queryAll(
                'SELECT * FROM company WHERE company_name = ?',$companyName
                );
        return $result;
    }
    
    public function getAllCompanies($page, $onPage)
    {
        $result = $this->database->queryAll(
                'SELECT * 
                FROM company LIMIT ?, ?', ($page - 1) * $onPage, $onPage
                );
        return $result;
    }
    
    public function getCountAllCompanies()
    {
        $result = $this->database->querySingle(
                'SELECT COUNT(*) FROM company'
                );
        return $result;
    }
}
