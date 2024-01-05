<?php
    include_once 'header.php';
?>

    <main>
        <section class="signup-form" id="signup-form">
            <h2>Belépés</h2>
            <form action="includes/login_inc.php" method="post">
                <input type="text" name="uid" placeholder="Felhasználó név/E-mail">
                <input type="password" name="pwd" placeholder="Jelszó">
                <button type="submit" name="submit">Belépés</button>
                <a href="index.php">Vissza</a>
            </form>
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p>Töltsön ki minden mezőt</p>";
                }
                else if ($_GET["error"] == "wronglogin") {
                    echo "<p>Bejelentkezés nem sikerült</p>";
                }  
                else if ($_GET["error"] == "wronguid") {
                    echo "<p>Felhasználó nem létezik</p>";
                } 
            }
            ?>
        </section>
    </main>
</body>
</html>