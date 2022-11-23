<div class="cardHeader">
    <h2>Zoznam firiem</h2>
    <div style="display: grid; grid-template-columns: repeat(1, 1fr); gap: 1rem;">
        <a href="add_company" class="btn"><i class="uil uil-plus-square"></i> Pridať firmu</a>
    </div>
</div>
<!-- card -->
<div class="cardBox">
<?php foreach( $this->data['Companies'] as $company ):  ?>

        <a href="admin_home?com=<?=$company['ID']?>">
            <div class="card">
                <div>
                    <div class="cardName">
                        <?=$company['company_name']?>
                    </div>
                </div>
            </div>
        </a>
    
<?php endforeach; ?>
</div>