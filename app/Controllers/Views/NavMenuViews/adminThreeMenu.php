<nav class="menu-tree">
    <ul class="nav nav-list tree">
     
        <!--<li><label class="tree-toggler nav-header">ADMIN</label></li>-->
        <li><a href="#"><span class="icon"><i class="uil uil-user-square"></i></span><span class="title">ADMIN</span></a></li>
        
        <!--<li><label class="tree-toggler nav-header"><a href="companies">Správa Firiem</a></label>
            <ul class="nav nav-list tree"></ul>
        </li>-->
        
        <!--<li><label class="tree-toggler nav-header" data-path="">Firmy</label>-->
        <li class="rollette1"><a href=""><span class="icon"><i class="uil uil-building"></i></span><span class="title">Firmy</span></a>
            <ul class="rollette1ul" style="margin-left: 15%; width: 85%;">
                
                <?php foreach( $this->data['AllCompanyForThreeMenu'] as $company ):  ?>
                    <li class="rollette2"><label class="tree-toggler nav-header" data-path=""><?=$company['company_name']?></label>
                        <ul class="rollette2ul" style="margin-left: 15%; width: 70%">
                        <?php foreach( $this->showDeptByCompany($company['ID']) as $department ):  ?>
                            <li class="rollette3"><label class="tree-toggler nav-header" data-path=""><?=$department['department_name']?></label>

                                <?php foreach( $this->showPositionByDepartment($department['ID']) as $position ):  ?>
                                    <ul class="rollette3ul" style="margin-left: 15%; width: 55%;">
                                        <li class="rollette4"><a href="admin_home?pos=<?=$position['ID']?>"><?=$position['position_name']?></a></li>
                                    </ul>
                                <?php endforeach; ?>

                            </li>
                        <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
                    
            </ul>
        </li>
     
        <li><a href="users"><span class="icon"><i class="uil uil-users-alt"></i></span><span class="title">Správa používatelov</span></a>
        </li>

        <li><a href="logout"><span class="icon"><i class="uil uil-signout"></i></span><span class="title">Odhlásiť</span></a>
        </li>

    </ul>
</nav>
