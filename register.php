<?php
    include_once 'header.php';
?>

    <main>
        <section class="signup-form" id="signup-form">
            <h2>Regisztrálás</h2>
            <form action="includes/register_inc.php" method="post">
                <input type="text" name="name" placeholder="Felhasználó név">
                <input type="text" name="email" placeholder="E-mail">
                <input type="password" name="pwd" placeholder="Jelszó">
                <input type="password" name="pwdrepeat" placeholder="Jelszó mégegyszer">
                <button type="submit" name="submit">Regisztrálás</button>
                <a href="index.php">Vissza</a>
            </form>
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p>Töltsön ki minden mezőt</p>";
                }
                else if ($_GET["error"] == "invaliduid") {
                    echo "<p>Nem megfelelő felhasználó név</p>";
                }
                else if ($_GET["error"] == "invalidemail") {
                    echo "<p>Adjon meg egy valódi email címet</p>";
                }
                else if ($_GET["error"] == "pwdnomatch") {
                    echo "<p>A jelszó nem egyezik</p>";
                }
                /*else if ($_GET["error"] == "pwdshort") {
                    echo "<p>A jelszó legyen minimum 6 karakter</p>";
                }*/
                else if ($_GET["error"] == "usernametaken") {
                    echo "<p>Felhasználó vagy email már regisztrálva</p>";
                }
                else if ($_GET["error"] == "stmtfailed") {
                    echo "<p>Hiba, kérlek regisztrálj újra</p>";
                }
                else if ($_GET["error"] == "none") {
                    echo "<p>Sikeres regisztráció</p>";
                }   
            }
            ?>
        </section>
    </main>
</body>
</html>