<!DOCTYPE html>
<html>
<body>


<?php
function show(){
$id =  $_POST["id_product"];
include "test.php";

echo "<h2>Model: $a->innertext"; // Wyswietlenie tytulu
echo "<h2> Marka: ".$value."</h2>";
echo "<h2> Rodzaj urządzenia: " .$final_kategorie. "</h2>";

echo "<h2>Dodatkowe uwagi</h2>";
$counter = 0;
$out  = "";
$out .= "<table class='extra'>";
foreach($detailsData as $key => $element){
    $out .= "<tr class='extra'>";
    foreach($element as $subkey => $subelement){
        $out .= "<td class='extra'>$subelement</td>";
    }
    $out .= "</tr>";
}
$out .= "</table>";
echo $out;
echo "<br> <br> <hr> <br> <br>";

echo '<table>';
echo '<tr> <th>Nr</th> <th>Autor</th><th>Rekomendacja</th><th>Data</th><th>Liczba Gwiazdek</th> <th>Opinie</th><th>Zalety</th><th>Wady</th><th>Przydatna opnia</th><th>Nieprzydatna opnia</th></tr>';
$liczba_opini_petla = $liczba_opini - 10;
if($liczba_opini<=10){
    for($i=0; $i<$liczba_opini; $i++){
    echo "<tr><td>" .($i+1)."</td> <td>$autor[$i]</td><td>$recommended[$i]</td><td>$time[$i]</td><td>$gwiazdki[$i]</td> <td>$opinie[$i]</td><td style='width:250px'>$zalety[$i]</td><td style='width:250px'>$wady[$i]</td><td>$yes[$i]</td><td>$no[$i]</td></tr>";
}
}
else{
    for($i=0; $i<10; $i++){
    echo "<tr><td>" .($i+1)."</td> <td>$autor[$i]</td><td>$recommended[$i]</td><td>$time[$i]</td><td>$gwiazdki[$i]</td> <td>$opinie[$i]</td><td style='width:250px'>$zalety[$i]</td><td style='width:250px'>$wady[$i]</td><td>$yes[$i]</td><td>$no[$i]</td></tr>";
}
    for($i=0; $i<$liczba_opini_petla; $i++)
    echo "<tr><td>" .($i+11)."</td> <td>$autor1[$i]</td><td>$recommended1[$i]</td><td>$time1[$i]</td><td>$gwiazdki1[$i]</td> <td>$opinie1[$i]</td><td style='width:250px'>$zalety1[$i]</td><td style='width:250px'>$wady1[$i]</td><td>$yes1[$i]</td><td>$no1[$i]</td></tr>";
}
echo '</table>';
}
if(isset($_POST['id_product']))
show();

?>
</body>
</html>