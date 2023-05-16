<?php
session_start();
require 'config.php';

if (!isset($_SESSION["temps"])) {
    $_SESSION["temps"] = time();
    $_SESSION["attempts"] = 0;
    $_SESSION["random"] = rand(1, 1000);
    header('Location: leaderboard.php');
    exit();
}

$rn = $_SESSION["random"];
if (isset($_POST['nombre'])) {
    $guess = $_POST["nombre"];

    if (!empty($guess)) {
        $_SESSION["attempts"]++;
    }

    echo $rn;

    switch (true) {
        case $guess > $rn:
            echo "<h1>le nombre deviné est plus grand</h1>";
            break;
        case $guess < $rn:
            echo "<h1>le nombre deviné est plus petit</h1>";
            break;
        case $guess == $rn:
            echo "<div style='text-align: center'>";
            echo "<h1>Bravo!</h1>";
            $attempts = $_SESSION["attempts"];
            $tempsEcoule = time() - $_SESSION["temps"];
            echo "<h1>Écrire votre nom :</h1>";
            echo "<form action=\"leaderboard.php\" method=\"post\">";
            echo " <input name=\"nom\" type=\"text\" required>";
            echo "<input type=\"hidden\" name=\"attempts\" value=\"$attempts\">";
            echo "<input type=\"hidden\" name=\"temps_ecoule\" value=\"$tempsEcoule\">";
            echo "<input type=\"submit\" value=\"continuer vers leaderboard\">";
            echo "</form>";

            echo "<h1>Le nombre deviné est correct. Vous avez pris $tempsEcoule secondes et $attempts tentatives pour le trouver.</h1>";
            echo '<a href="jeu_exo1.php">Revenir</a>';
            echo "</div>";

            session_unset();
            session_destroy();
            exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exo 1 Serie 3</title>
</head>
<body style="text-align: center;">
<h1>Donner un nombre !</h1>

<form method="post" action="">
    <label>
        <input name="nombre" type="number" required placeholder="Nombre">
    </label>
    <input type="submit" value="Continuer">
</form>
</body>
</html>




