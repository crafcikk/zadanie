<?php
session_start();
if(isset($_SESSION['login'])){
    echo "Witaj, " . $_SESSION['login'] . "! <a href='logout.php'>Wyloguj się</a>";
} else {
    header('location: login.php');
}

$conn = mysqli_connect("localhost", "root", "", "laboratorium"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if($conn){
        $query = "SELECT imie, nazwisko, pesel, zlecenie.data, wynik.data, plik FROM pacjent JOIN zlecenie ON zlecenie.idPacjenta = pacjent.id LEFT JOIN wynik on zlecenie.id = wynik.idZlecenia;";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0){
            echo "<table border='1'>";
            echo "<tr><th>Imię</th><th>Nazwisko</th><th>PESEL</th><th>Data zlecenia</th><th>Data wyniku</th><th>Plik</th></tr>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $row['imie'] . "</td>";
                echo "<td>" . $row['nazwisko'] . "</td>";
                echo "<td>" . $row['pesel'] . "</td>";
                echo "<td>" . $row['data'] . "</td>";
                echo "<td>" . $row['data'] . "</td>";
                if($row['plik']){
                    echo "<td><a href='uploads/" . $row['plik'] . "' download>Wyniki</a></td>";
                } else {
                    echo "<td>Brak pliku</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Brak wyników.";
        }
    } else {
        echo "Błąd połączenia z bazą danych.";
    }
?>
</body>
</html>