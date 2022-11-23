<div class="cardHeader">
    <h2>Pozície na prevádzke <?= $this->data['DepartmentName'] ?></h2>
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem;">
        <a href="add_position" class="btn"><i class="uil uil-plus-square"></i> Pridať pozíciu</a>
        <a href="edit_department?dept=<?= $_SESSION['actualDepartmentId'] ?>" class="btn"><i class="uil uil-trash-alt"></i> Upraviť prevádzku</a>
        <a href="delete_department?id=<?= $_SESSION['actualDepartmentId'] ?>" class="btn"><i class="uil uil-trash-alt"></i> Vymazať prevádzku</a>
        <a href="admin_home?com=<?= $_SESSION['actualCompanyId'] ?>" class="btn"><i class="uil uil-backward"></i> Naspäť</a>
        <a href="admin_home" class="btn"><i class="uil uil-estate"></i> Domov</a>
    </div>
</div>

<!-- card -->
<div class="cardBox">
<?php foreach( $this->data['PositionsByDepartments'] as $pos ):  ?>

    <a href="admin_home?pos=<?=$pos['ID']?>">
        <div class="card">
            <div>
                <div class="cardName">
                    <?=$pos['position_name']?>
                </div>
            </div>
        </div>
    </a>
    
<?php endforeach; ?>
</div>