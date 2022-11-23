<div class="cardHeader">
   <h2>Upraviť prevádzku</h2>
   <a href='admin_home?com=<?=$_SESSION['actualCompanyId']?>' class="btn action"><i class="uil uil-backward"></i> Naspäť</a>
</div>
<form id="newCatRecord" action="" method="post">
    <div>
      <span class="errors" id="errors">
         <?=$this->getMessage();?>
      </span>
   </div>
    <div class="filter filterAdd">
    <label for="departmentName">Názov prevádzky:
       <input type="text" name="department" id="departmentName" placeholder="Názov prevádzky" value="<?=$this->data['DepartmentName']?>" required />
    </label>

    <div>
       <input type="submit" name="submit" value="Uložiť" class="btn" />
    </div>
</form>