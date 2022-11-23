<div class="cardHeader">
	<h2>Pozícia <?= $this->data['PositionName'] ?></h2>
	<div>
        <a href="home?dept=<?= $_SESSION['actualDepartmentId'] ?>" class="btn"><i class="uil uil-backward"></i> Naspäť</a>
        <a href="home" class="btn"><i class="uil uil-estate"></i> Domov</a>
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