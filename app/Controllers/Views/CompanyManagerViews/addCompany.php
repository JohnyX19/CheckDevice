<div class="cardHeader">
   <h2>Pridať firmu</h2>
   <a href='admin_home' class="btn"><i class="uil uil-backward"></i> Naspäť</a>
</div>
<form id="newCatRecord" action="" method="post">
    <div><span class="errors" id="errors"></span></div>
    <div class="filter filterAdd">
    <label for="companyName">Meno firmy:
       <input type="text" name="company" id="companyName" placeholder="Meno firmy" value="" required />
    </label>

    <div>
       <input type="submit" name="submit" value="Uložiť" class="btn" />
    </div>
</form>
<?=$this->getMessage();?>