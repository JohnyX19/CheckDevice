<div class="cardHeader">
   <h2>Pridať prevádzku</h2>
   <a href='admin_home?com=<?=$this->data['actualCompanyId']?>' class="btn"><i class="uil uil-backward"></i> Naspäť</a>
</div>
<form id="newCatRecord" action="" method="post">
    <div><span class="errors" id="errors"></span></div>
    <div class="filter filterAdd">
    <label for="departmentName">Meno prevádzky:
       <input type="text" name="department" id="departmentName" placeholder="Meno prevádzky" value="" required />
    </label>

    <div>
       <input type="submit" name="submit" value="Uložiť" class="btn" />
    </div>
</form>
<?=$this->getMessage();?>



