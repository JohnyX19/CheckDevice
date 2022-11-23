<!DOCTYPE html>

<!DOCTYPE html>
    <html lang="sk">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!--============================ UNICONS ====================================-->
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

        <!--=============================== CSS ======================================-->
        <link rel="stylesheet" type="text/css" href="assets/styles/admin.css" />

        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <title>Login | Admin</title>
    </head>
    <body>
        <div class="hero">
            <div class="form-box">
                <div class="nav__btns">
                    <!--Theme change button-->
                    <i class="uil uil-moon change-theme" id="theme-button"></i>
                </div>
                    <?php
                        require ("LoginViews/login.php");
                        //require_once("NavMenuViews/adminThreeMenu.php");
                        //require $_SESSION['SecondPageName'].'.php';
                        
                    ?>

            </div>
            <footer class="footer" id="footer">
                <div class="footer__bg">
                    <!--<div class="footer__container container grid">-->
                    <div>
                        <p class="footer__description">&copy; NextGen Soft s. r. o. <span id="curY" class="curY"></span></p>
                    </div>
                    <!--</div>-->
                    <p class="footer__copy"><a href="https://nextgensoft.sk?utm_source=PED#services" target="_blank">Tvorba webstránok a softvéru</a> od firmy <a href="https://nextgensoft.sk?utm_source=PED" target="_blank">NextGen Soft s.r.o.</a><br />V prípade akýchkoľvek otázok, pripomienok či problémov <a href="https://nextgensoft.sk?utm_source=PED#contact" target="_blank">kontaktujte, prosím, prevádzkovateľa</a></p>
                </div>
            </footer>
        </div>
        <script src="assets/scripts/main.js"></script>
        <script src="assets/scripts/errscript.js"></script>
        <script src="assets/scripts/pass.js"></script>
    </body>
</html>