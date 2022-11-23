<div class="cardHeader">
    <h2>Prevádzky firmy <?= $this->data['CompanyName'] ?></h2>
    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;">
        <a href="add_department" class="btn"><i class="uil uil-plus-square"></i> Pridať prevádzku</a>
        <a href="edit_company?com=<?=$_SESSION['actualCompanyId']?>" class="btn"><i class="uil uil-plus-square"></i> Upraviť firmu</a>
        <a href="delete_company?id=<?=$_SESSION['actualCompanyId']?>" class="btn"><i class="uil uil-trash-alt"></i> Vymazať firmu</a>
        <a href="admin_home" class="btn"><i class="uil uil-backward"></i> Naspäť</a>
    </div>
</div>

<!-- card -->
<div class="cardBox">
<?php foreach( $this->data['DepartmentsByCompany'] as $dept ):  ?>

    <a href="admin_home?dept=<?=$dept['ID']?>">
        <div class="card">
            <div>
                <div class="cardName">
                    <?=$dept['department_name']?>
                </div>
            </div>
        </div> 
    </a>
    
<?php endforeach; ?>
</div>