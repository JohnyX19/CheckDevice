<div class="cardHeader">
   <h2>Upraviť pozíciu</h2>
   <a href='admin_home?dept=<?=$this->data['actualDepartmentId']?>' class="btn action"><i class="uil uil-backward"></i> Naspäť</a>
</div>
<form id="newCatRecord" action="" method="post">
    <div>
      <span class="errors" id="errors">
         <?=$this->getMessage();?>
      </span>
   </div>
    <div class="filter filterAdd">
    <label for="positionName">Názov pozície:
       <input type="text" name="position" id="positionName" placeholder="Názov pozície" value="<?=$this->data['PositionName']?>" required />
    </label>

    <div>
       <input type="submit" name="submit" value="Uložiť" class="btn" />
    </div>
</form>