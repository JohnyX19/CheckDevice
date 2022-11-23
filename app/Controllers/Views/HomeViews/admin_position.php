<div class="cardHeader">
    <h2>Pozícia <?= $this->data['PositionName'] ?></h2>
    <div>
        <a href="edit_position?pos=<?= $_SESSION['actualPositionId'] ?>" class="btn"><i class="uil uil-trash-alt"></i> Upraviť pozíciu</a>
        <a href="delete_position?id=<?= $_SESSION['actualPositionId'] ?>" class="btn"><i class="uil uil-trash-alt"></i> Vymazať pozíciu</a>
        <a href="admin_home?dept=<?= $_SESSION['actualDepartmentId'] ?>" class="btn"><i class="uil uil-backward"></i> Naspäť</a>
        <a href="admin_home" class="btn"><i class="uil uil-estate"></i> Domov</a>
    </div>
</div>
<div class="cardBox">
<!-- card -->
    <div class="card">
        <div>
            <div class="cardName">
                <?= $this->data['PositionName'] ?>
            </div>
    	</div>  
    <a href="motor_card" class="btn"> Karta motora</a><br>
    <a href="" class="btn"> Štatistiky</a>   
    </div>
</div>