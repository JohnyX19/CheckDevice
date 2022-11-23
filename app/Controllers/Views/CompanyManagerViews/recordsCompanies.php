<h1>Zoznam firiem</h1>
<input type="button" value="Home" onClick="Javascript:window.location.href = 'admin_home';" />
<br>
<a href="add_company" class="btn">Pridať firmu <i class="uil uil-angle-double-right"></i></a>
<table class="tabulka">
        <tr>
            <th>Firma</th>
        </tr>
        <?php foreach( $this->data['AllCompanies'] as $company ):  ?>
            <tr>
                    <td><?=$company['company_name']?></td>
                    <td>
                    <a href="delete_company?id=<?=$company['ID']?>" onclick="return confirm('Naozaj chcete vymazať tento záznam?');">
                        <i class="uil uil-trash-alt"></i>
                    </a>
                </td>
            </tr>         
       <?php endforeach; ?>      
</table>
<?= $this->paginace($this->data['strana'], $this->data['stran'], '?strana={strana}') ?>	