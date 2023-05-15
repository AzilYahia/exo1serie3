<?php
//
//mysqli_connect("localhost", "root", "", "TP3")->query("SET NAMES utf8");
//
//$result = mysqli_connect("localhost", "root", "", "TP3")->query("SELECT * FROM jeu ORDER BY attempts ASC , temps_ecoule ASC");
//
//?>
<!---->
<!---->
<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <title>Leaderboard</title>-->
<!--</head>-->
<!--<body style="text-align: center">-->
<!--<h1>Leaderboard : </h1>-->
<!---->
<!--<table>-->
<!--    <tr>-->
<!--        <th style="padding: 10px; border: 1px solid black;">Nom</th>-->
<!--        <th style="padding: 10px; border: 1px solid black;">Attempts</th>-->
<!--        <th style="padding: 10px; border: 1px solid black;">Temps écoulé</th>-->
<!--    </tr>-->
<!--    --><?php
//    while ($row = $result->fetch_assoc()) {
//        echo "<tr>";
//        echo "<tr>";
//        echo "<td style=\"padding: 10px; border: 1px solid black;\">".$row['nom']."</td>";
//        echo "<td style=\"padding: 10px; border: 1px solid black;\">" .$row['attempts']."</td>";
//        echo "<td style=\"padding: 10px; border: 1px solid black;\">" .$row['temps_ecoule']."</td>";
//        echo "</tr>";
//        echo "</tr>";
//
//    }
//
//    ?>
<!--</table>-->
<!--</body>-->
<!---->
<!--</html>-->
<!---->

<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Add this line for error reporting

$conn = mysqli_connect("localhost", "root", "", "TP3"); // Connect to the database
$conn->set_charset("utf8"); // Set the character set
$result = $conn->query("SELECT * FROM article ORDER BY attempts ASC, temps_ecoule ASC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leaderboard</title>
</head>
<body style="text-align: center; display: flex; flex-direction: column; align-items: center">
<h1>Leaderboard :</h1>

<table>
    <tr>
        <th style="padding: 10px; border: 1px solid black;">Nom</th>
        <th style="padding: 10px; border: 1px solid black;">Attempts</th>
        <th style="padding: 10px; border: 1px solid black;">Temps écoulé</th>
    </tr>
    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td style=\"padding: 10px; border: 1px solid black;\">" . $row['nom'] . "</td>";
        echo "<td style=\"padding: 10px; border: 1px solid black;\">" . $row['attempts'] . "</td>";
        echo "<td style=\"padding: 10px; border: 1px solid black;\">" . $row['temps_ecoule'] . "</td>";
        echo "</tr>";
    }
    ?>
</table>

<a href="/exo1serie3/jeu_exo1.php">Retour à l'accueil</a>
</body>
</html>
