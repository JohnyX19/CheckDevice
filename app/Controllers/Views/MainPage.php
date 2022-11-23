<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        
        <link rel="stylesheet" href="assets/styles/style.css" type="text/css"/>
        <link rel="stylesheet" href="assets/styles/styles.css" type="text/css"/>
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <!--============================ UNICONS ====================================-->
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
        
        <!--
        <link rel="stylesheet" href="assets/styles/style.css" type="text/css"/>
        <link rel="stylesheet" href="assets/styles/styles.css" type="text/css"/>
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        -->
        <!--============================ UNICONS ====================================-->
        <!--
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
        -->
        
    </head>
    <body>
        <div class="container">
            <?php
                
                if($_SESSION['NavMenu'] == 'admin' OR $_SESSION['NavMenu'] == 'user')
                {
                    $this->selectNavMenu($this->isAdmin());  
                }

            ?>
            <div class="main">
                <div class="topbar">
                    <div class="toggle">
                        <i class="uil uil-bars"></i>
                    </div>
                    <!-- search -->
                    <!--<div class="search">
                        <label for="search">
                            <input type="text" name="search" id="search" placeholder="Vyhľadať" />
                            <i class="uil uil-search"></i>
                        </label>
                    </div>-->
                    <div class="settings">
                        <!-- dark/light switcher -->
                        <div class="switcher">
                            <i class="uil uil-moon" id="theme-button"></i>
                        </div>
                        <!-- language switcher switcher -->
                        <!--<div class="language">
                            <a href="../en/index"><img src="../assets/img/UK-flag.png" /></a>
                        </div>-->
                        <!-- userIMG -->
                        <!--<div class="user">
                            <img src="../assets/img/<?php echo $miniPhoto;?>" alt="user" />
                        </div>
                        <div class="profilePopup">
                            <div class="profilePopup-content">
                                <a href="profile">Upraviť profil</a>
                            </div>
                        </div>-->
                    </div>
                </div>
                <div class="details">
                    <div class="recent">

                    <?php
                    
                        require $_SESSION['SecondPageName'].'.php';
                        
                        // vyriešit metodu vkladania pod stranky, miesto session
                        //$this->includeSubPage();
                    ?>

                    </div>
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
        </div>
    </body>  
    <script type="text/javascript" src="assets/scripts/main.js"></script>
    <script type="text/javascript" src="assets/scripts/<?=$_SESSION['SecondPageNameJS']?>.js"></script>
</html>