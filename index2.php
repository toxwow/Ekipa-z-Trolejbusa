<!--

Link do bilbioteki http://simplehtmldom.sourceforge.net/
-->

<!DOCTYPE html>
<html>
<meta charset="UTF-8">
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
$html = file_get_html('https://www.ceneo.pl/'.$id.'#tab=reviews'); // Parse zawartosci strony
$opinie = array();
$kategorie = array();
foreach($html->find('span.breadcrumb') as $all_cat){
	$kategorie[] = $all_cat->find('span[itemprop="title"]',0)->innertext;
}
foreach($html->find('h1.product-name') as $a); // Parse tytuly produktu
foreach($html->find('span[class="prod-review"]') as $number_review){
	$liczba_opini = $number_review->find('span[itemprop="reviewCount"]',0)->innertext; // Parse liczba opini
} 

$liczba_opini_dziel = $liczba_opini / 10; // dzielenie opini przez 10
$liczba_stron = ceil($liczba_opini_dziel); // zaokroąglanie liczby powyzej w gory > liczba stron opini art.

foreach($html->find('div[class="show-review-content content-wide"]') as $firstElement) {
    $opinie[] = $firstElement->find('p[class="product-review-body"]',0)->innertext; 
    // Parse opini i przypisanie jej do tabeli opinie
}

foreach($html->find('div[class="show-review-content content-wide"]') as $gwiazdy) {
    $gwiazdki[] = $gwiazdy->find('span[class="review-score-count"]',0)->innertext; 
    // Parse gwiazd i przypisanie jej do tabeli opinie
}

foreach($html->find('header[class="review-box-header user-box-container"]') as $first) {
    $autor[] = $first->find('div[class="reviewer-name-line"]',0)->innertext; 
    // Parse autora i przypisanie jej do tabeli opinie
}

for($numer_strony=2; $numer_strony<=$liczba_stron; $numer_strony++){
$strona[$numer_strony] = file_get_html('https://www.ceneo.pl/'.$id.'/opinie-'.$numer_strony.'');

foreach($strona[$numer_strony]->find('div[class="show-review-content content-wide"]') as $firstElement1) 
	{
    	$opinie1[] = $firstElement1->find('p[class="product-review-body"]',0)->innertext; 
    	// Parse opini i przypisanie jej do tabeli opinie
	}
}

for($numer_strony=2; $numer_strony<=$liczba_stron; $numer_strony++){
$strona[$numer_strony] = file_get_html('https://www.ceneo.pl/'.$id.'/opinie-'.$numer_strony.'');

foreach($strona[$numer_strony]->find('header[class="review-box-header user-box-container"]') as $first1) 
	{
    	$autor1[] = $first1->find('div[class="reviewer-name-line"]',0)->innertext; 
    	// Parse autora i przypisanie jej do tabeli opinie
	}
}
for($numer_strony=2; $numer_strony<=$liczba_stron; $numer_strony++){
$strona[$numer_strony] = file_get_html('https://www.ceneo.pl/'.$id.'/opinie-'.$numer_strony.'');

foreach($strona[$numer_strony]->find('div[class="show-review-content content-wide"]') as $gwiazdy1) 
	{
    	 $gwiazdki1[] = $gwiazdy1->find('span[class="review-score-count"]',0)->innertext; 
    	// Parse autora i przypisanie jej do tabeli opinie
	}
}
echo end($kategorie);
echo $a; // Wyswietlenie tytulu
echo "<h1> Liczba opini: $liczba_opini </h1>";
$liczba_opini_petla = $liczba_opini - 10;
if($liczba_opini<=10){
	for($i=0; $i<$liczba_opini; $i++){
	echo "Opinia nr " .($i+1).": $opinie[$i] <br><font color='red'> autor: $autor[$i] </font>Liczba gwiazdek: $gwiazdki[$i] <br><br>";
}
}
else{
	for($i=0; $i<10; $i++){
	echo "Opinia nr " .($i+1).": $opinie[$i] <br><font color='red'> autor: $autor[$i] </font>Liczba gwiazdek: $gwiazdki[$i] <br><br>";
}
	for($i=0; $i<$liczba_opini_petla; $i++)
	echo 'Opinia nr ' .($i+11). ": $opinie1[$i] <br><font color='red'> autor: $autor1[$i] </font>Liczba gwiazdek: $gwiazdki1[$i] <br><br>"; // wyswietelnie tabeli z opiniami
}


?>
</body>
</html>