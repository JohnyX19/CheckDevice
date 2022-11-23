<?php

namespace App\Controllers;

use App\Models\DepartmentManagerModel;
use App\Models\NavigationModel;
use App\Controllers\Controller;

class DepartmentManagerController extends Controller
{
    private $departmentManagerModel;
    private $navigationModel;
    
    public function __construct(DepartmentManagerModel $departmentManagerModel, NavigationModel $navigationModel)
    {
        $this->departmentManagerModel = $departmentManagerModel;
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
    
    public function addDepartment()
    {
        try
        {
            $this->addMessage("");
            $this->checkLoggedIn();

            if($this->isAdmin() != 'admin')
            {
                $this->redirect('MotorDiagnostic/home');
            }

            $this->data['AllCompanyForThreeMenu'] = $this->navigationModel->getAllCompany();
            $_SESSION['NavMenu'] = 'admin';
            

            $this->data['actualCompanyId'] = $_SESSION['actualCompanyId'];
            
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $department = $_POST['department'];
                
                if(strlen($department) > 0)
                {
                    $userArray = $this->departmentManagerModel->getDepartmentByNameCompany($department, $this->data['actualCompanyId']);

                    if($userArray == null)
                    {
                        $this->departmentManagerModel->insertDepartment($department, $this->data['actualCompanyId']);

                        $this->redirect('MotorDiagnostic/admin_home?com='.$this->data['actualCompanyId']); 
                    }
                    else
                    {
                        $this->addMessage("Prevádzka s daným názvom už existuje");
                    }  
                }
                else
                {
                    $this->addMessage("Pole 'Názov prevádzky' je povinné");
                }
            }
            
            $this->includeView('DepartmentManagerViews/addDepartment');
        }
        catch(\Exception $e)
        {
            $this->includeErrorView('Error404');
        } 
    }
    
    public function deleteDepartment()
    {
        try
        {
            $this->checkLoggedIn();
            
            if($this->isAdmin() != 'admin')
            {
                $this->redirect('MotorDiagnostic/home');
            }
            
            if (isset($_GET['id']))
            {
                $department_id = $_GET['id'];
                $this->departmentManagerModel->deleteDepartment($department_id);
                $this->redirect('MotorDiagnostic/admin_home?com='.$_SESSION['actualCompanyId']);
            }
        } 
        catch (\Exception $e) 
        {
            $this->includeErrorView('Error404');
        }
    }
    
    public function editDepartment()
    {
        try
        {
            $this->addMessage("");
            $this->checkLoggedIn();

            if($this->isAdmin() != 'admin')
            {
                $this->redirect('MotorDiagnostic/home');
            }

            $this->data['AllCompanyForThreeMenu'] = $this->navigationModel->getAllCompany();
            $_SESSION['NavMenu'] = 'admin';
            
            
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $department = $_POST['department'];
                
                if(strlen($department) > 0)
                {
                    $userArray = $this->departmentManagerModel->getDepartmentByNameCompany($department, $_SESSION['actualCompanyId']);

                    if($userArray == null)
                    {
                        $this->departmentManagerModel->editDepartment($_SESSION['DepartmentIdEdit'], $department);
                        $this->redirect('MotorDiagnostic/admin_home?dept='.$_SESSION['DepartmentIdEdit']); 
                    }
                    else
                    {
                        $this->addMessage("Prevádzka s daným názvom už existuje");
                    }
                }
                else
                {
                    $this->addMessage("Pole 'Názov prevádzky' je povinné");
                }
            }
            
            if (isset($_GET['dept']))
            {
                $department_id = $_GET['dept'];
                $department = $this->departmentManagerModel->getDepartmentById($department_id);
                $this->data['DepartmentName'] = $department['department_name'];
                $_SESSION['DepartmentIdEdit'] = $department['ID'];
                $this->includeView('DepartmentManagerViews/editDepartment');
            }
        } 
        catch (\Exception $e) 
        {
            $this->includeErrorView('Error404');
        }
    }
}