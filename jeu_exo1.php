<!---->
<?php
//mysqli_connect("localhost", "root", "", "TP3")->query("SET NAMES utf8");
//
////$_SESSION['nombre'] = $_POST['nombre'];
//$_SESSION["temps"]=time();
//$_SESSION["attempts"]=0;
//$_SESSION["random"]=rand(1,1000);
//header('Location: jeu_exo1.php');
//
//$rn=$_SESSION["random"];
//if(!empty($_POST['nombre'])) {
//    $guess = $_POST["nombre"];
//    $table = "Article";
//
//    if (!empty($guess)) {
//        $_SESSION["attempts"]++;
//    }
//
//    switch ($guess) {
//        case $guess > $rn:
//            echo "<h1>le nombre deviné est plus grand</h1>";
//            break;
//        case $guess < $rn:
//            echo "<h1>le nombre deviné est plus petit</h1>";
//            break;
//        case $guess == $rn:
//            echo "<h1>Bravo! </h1>";
//            $attempts = $_SESSION["attempts"];
//            $tempsEcoule = time() - $_SESSION["temps"];
//            echo "<h1> Ecire votre nom:</h1>";
//            echo "<form action=\"\" method=\"post\">";
//            echo " <input name=\"nom\" type=\"text\" required>";
//            echo "<input type=\"submit\" value=\"continuer vers dashboard\">";
//            $userName = $_POST["nom"];
//            echo "</form>";
//
//            echo "<h1>le nombre deviné est correct vous avez pris $tempsEcoule seconds, et $attempts fois pour le trouver </h1>";
//            echo '<a href="/exo1serie3/index.php">Revenir</a>';
//            $sql = "INSERT INTO article (id, nom,attempts,temps_ecoule) VALUES ('$userName',$attempts,$tempsEcoule)";
//            $_SESSION["nom"] = null;
//            $_SESSION["attempts"] = null;
//            $_SESSION["temps"] = null;
//            $_SESSION["random"] = null;
//            die();
//    }
//}
//
//?>
<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <title>Exo 1 Serie 3</title>-->
<!--</head>-->
<!--<body style="text-align: center;">-->
<!--<h1> Donner un nombre!</h1>-->
<!--<form method="post" action="">-->
<!--    <label>-->
<!--        <input name="nombre" type="number" required placeholder="Nombre">-->
<!--    </label>-->
<!--    <input type="submit" value="continuer">-->
<!--</form>-->
<!---->
<!---->
<!--</body>-->
<!--</html>-->
<!---->
<!---->
<!---->
<!---->
<!---->
<?php
session_start(); // Add this line to start the session

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Add this line for error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = mysqli_connect("localhost", "root", "", "TP3"); // Connect to the database
$conn->set_charset("utf8"); // Set the character set

if (!isset($_SESSION["temps"])) {
    $_SESSION["temps"] = time();
    $_SESSION["attempts"] = 0;
    $_SESSION["random"] = rand(1, 1000);
    header('Location: jeu_exo1.php');
    exit(); // Add this line to stop executing the rest of the code after redirect
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
            echo "<h1>Bravo!</h1>";
            $attempts = $_SESSION["attempts"];
            $tempsEcoule = time() - $_SESSION["temps"];
            echo "<h1>Écrire votre nom :</h1>";
            echo "<form action=\"leaderboard.php\" method=\"post\">"; // Modified this line to point to dashboard.php
            echo " <input name=\"nom\" type=\"text\" required>";
            echo "<input type=\"submit\" value=\"continuer vers leaderboard\">"; // Modified the button value
            echo "</form>";

            echo "<h1>Le nombre deviné est correct. Vous avez pris $tempsEcoule secondes et $attempts tentatives pour le trouver.</h1>";
            echo '<a href="/exo1serie3/index.php">Revenir</a>';

            if (isset($_POST["nom"])) {
                $userName = $_POST["nom"];
                $sql = "INSERT INTO article (attempts, temps_ecoule, nom) VALUES ( $attempts, $tempsEcoule, '$userName')";
                $conn->query($sql);
                echo $sql; // Output the SQL query for debugging purposes

            }

            session_unset();
            session_destroy();
            exit(); // Add this line to stop executing the rest of the code after successful guess
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


