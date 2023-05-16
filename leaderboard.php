<?php
session_start();
require_once 'config.php';

$result = mysqli_connect("localhost", "root", "", "TP3")->query("SELECT * FROM article ORDER BY attempts ASC, temps_ecoule ASC");
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
        <th style="padding: 10px; border: 1px solid black;">Temps écoulé</th>
        <th style="padding: 10px; border: 1px solid black;">Attempts</th>
    </tr>
    <?php
    $i = 0;
    while (($row = $result->fetch_assoc()) && ($i < 10)) {
        echo "<tr>";
        echo "<td style=\"padding: 10px; border: 1px solid black;\">" . $row['nom'] . "</td>";
        echo "<td style=\"padding: 10px; border: 1px solid black;\">" . $row['temps_ecoule'] . "</td>";
        echo "<td style=\"padding: 10px; border: 1px solid black;\">" . $row['attempts'] . "</td>";
        echo "</tr>";
        $i++;
    }
    ?>
</table>

<?php
if (isset($_POST["nom"])) {
    $userName = $_POST["nom"];
    $attempts = $_POST["attempts"];
    $tempsEcoule = $_POST["temps_ecoule"];
    $stmt = mysqli_connect("localhost", "root", "", "TP3")->prepare("INSERT INTO article (nom, attempts, temps_ecoule) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $userName, $attempts, $tempsEcoule);

        echo "<p>New record inserted successfully.</p>";


    $result = mysqli_connect("localhost", "root", "", "TP3")->query("SELECT * FROM article ORDER BY attempts ASC, temps_ecoule ASC");
}
?>
<a href="jeu_exo1.php">Retour à l'accueil</a>
</body>
</html>




