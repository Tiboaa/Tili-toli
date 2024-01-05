<?php
    include_once 'header.php';
?>

    <main>
        <div id="buttons">
        <?php
            if (isset($_SESSION["useruid"])) {
                echo '<form action="includes/logout_inc.php" method="post">
                    <button>Kijelentkezés</button>
                    </form>';
                echo '<form action="highscore.php" method="post">
                    <button>Highscore</button>
                    </form>';
                echo '<form action="menu.php" method="post">
                    <button>Játék</button>
                    </form>';
            }
            else {
                echo '<form action="login.php" method="post">
                    <button>Belépés</button>
                    </form>';
                echo '<form action="register.php" method="post">
                    <button>Regisztrálás</button>
                    </form>';
                echo '<form action="menu.php" method="post">
                    <button>Vendég</button>
                    </form>';
            }
        ?>
        </div>
    </main>
</body>
</html>