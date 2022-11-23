<div class="cardHeader">
    <h2>Zoznam používateľov</h2>
    <div>
        <a href="add_user" class="btn action"><i class="uil uil-user-plus"></i> Pridať používateľa</a>
        <a href="admin_home" class="btn action"><i class="uil uil-estate"></i> Domov</a>
    </div>
</div>
<form autocomplete="off" action="" method="get">
    <div class="filter">
        <label for="username">
            <input autocomplete="off" type="text" name="username" id="username" placeholder="Meno používateľa" value="<?php echo (isset($_GET['username']) && $_GET['username'] != '') ? $_GET['username'] : '';?>">
            <i class="uil uil-search"></i>
        </label>
        <div style="text-align: right;">
            <input type="submit" name="submit" value="Vyhľadať" class="btn" />
            <a href="users" title="Vymazať filter" class="btn clear"><i class="uil uil-filter-slash"></i></a>
        </div>
    </div>
</form>
<table>
    <thead>
        <tr>
            <td><input type="checkbox" class="all" /></td>
            <td>Používateľ</td>
            <td>Firma</td>
            <td>Akcie</td>
        </tr>
    </thead>
    <tbody>

        <?php foreach( $this->data['AllUsers'] as $user ):  ?>
            <tr>
                <td><input type="checkbox" name="ID" class="record" /></td>
                <td><?=$user['user_name']?></td>
                <td><?=$user['company_name']?></td>
                <td>
                    <a href="delete_user?id=<?=$user['user_id']?>" onclick="return confirm('Naozaj chcete vymazať tento záznam?');">
                        <i class="uil uil-trash-alt"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
      
</table>
<br />
<div class="btns">
    <a href="#" class="btn" onclick="return confirm('Naozaj si želáte vymazať všetky označené záznamy?');">Vymazať označené <i class="uil uil-trash-alt"></i></a>
</div>
<?= $this->paginace($this->data['strana'], $this->data['stran'], '?strana={strana}') ?>		

<script type="text/javascript" src="assets/scripts/tablesandfilters.js"></script>