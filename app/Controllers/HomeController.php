<?php

namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\NavigationModel;
use App\Controllers\Controller;

class HomeController extends Controller
{
    private $homeModel;
    private $navigationModel;
    
    public function __construct(HomeModel $homeModel, NavigationModel $navigationModel)
    {
        $this->homeModel = $homeModel;
        $this->navigationModel = $navigationModel;
    }
    
    public function showDeptByCompany($companyId)
    {
        return $this->navigationModel->getDeptByCompany($companyId);
    }
    
    public function showPositionByDepartment($departmentId)
    {
        return $this->navigationModel->getPositionByDepartment($departmentId);
    }
    
    public function adminHome()
    {
        $this->checkLoggedIn();

        if($this->isAdmin() != 'admin')
        {
            $this->redirect('MotorDiagnostic/home');
        }
        
        $this->data['AllCompanyForThreeMenu'] = $this->navigationModel->getAllCompany();
        $_SESSION['NavMenu'] = 'admin';
        
        
        if(isset($_GET['com']))
        {
            $company = $this->homeModel->getCompanyById($_GET['com']);
            $_SESSION['actualCompanyId'] = $_GET['com'];
            $this->data['CompanyName'] = $company['company_name'];
            $this->data['DepartmentsByCompany'] = $this->showDeptByCompany($_GET['com']);
            $this->includeView('HomeViews/admin_departments');
        }
        else if(isset($_GET['pos']))
        {
            $_SESSION['actualPositionId'] = $_GET['pos'];
            $position = $this->homeModel->getPositionById($_GET['pos']);
            $this->data['PositionName'] = $position['position_name'];
            $this->includeView('HomeViews/admin_position');
        }
        else if(isset($_GET['dept']))
        {
            $_SESSION['actualDepartmentId'] = $_GET['dept'];
            $department = $this->homeModel->getDepartmentById($_GET['dept']);
            $this->data['DepartmentName'] = $department['department_name'];
            $this->data['PositionsByDepartments'] = $this->showPositionByDepartment($_GET['dept']);
            $this->includeView('HomeViews/admin_positions');
        }
        else 
        {
            $this->data['Companies'] = $this->homeModel->getAllCompany();
            $this->includeView('HomeViews/admin_companies');
        }
    }
    
    public function userHome()
    {
        $this->checkLoggedIn();
        
        $this->data['AllUserCompanyForThreeMenu'] = $this->navigationModel->getAllUserCompany($this->getActualCompanyId());
        $_SESSION['NavMenu'] = 'user';
        $this->data['ActualCompanyName'] = $this->navigationModel->getCompanyNameById($this->getActualCompanyId());
        
        
        
        if(isset($_GET['pos']))
        {
            $positionId = $_GET['pos'];
            $position = $this->homeModel->getPositionById($positionId);
            
            $this->data['PositionName'] = $position['position_name'];
            $this->includeView('HomeViews/user_position');

        }
        else if(isset($_GET['dept']))
        {
            $this->data['PositionsByDepartments'] = $this->showPositionByDepartment($_GET['dept']);
            $this->includeView('HomeViews/user_positions');
        }
        else
        {
            $this->data['DepartmentsByCompany'] = $this->showDeptByCompany($this->getActualCompanyId());
            $this->includeView('HomeViews/user_departments');
        }
    }   
}
