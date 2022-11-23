<div class="cardHeader">
    <h2>Prevádzky</h2>
</div>

<!-- card -->
<div class="cardBox">
<?php foreach( $this->data['DepartmentsByCompany'] as $dept ):  ?>

    <a href="home?dept=<?=$dept['ID']?>">
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