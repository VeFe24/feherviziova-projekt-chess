<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vyvorenie súťaže</title>
    <link rel="stylesheet" href="templatemo_style.css">
    <link rel="stylesheet" href="css/competition_creator.css">
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
                <h2>Vytvorenie súťaže</h2>
            </div>
        </div>

        <div id="templatemo_main_wrapper">
            <div id="templatemo_content_wrapper" align="center">
                <form action="create_competition.php" method="post">
                    <table class="tg">
                        <tbody>
                            <tr>
                                <th class="tg-1wig">Názov:</th>
                                <th class="tg-0lax">
                                    <input class="txtinput" type="text" maxlength="45" name="name">
                                </th>
                            </tr>
                            <tr>
                                <td class="tg-1wig">Popis:</td>
                                <td class="tg-0lax"><input class="txtinput" type="text" maxlength="45"
                                        name="description"></td>
                            </tr>
                            <tr>
                                <td class="tg-1wig">Dátum a čas</td>
                                <td class="tg-0lax">
                                    <select name="day">
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                    </select>
                                    .
                                    <select name="month">
                                        <option value="01">Jan</option>
                                        <option value="02">Feb</option>
                                        <option value="03">Mar</option>
                                        <option value="04">Apr</option>
                                        <option value="05">May</option>
                                        <option value="06">Jun</option>
                                        <option value="07">Jul</option>
                                        <option value="08">Aug</option>
                                        <option value="09">Sep</option>
                                        <option value="10">Oct</option>
                                        <option value="11">Nov</option>
                                        <option value="12">Dec</option>
                                    </select>
                                    .
                                    <select name="year">
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                    </select>
                                    o
                                    <input type="number" min="0" max="23" value="12" name="hour">
                                    :
                                    <input type="number" min="0" max="59" value="0" name="minute">
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-1wig">Miesto:</td>
                                <td class="tg-0lax">
                                    <input class="txtinput" type="text" maxlength="20" name="place">
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <hr>

                    <input type="submit" value="Vytvoriť">
                </form>
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