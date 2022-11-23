<div class="cardHeader">
   <h2>Upraviť firmu</h2>
   <a href='admin_home' class="btn action"><i class="uil uil-backward"></i> Naspäť</a>
</div>
<form id="newCatRecord" action="" method="post">
    <div>
      <span class="errors" id="errors">
         <?=$this->getMessage();?>
      </span>
   </div>
    <div class="filter filterAdd">
    <label for="companyName">Názov firmy:
        <input type="text" name="company" id="companyName" placeholder="Názov firmy" value="<?=$this->data['CompanyName']?>" required />
    </label>

    <div>
       <input type="submit" name="submit" value="Uložiť" class="btn" />
    </div>
</form>