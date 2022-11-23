<?php

namespace App\Controllers;

use App\Models\PositionManagerModel;
use App\Models\NavigationModel;
use App\Controllers\Controller;

class PositionManagerController extends Controller
{
    private $positionManagerModel;
    private $navigationModel;
    
    public function __construct(PositionManagerModel $positionManagerModel, NavigationModel $navigationModel)
    {
        $this->positionManagerModel = $positionManagerModel;
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
    
    public function addPosition()
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
            
            
            $this->data['actualDepartmentId'] = $_SESSION['actualDepartmentId'];
            
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $position = $_POST['position'];
                
                if(strlen($position) > 0)
                {
                    $userArray = $this->positionManagerModel->getPositionByNameDepartment($position, $this->data['actualDepartmentId']);

                    if($userArray == null)
                    {
                        $this->positionManagerModel->insertPosition($position, $this->data['actualDepartmentId']);

                        $this->redirect('MotorDiagnostic/admin_home?dept='.$this->data['actualDepartmentId']); 

                    }
                    else
                    {
                        $this->addMessage("Pozícia s daným názvom už existuje");
                    }  
                }
                else
                {
                    $this->addMessage("Pole 'Názov pozície' je povinné");
                }
            }
            
            $this->includeView('PositionManagerViews/addPosition');   
        }
        catch(\Exception $e)
        {
            $this->includeErrorView('Error404');
        } 
    }
    
    public function deletePosition()
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
                $position_id = $_GET['id'];
                $this->positionManagerModel->deletePosition($position_id);
                $this->redirect('MotorDiagnostic/admin_home?dept='.$_SESSION['actualDepartmentId']);
            }
        } 
        catch (\Exception $e) 
        {
            $this->includeErrorView('Error404');
        }
    }
    
    public function editPosition()
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
            
            
            $this->data['actualDepartmentId'] = $_SESSION['actualDepartmentId'];
            
            
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $position = $_POST['position'];
                
                if(strlen($position) > 0)
                {
                    $userArray = $this->positionManagerModel->getPositionByNameDepartment($position, $_SESSION['actualDepartmentId']);

                    if($userArray == null)
                    {
                        $this->positionManagerModel->editPosition($_SESSION['PositionIdEdit'], $position);
                        $this->redirect('MotorDiagnostic/admin_home?pos='.$_SESSION['PositionIdEdit']); 
                    }
                    else
                    {
                        $this->addMessage("Pozícia s daným názvom už existuje");
                    }
                }
                else
                {
                    $this->addMessage("Pole 'Názov pozície' je povinné");
                }
            }
            
            if (isset($_GET['pos']))
            {
                $position_id = $_GET['pos'];
                $position = $this->positionManagerModel->getPositionById($position_id);
                $this->data['PositionName'] = $position['position_name'];
                $_SESSION['PositionIdEdit'] = $position['ID'];
                $this->includeView('PositionManagerViews/editPosition');
            }
        } 
        catch (\Exception $e) 
        {
            $this->includeErrorView('Error404');
        }
    }
}