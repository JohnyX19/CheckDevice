<nav class="menu-tree">
    <ul class="nav nav-list tree">
        
        <li><a href="#"><span class="icon"><i class="uil uil-user-square"></i></span><span class="title"><?=$this->getLoggedUser()?></span></a></li>


        <li><a href="profile"><span class="icon"><i class="uil uil-users-alt"></i></span><span class="title">Profil</span></a>
        </li>

        <li class="rollette2"><a href=""><span class="icon"><i class="uil uil-building"></i></span><span class="title"><?=$this->data['ActualCompanyName']?></span></a>
            <ul class="rollette2ul" style="margin-left: 15%; width: 85%;">

                <?php foreach( $this->data['AllUserCompanyForThreeMenu'] as $company ):  ?>
                    <?php foreach( $this->showDeptByCompany($company['ID']) as $department ):  ?>
                
                        <li class="rollette3"><label class="tree-toggler nav-header" data-path=""><?=$department['department_name']?></label>
                            
                            <?php foreach( $this->showPositionByDepartment($department['ID']) as $position ):  ?>
                                <ul class="rollette3ul" style="margin-left: 15%; width: 70%;">
                                    <li class="rollette4"><a href="home?pos=<?=$position['ID']?>"><?=$position['position_name']?></a></li>
                                </ul>
                            <?php endforeach; ?>

                        </li>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </ul>
       </li>
       
       <li><a href="logout"><span class="icon"><i class="uil uil-signout"></i></span><span class="title">Odhlásiť</span></a>
        </li>

    </ul>
</nav>
