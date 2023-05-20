<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Šach a šachové turnaje</title>
    <link rel="stylesheet" href="templatemo_style.css">
</head>

<body>
    <div id="templatemo_wrapper">
        <div id="templatemo_top">
            <div class="cleaner"></div>
        </div>

        <div id="templatemo_header">
            <div id="site_title">
                <a href="#"><img src="images/sach1.png" alt="css templates" /></a>
            </div>
        </div>

        <div id="templatemo_banner">
            <?php require_once("parts/nav.php") ?>
            <div id="banner_right">
                <?php
                if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {
                    ?>
                    <h2>Vitajte!</h2>
                    <h3>Vitajte na stránke,
                        <?php echo $_SESSION["email"]; ?>!
                    </h3>
                    <?php
                } else {
                    ?>
                    <h2>--Benjamin Franklin--</h2>
                    <h3>"Hra v šach nás učí, aby sme nikdy nestrácali odvahu len preto, že naše
                        súčasné postavenie vyzerá tak zle"</h3>
                    <?php
                }
                ?>
            </div>
        </div>

        <div id="templatemo_main_wrapper">
            <div id="templatemo_content_wrapper">

                <div class="three_column margin_r25 vertical_divider">
                    <h2>Pravidlá hry</h2>
                    <img src="images/kráľ.jpg" alt="innovate" />
                    <p>Nikdy nie je neskoro naučiť sa hrať šach - najobľúbenejšiu hru na svete. Naučiť sa pravidlá šachu
                        je jednoduché.</p>
                    <div class="cleaner_h10"></div>
                    <div class="button float_r"><a href="#">Čítaj viac</a></div>
                </div>
                <div class="three_column margin_r25 vertical_divider">
                    <h2>Základné pojmy</h2>
                    <img src="images/kon.jpg" alt="optimizer" />
                    <p>Šach sa hrá na doske zvanej šachovnica. Každý hráč má na začiatku
                        partie k dispozícii 16 figúrok.</p>
                    <div class="cleaner_h10"></div>
                    <div class="button float_r"><a href="#">Čítaj viac</a></div>
                </div>
                <div class="three_column">
                    <h2>Šachové partie</h2>
                    <img src="images/d_ma.jpg" alt="analysis" />
                    <p>Pravidlá FIDE uznávajú od r. 1981 iba šachovú notáciu nazývanú algebrický skrátený zápis.</p>
                    <div class="cleaner_h10"></div>
                    <div class="button float_r"><a href="#">Čítaj viac</a></div>
                </div>

                <div class="cleaner_h60"></div>

                <h2>Šachový veľmajster, Magnus Carlsen</h2>

                <div class="image_wrapper fl_img"><a href="#"><img src="images/magnus.png" alt="css templates" /></a>
                </div>
                <p>Je nórsky šachista, od roku 2002 majster FIDE (FM), od roku 2003 medzinárodný majster (IM) a od roku
                    2004 šachový veľmajster (GM). Po Karjakinovi je Carlsen druhým najmladším veľmajstrom šachovej
                    histórie. Víťazstvom nad Višvanátanom Ánandom roku 2013 sa stal majstrom sveta v šachu </p>
                <p>Najväčšie úspechy a najslávnejšie zápasy Magnusa Carlsena
                    Nor Carlsen sa môže pýšiť veľkou zbierkou titulov. Je majstrom sveta v šachu, v rapid šachu aj v
                    bleskovom šachu. Každý z týchto triumfov navyše niekoľkokrát zopakoval. V nasledujúcej tabuľke
                    nájdete zoznam jeho trofejí z majstrovstiev sveta.</p>
                <div class="cleaner"></div>
            </div>
        </div>
        <div id="templatemo_main_bottom"></div>

        <div id="templatemo_footer">
            Copyright © 2023 <a href="#">Veronika Fehérvíziová</a>
        </div>

        <div class="cleaner"></div>
    </div>
</body>

</html>