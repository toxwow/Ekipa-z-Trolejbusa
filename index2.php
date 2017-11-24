<!--

Link do bilbioteki http://simplehtmldom.sourceforge.net/
-->

<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<body>

<form action="index2.php" method="post">
<center>
Podaj nr id produktu: <br>
<input type="text" name="id_product"><br>
<input type="submit">
<button type="button">E</button>
<button type="button">T</button>
<button type="button">L</button>
</center>
</form>

<?php 
include("simple_html_dom.php");

$id =  $_POST["id_product"];//"39684857"; // Wczytywanie numeru id produktu
$html = file_get_html('https://www.ceneo.pl/'.$id.'#tab=reviews');
$html1 = str_get_html('https://www.ceneo.pl/'.$id.'#tab=spec'); // Parse zawartosci strony
$opinie = array();
$kategorie = array();
$rowData = array();

$ret = $html->find('meta[property*=brand]');
$value = $ret[0]->content;

foreach($html->find('span.breadcrumb') as $all_cat){
	$kategorie[] = $all_cat->find('span[itemprop="title"]',0)->plaintext;
	$final_kategorie = end($kategorie);
}

foreach($html->find('h1.product-name') as $a); // Parse tytuly produktu

foreach($html->find('span[class="prod-review"]') as $number_review){
	$liczba_opini = $number_review->find('span[itemprop="reviewCount"]',0)->plaintext; // Parse liczba opini
} 

$liczba_opini_dziel = $liczba_opini / 10; // dzielenie opini przez 10
$liczba_stron = ceil($liczba_opini_dziel); // zaokroąglanie liczby powyzej w gory > liczba stron opini art.

foreach($html->find('div[class="show-review-content content-wide"]') as $firstElement) {
    $opinie[] = $firstElement->find('p[class="product-review-body"]',0)->plaintext; 
    // Parse opini i przypisanie jej do tabeli opinie
}
for($numer_strony=2; $numer_strony<=$liczba_stron; $numer_strony++){
$strona[$numer_strony] = file_get_html('https://www.ceneo.pl/'.$id.'/opinie-'.$numer_strony.'');

foreach($strona[$numer_strony]->find('div[class="show-review-content content-wide"]') as $firstElement1) 
	{
    	$opinie1[] = $firstElement1->find('p[class="product-review-body"]',0)->plaintext; 
    	// Parse opini i przypisanie jej do tabeli opinie1
	}
}

foreach($html->find('div[class="show-review-content content-wide"]') as $Time_p) {
    $time[] = $Time_p->find('time',0)->plaintext; 
    // Parse czasu i przypisanie jej do tabeli time
}
for($numer_strony=2; $numer_strony<=$liczba_stron; $numer_strony++){
$strona[$numer_strony] = file_get_html('https://www.ceneo.pl/'.$id.'/opinie-'.$numer_strony.'');

foreach($strona[$numer_strony]->find('div[class="show-review-content content-wide"]') as $Time_p1) 
	{
    	$time1[] = $Time_p1->find('time',0)->plaintext; 
    	// Parse czasu i przypisanie jej do tabeli time1
	}
}

foreach($html->find('div[class="show-review-content content-wide"]') as $gwiazdy) {
    $gwiazdki[] = $gwiazdy->find('span[class="review-score-count"]',0)->plaintext; 
    // Parse gwiazd i przypisanie jej do tabeli gwiazdki
}
for($numer_strony=2; $numer_strony<=$liczba_stron; $numer_strony++){
$strona[$numer_strony] = file_get_html('https://www.ceneo.pl/'.$id.'/opinie-'.$numer_strony.'');

foreach($strona[$numer_strony]->find('div[class="show-review-content content-wide"]') as $gwiazdy1) 
	{
    	 $gwiazdki1[] = $gwiazdy1->find('span[class="review-score-count"]',0)->innertext; 
    	// Parse gwiazd i przypisanie jej do tabeli gwiazdki1
	}
}

foreach($html->find('header[class="review-box-header user-box-container"]') as $first) {
    $autor[] = $first->find('div[class="reviewer-name-line"]',0)->plaintext; 
    // Parse autora i przypisanie jej do tabeli autor
}
for($numer_strony=2; $numer_strony<=$liczba_stron; $numer_strony++){
$strona[$numer_strony] = file_get_html('https://www.ceneo.pl/'.$id.'/opinie-'.$numer_strony.'');

foreach($strona[$numer_strony]->find('header[class="review-box-header user-box-container"]') as $first1) 
	{
    	$autor1[] = $first1->find('div[class="reviewer-name-line"]',0)->plaintext; 
    	// Parse autora i przypisanie jej do tabeli autor1
	}
}

foreach($html->find('header[class="review-box-header user-box-container"]') as $yes_no) {
    $recommended[] = $yes_no->find('em[class="product-recommended"]',0)->plaintext; 
    // Parse polecenia i przypisanie jej do tabeli recommended
}
for($numer_strony=2; $numer_strony<=$liczba_stron; $numer_strony++){
$strona[$numer_strony] = file_get_html('https://www.ceneo.pl/'.$id.'/opinie-'.$numer_strony.'');

foreach($strona[$numer_strony]->find('header[class="review-box-header user-box-container"]') as $yes_no1) 
	{
    	$recommended1[] = $yes_no1->find('em[class="product-recommended"]',0)->plaintext; 
    	// Parse polecenia i przypisanie jej do tabeli recommended1
	}
}

foreach($html->find('div[class="show-review-content content-wide"]') as $pros) {
    $zalety[] = $pros->find('div[class="product-review-pros-cons"] div.pros-cell ul',0)->plaintext; 
    // Parse zalet i przypisanie jej do tabeli zalety
}
for($numer_strony=2; $numer_strony<=$liczba_stron; $numer_strony++){
$strona[$numer_strony] = file_get_html('https://www.ceneo.pl/'.$id.'/opinie-'.$numer_strony.'');

foreach($strona[$numer_strony]->find('div[class="show-review-content content-wide"]') as $pros1) 
	{
    	$zalety1[] = $pros1->find('div[class="product-review-pros-cons"] div.pros-cell ul',0)->plaintext; 
    	// Parse zalet i przypisanie jej do tabeli zalety1
	}
}

foreach($html->find('div[class="show-review-content content-wide"]') as $cons) {
    $wady[] = $cons->find('div[class="product-review-pros-cons"] div.cons-cell ul',0)->plaintext; 
    // Parse wad i przypisanie jej do tabeli wady
}
for($numer_strony=2; $numer_strony<=$liczba_stron; $numer_strony++){
$strona[$numer_strony] = file_get_html('https://www.ceneo.pl/'.$id.'/opinie-'.$numer_strony.'');

foreach($strona[$numer_strony]->find('div[class="show-review-content content-wide"]') as $cons1) 
	{
    	$wady1[] = $cons1->find('div[class="product-review-pros-cons"] div.cons-cell ul',0)->plaintext;
    	// $wady1[] = str_replace("<br>", "<li>", $wady1); 
    	// Parse wad i przypisanie jej do tabeli wady1
	}
}



echo $a->innertext; // Wyswietlenie tytulu
echo "<h2> Producent: ".$value."</h2>";
echo "<h2> Kategorie: " .$final_kategorie. "</h2>";
echo '<table>';
echo '<tr> <th>Nr</th> <th>Autor</th><th>Rekomendacja</th><th>Data</th><th>Liczba Gwiazdek</th> <th>Opinie</th><th>Zalety</th><th>Wady</th></tr>';
$liczba_opini_petla = $liczba_opini - 10;
if($liczba_opini<=10){
	for($i=0; $i<$liczba_opini; $i++){
	echo "<tr><td>" .($i+1)."</td> <td>$autor[$i]</td><td>$recommended[$i]</td><td>$time[$i]</td><td>$gwiazdki[$i]</td> <td>$opinie[$i]</td><td>$zalety[$i]</td><td>$wady[$i]</td></tr>";
}
}
else{
	for($i=0; $i<10; $i++){
	echo "<tr><td>" .($i+1)."</td> <td>$autor[$i]</td><td>$recommended[$i]</td><td>$time[$i]</td><td>$gwiazdki[$i]</td> <td>$opinie[$i]</td><td>$zalety[$i]</td><td>$wady[$i]</td></tr>";
}
	for($i=0; $i<$liczba_opini_petla; $i++)
	echo "<tr><td>" .($i+11)."</td> <td>$autor1[$i]</td><td>$recommended1[$i]</td><td>$time1[$i]</td><td>$gwiazdki1[$i]</td> <td>$opinie1[$i]</td><td>$zalety1[$i]</td><td>$wady1[$i]</td></tr>";
}
echo '</table>';


?>
</body>
</html>