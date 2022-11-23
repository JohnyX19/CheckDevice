<?php

namespace App\Controllers;

use App\Models\CompanyManagerModel;
use App\Models\NavigationModel;
use App\Controllers\Controller;

class CompanyManagerController extends Controller
{
    private $companyManagerModel;
    private $navigationModel;
    
    public function __construct(CompanyManagerModel $companyManagerModel, NavigationModel $navigationModel)
    {
        $this->companyManagerModel = $companyManagerModel;
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
    
    public function recordsCompanies()
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

            $this->data['AllCompanies'] = $this->companyManagerModel->getAllCompanies($strana, $naStranu);

            $this->data['stran'] = ceil($this->companyManagerModel->getCountAllCompanies() / $naStranu);
            
            $_SESSION['NavMenu'] = '';
            $this->includeView('CompanyManagerViews/recordsCompanies');
            
        }
        catch(\Exception $e)
        {
            $this->includeErrorView('Error404');
        }
    }
    
    public function addCompany()
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
                $company = $_POST['company'];
                
                if(strlen($company) > 0)
                {
                    $userArray = $this->companyManagerModel->getCompanyByName($company);

                    if($userArray == null)
                    {
                        $this->companyManagerModel->insertCompany($company);

                        $this->redirect('MotorDiagnostic/admin_home'); 
                    }
                    else
                    {
                        $this->addMessage("Firma s daným názvom už existuje");
                    }
                }
                else
                {
                    $this->addMessage("Pole 'Názov firmy' je povinné");
                }
            }
            $this->includeView('CompanyManagerViews/addCompany');
        }
        catch(\Exception $e)
        {
            $this->includeErrorView('Error404');
        }
    }
    
    public function deleteCompany()
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
                $company_id = $_GET['id'];
                $this->companyManagerModel->deleteCompany($company_id);
                $this->redirect('MotorDiagnostic/admin_home');
            }
               
        } 
        catch (\Exception $e) 
        {
            $this->includeErrorView('Error404');
        }
    }
    
    public function editCompany()
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
                $company = $_POST['company'];
                
                if(strlen($company) > 0)
                {
                    $userArray = $this->companyManagerModel->getCompanyByName($company);

                    if($userArray == null)
                    {
                        $this->companyManagerModel->editCompany($_SESSION['CompanyIdEdit'], $company);
                        $this->redirect('MotorDiagnostic/admin_home?com='.$_SESSION['CompanyIdEdit']); 
                    }
                    else
                    {
                        $this->addMessage("Firma s daným názvom už existuje");
                    }
                }
                else
                {
                    $this->addMessage("Pole 'Názov firmy' je povinné");
                }
            }
            
            if (isset($_GET['com']))
            {
                $company_id = $_GET['com'];
                $company = $this->companyManagerModel->getCompanyById($company_id);
                $this->data['CompanyName'] = $company['company_name'];
                $_SESSION['CompanyIdEdit'] = $company['ID'];
                $this->includeView('CompanyManagerViews/editCompany');
            }
        } 
        catch (\Exception $e) 
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