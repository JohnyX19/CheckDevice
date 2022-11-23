<?php

namespace App\Controllers;

use App\Models\UserManagerModel;
use App\Models\NavigationModel;
use App\Controllers\Controller;

class UserManagerController extends Controller
{
    private $userManagerModel;
    private $navigationModel;
    
    public function __construct(UserManagerModel $userManagerModel, NavigationModel $navigationModel)
    {
        $this->userManagerModel = $userManagerModel;
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
    
    public function changePassword()
    {
        try 
        {
            
        }
        catch(\Exception $e)
        {
            $this->includeErrorView('Error404');
        }
    }
    
    public function userProfile()
    {
        try 
        {
            $this->checkLoggedIn();
            $this->data['AllUserCompanyForThreeMenu'] = $this->navigationModel->getAllUserCompany($this->getActualCompanyId());
            $_SESSION['NavMenu'] = 'user';
            $this->data['ActualCompanyName'] = $this->navigationModel->getCompanyNameById($this->getActualCompanyId());
            
            
            $this->data['ActualLoggedUser'] = $this->userManagerModel->getUser($this->getLoggedUser());
            
            $this->includeView('UserManagerViews/profile');
            
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $oldPass = $_POST['OldPassword'];
                $newPass = $_POST['NewPassword'];
                
                $userArray = $this->userManagerModel->getUser($this->getLoggedUser());
                
                if($userArray['user_password'] == $oldPass)
                {
                    $this->userManagerModel->changePassword($userArray['ID'], $newPass);
                    $this->redirect('MotorDiagnostic/profile');
                }
                else 
                {
                    $this->addMessage("Súčasné heslo bolo zadané nesprávne");
                    echo $this->getMessage();
                    return;
                }
                
                echo $userArray['ID'];
            }
            
            
        }
        catch(\Exception $e)
        {
            $this->includeErrorView('Error404');
        }
    }
    
    public function addUser()
    {
        try 
        {
            $this->checkLoggedIn();

            if($this->isAdmin() != 'admin')
            {
                $this->redirect('MotorDiagnostic/home');
            }
            $this->data['AllCompanyForThreeMenu'] = $this->navigationModel->getAllCompany();
            $_SESSION['NavMenu'] = 'admin';
            
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $user = $_POST['user'];
                $company_id = $_POST['company_id'];
                
                $this->userManagerModel->insertUser($user, $company_id);
                $this->redirect('MotorDiagnostic/users');   
            }

            $this->data['AllCompanyForAddUser'] = $this->userManagerModel->getAllCompany();
            
            $this->includeView('UserManagerViews/addUser');
        }
        catch(\Exception $e)
        {
            $this->includeErrorView('Error404');
        }
    }
    
    public function deleteUser()
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
                $user_id = $_GET['id'];
                $this->userManagerModel->deleteUser($user_id);
                $this->redirect('MotorDiagnostic/users');
            }
               
        } 
        catch (Exception $e) 
        {
            $this->includeErrorView('Error404');
        }
    }
    
    public function recordsUsers()
    {
        try
        {
            $this->checkLoggedIn();

            if($this->isAdmin() != 'admin')
            {
                $this->redirect('MotorDiagnostic/home');
            }
            
            $this->data['AllCompanyForThreeMenu'] = $this->navigationModel->getAllCompany();
            $_SESSION['NavMenu'] = 'admin';
            
            
            if (isset($_GET['strana']))
            {
                    $strana = $_GET['strana'];
            }
            else
            {
                    $strana = 1;
            }
            $this->data['strana'] = $strana;
            
            $naStranu = 15;

            $this->data['AllUsers'] = $this->userManagerModel->getAllUsers($strana, $naStranu);

            $this->data['stran'] = ceil($this->userManagerModel->getCountAllUsers() / $naStranu);
            
            $this->includeView('UserManagerViews/recordsUsers');
            
        }
        catch(\Exception $e)
        {
            $this->includeErrorView('Error404');
        }
    }
    
    public function urlStrany($url, $strana)
    {
        return str_replace('{strana}', $strana, $url);
    }
    
    public function paginace($strana, $stran, $url)
    {
        $polomer = 5; // Polomer oblasti okolo aktuálnej stránky
        $html = '<nav class="centrovany"><ul class="paginace">';
        // Šípka vlavo
        if ($strana > 1)
        {
            $html .= '<li><a href="' . $this->urlStrany($url, $strana - 1) . '">&laquo;</a></li>';
        }
        else
        {
            $html .= '<li class="neaktivni">&laquo;</li>';
        }
        $left = $strana - $polomer >= 1 ? $strana - $polomer : 1;
        $right = $strana + $polomer <= $stran ? $strana + $polomer : $stran;
        // Umiestenie jednotky
        if ($left > 1)
        {
            $html .= '<li><a href="' . $this->urlStrany($url, 1) . '">1</a></li>';
        }
        // Bodky vlavo
        if ($left > 2)
        {
            $html .= '<li class="neaktivni">&hellip;</li>';
        }
        // Stránky v radiuse
        for ($i = $left; $i <= $right; $i++)
        {
                if ($i == $strana) // Aktívna stránka
                {
                    $html .= '<li class="aktivni">' . $i . '</li>';
                }
                else
                {
                    $html .= '<li><a href="' . $this->urlStrany($url, $i) . '">' . $i . '</a></li>';
                }
        }
        // Bodky vpravo
        if ($right < $stran - 1)
        {
            $html .= '<li class="neaktivni">' . '&hellip;' . '</li>';
        }
        // Umiestenie poslednej stránky
        if ($right < $stran)
        {
            $html .= '<li><a href="' . $this->urlStrany($url, $stran) . '">' . $stran . '</a></li>';
        }
        // Šípka vpravo
        if ($strana < $stran)
        {
            $html .= '<li><a href="' . $this->urlStrany($url, $strana + 1) . '">&raquo;</a></li>';
        }
        else
        {
            $html .= '<li class="neaktivni">&laquo;</li>';
        }
        $html .= '</ul></nav>';
        return $html;
    }
}