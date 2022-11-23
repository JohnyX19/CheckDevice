<div class="cardHeader">
   <h2>Pridať pozíciu</h2>
   <a href='admin_home?dept=<?=$this->data['actualDepartmentId']?>' class="btn"><i class="uil uil-backward"></i> Naspäť</a>
</div>
<form id="newCatRecord" action="" method="post">
    <div><span class="errors" id="errors"></span></div>
    <div class="filter filterAdd">
    <label for="positionName">Meno pozície:
       <input type="text" name="position" id="positionName" placeholder="Meno pozície" value="" required />
    </label>

    <div>
       <input type="submit" name="submit" value="Uložiť" class="btn" />
    </div>
</form>
<?=$this->getMessage();?>



