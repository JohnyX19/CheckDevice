<div class="cardHeader">
   <h2>Pridať používateľa</h2>
   <br /><div>
      <a href='users' class="btn action"><i class="uil uil-backward"></i> Naspäť</a>
      <a href="admin_home" class="btn action"><i class="uil uil-estate"></i> Domov</a>
   </div>
</div>
<form id="newCatRecord" action="" method="post">
   <div>
      <span class="errors" id="errors">
         <?=$this->getMessage();?>
      </span>
   </div>
	<div class="filter filterAdd">
      <label for="userName">Prihlasovacie meno používateľa:
         <input type="text" name="user" id="userName" placeholder="Prihlasovacie meno používateľa" value="" required />
      </label>
      <select name="company_id" >
           <option value="" selected disabled>Priradiť firme...</option>
           
           <?php foreach( $this->data['AllCompanyForAddUser'] as $company ):  ?>

                <option value="<?=$company['ID']?>"><?=$company['company_name']?></option>

           <?php endforeach; ?>
                
         </select>
         <div>
            <input type="submit" name="submit" value="Uložiť" class="btn" />
         </div>
</form>