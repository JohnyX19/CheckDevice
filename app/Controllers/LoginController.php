<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Controllers\Controller;

class LoginController extends Controller
{
    // logincontroler by mal volat mainpage, kde by sa naplnali vsetky potrebne premenna pre navigacne menu
    
    private $loginModel;
    
    public function __construct(LoginModel $loginModel)
    {
        $this->loginModel = $loginModel;
    }

    public function login()
    {
        try
        {
            session_start();
            $this->addMessage("");
            
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $_SESSION['NavMenu'] = '';
                
                $user = $_POST['user'];
                $password = $_POST['password'];

                $userArray = $this->loginModel->getUser($user);

                if($userArray != null)
                {
                    if($userArray['user_password'] == $password)
                    {
                        $this->loginUser($userArray['user_name'], $userArray['role_id'], $userArray['company_id']);

                        if($this->isAdmin() != 'admin')
                        {
                            $this->redirect('MotorDiagnostic/home');
                        }
                        else
                        {
                            $this->redirect('MotorDiagnostic/admin_home');
                        }
                    }
                    else
                    {
                        $this->addMessage("Zadané heslo je nesprávne!");
                        $this->includeLoginView('LoginMainPage');
                    }
                }
                else
                {
                    $this->addMessage("Používateľ s daným prihlasovacím menom sa nenachádza v databáze");
                    $this->includeLoginView('LoginMainPage');
                }
            }
            else
            {
                if($this->getLoggedUser() == null)
                {
                    $this->includeLoginView('LoginMainPage');
                }
                else
                {
                    $this->redirect('MotorDiagnostic/home');
                }
            }
        }
        catch(\Exception $e)
        {
            $this->includeErrorView('Error404');
        }
    }
    
    public function logout()
    {
        try 
        {
            session_start();
            $this->logoutUser();
            $this->redirect('MotorDiagnostic/login');
        }
        catch(\Exception $e)
        {
            $this->includeErrorView('Error404');
        }
    }  
}