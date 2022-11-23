<?php

namespace App\Controllers;

use App\Models\MotorAttributeModel;
use App\Controllers\Controller;

class MotorAttributeController extends Controller
{
    
    private $motorAttributeModel;
    
    public function __construct(MotorAttributeModel $motorAttributeModel)
    {
        $this->motorAttributeModel = $motorAttributeModel;
    }
    
    public function getMotorCard()
    {
        $this->checkLoggedIn();
        
        //$this->includeView('MotorAttributeViews/motorCard');
        
        $x = $this->getUserCompanyId();
        print_r($x);
    }
    
    public function attribute()
    {
        $this->checkLoggedIn();
        
        if($this->isAdmin() != 'admin')
        {
            $this->redirect('MotorDiagnostic/loggedin');
        }
        
        $results = $this->motorAttributeModel->getAllMotorAttributes();
        
        foreach($results as $result)
        {
            echo '<br>';
            //print_r($result);
            echo 'Firma : '.''.$result['company_name'];
        }
    }

}