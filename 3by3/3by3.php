<?php
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
    session_start();
    if (isset($_SESSION['userid'])) {
        alert("logged in");
    } else {
        alert("not logged in");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kirakó</title>
        <link rel="stylesheet" href="3by3.css">
        <script src="3by3.js"></script>
    </head>

    <body>
        <header>
            <a id="back" href="../menu.php">Vissza</a>
            <h1  id="title">Tili-Toli Kirakó</h1>
        </header>

        <main>
            <img id="startImage" src="og.jpg" alt="Start Game">
            <div id="board" style="display: none;">
            </div>
            <h2>Lépések: <span id="turns">0</span></h2>
             
            
        </main>

    </body>


</html>