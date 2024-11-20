
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>KINO „Za rogiem”</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<main>

<header>K I N O </header>
<aside id="lewy">
    <ul>
        <li><a href="index.html">Strona główna</a></li>
        
        </ul> <hr>
        <form action="rezerwacje.php">
        <label for="data">Data i godzina seansu: </label>

        <input type="date" name="data" value="2022-08-08"><input type="time" name="czas" value="15:00:00"><button name='przeslij'>Pokaż</button></form>
    
</aside>
<section id="prawy">

<table>




<?php
$baza=mysqli_connect('localhost', 'root','','kino');


if(isset($_GET['data'])&&isset($_GET['czas'])&&isset($_GET['przeslij'])){
$tablica=array();

$data=$_GET['data'];
$czas=$_GET['czas'];

$zapytanie="SELECT Miejsce,Rzad from rezerwacje
where Data='$data' and Godzina='$czas';";
$wynik=mysqli_query($baza,$zapytanie);
while($wiersz=mysqli_fetch_row($wynik)){
$rzad=$wiersz[1];
$miejsce=$wiersz[0];
$tablica[$rzad][$miejsce]=1;
}
for($i=1;$i<=15;$i++){
echo "<tr>";
echo "<th>$i</th>";
for($m=1;$m<=20;$m++){
    if(isset($tablica[$i][$m])){
    echo "<td class='zajete'>$m</td> ";
    }else{
        echo "<td class='wolne'>$m</td> ";
    }
    
}
echo "</tr>";
}

}else{
    echo "Podaj poprawną datę i godzinę seansu.";
}

?></table>
     </section>
<footer><h5>Egzamin INF.03 - AUTOR nr 7 5i</h5> </footer>

</main>
    

</body>
</html>