<div class="cardHeader">
    <h2>Pozície</h2>
    <a href="home" class="btn"><i class="uil uil-estate"></i> Domov</a>
</div>


<div class="cardBox">
<?php foreach( $this->data['PositionsByDepartments'] as $pos ):  ?>

    <a href="home?pos=<?=$pos['ID']?>">
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