<?php

namespace App\Controllers;

use App\Models\MotorCardManagerModel;
use App\Controllers\Controller;

class MotorCardManagerController extends Controller
{
    
    private $motorCardManagerModel;
    
    public function __construct(MotorCardManagerModel $motorCardManagerModel)
    {
        $this->motorCardManagerModel = $motorCardManagerModel;
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
        
        $results = $this->motorCardManagerModel->getAllMotorAttributes();
        
        foreach($results as $result)
        {
            echo '<br>';
            //print_r($result);
            echo 'Firma : '.''.$result['company_name'];
        }
    }

}