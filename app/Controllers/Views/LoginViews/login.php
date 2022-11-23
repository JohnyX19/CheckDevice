<h1>Prihlásenie</h1>
                      
<form action="" method="post" id="loginform" class="input-group">
    <div class="field-group hidden" id="err-msgs">
        <div>
            <span class="errors" id="errors">
                <?=$this->getMessage();?>
            </span>
        </div>
    </div>
    <div class="field-group">
        <div>
            <label for="login">Používateľské meno</label>
        </div>
        <div>
            <input name="user" type="text" value="" id="login" class="input-field" required />
        </div>
    </div>
    <div class="field-group">
        <div>
            <label for="password">Heslo</label>
        </div>
        <div style="position: relative;">
            <input name="password" type="password" value="" id="password" class="input-field" required />
            <span id="toggleBtn"><a href="#"><i class="uil uil-eye"></i></a></span>
        </div>
    </div>
    <div class="field-group">
        <div>
            <input type="submit" name="login" value="Prihlásiť sa" class="form-submit-button">
        </div>
    </div>
    <!--<div class="field-group">
        <div>
            <a class="forgotten-password" href="forgotten_password">Zabudnuté heslo</a>
        </div>
    </div>-->
</form>