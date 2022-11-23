<div class="cardHeader">
	<h2>Profil používateľa <span style="font-weight: 400;"><?=$this->data['ActualLoggedUser']['user_name']?></h2>
</div>
<form id="changePWD" method="post">
	<h3 style="color: var(--first-color); margin-bottom: var(--mb-2);">Zmena hesla</h3>
	<div class="filter filterAdd">
		<div>
        	<span class="errors" id="errors"></span>
        </div>
        <label for="currentPassword">
            <input type="password" name="OldPassword" id="currentPassword" placeholder="Súčasné heslo" required />
            <span class="toggleBtn" id="toggleBtnCur"><a href="#"><i class="uil uil-eye"></i></a></span>
        </label>
        <label for="newPassword">
            <input type="password" name="NewPassword" id="newPassword" placeholder="Nové heslo" onkeyup="checkPassword(this.value);" required />
            <span class="toggleBtn" id="toggleBtnNew"><a href="#"><i class="uil uil-eye"></i></a></span>
        </label>
        <label for="confirmPassword">
            <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Potvrdiť nové heslo" required />
            <span class="toggleBtn" id="toggleBtnConfirm"><a href="#"><i class="uil uil-eye"></i></a></span>
        </label>
        <div class="validation">
            <p>Požiadavky pre nové heslo:</p>
            <ul>
                <li id="lower"><i class="uil uil-times-circle"></i> Najmenej jedno malé písmeno</li>
                <li id="upper"><i class="uil uil-times-circle"></i> Najmenej jedno veľké písmeno</li>
                <li id="number"><i class="uil uil-times-circle"></i> Najmenej jedna číslica</li>
                <li id="length"><i class="uil uil-times-circle"></i> Najmenej 8 znakov</li>
            </ul>
        </div>
        <div>
            <input type="submit" name="submit" value="Uložiť" class="btn" />
            <a style="margin-left: 15px;" class="btn" href="home">Naspäť <i class="uil uil-angle-double-left"></i></a>
        </div>
    </div>

</form>

<br />
<h3 class="colorchangerheader">Zvoľte si farebnú schému pre aplikáciu:</h3>
<div id="colorchanger" style="">
	<a href="" style="background: hsl(0, 69%, 61%);"></a>
	<a href="" style="background: hsl(280, 69%, 61%);"></a>
	<a href="" style="background: hsl(150, 69%, 61%);"></a>
	<a href="" style="background: hsl(230, 69%, 61%);"></a>
	<a href="" style="background: hsl(340, 69%, 61%);"></a>
</div>
<!--<script type="text/javascript" src="assets/scripts/unsavedChanges.js"></script>-->