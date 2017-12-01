<?php

include("simple_html_dom.php");
// $id =  $_POST["id_product"];//"39684857"; // Wczytywanie numeru id produktu
$html = file_get_html('https://www.ceneo.pl/'.$id.'#tab=reviews');
$html1 = file_get_html('https://www.ceneo.pl/'.$id.'#tab=spec');
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
    $zalety[] = $pros->find('div[class="product-review-pros-cons"] div.pros-cell ul',0)->innertext; 
    // Parse zalet i przypisanie jej do tabeli zalety
}
for($numer_strony=2; $numer_strony<=$liczba_stron; $numer_strony++){
$strona[$numer_strony] = file_get_html('https://www.ceneo.pl/'.$id.'/opinie-'.$numer_strony.'');

foreach($strona[$numer_strony]->find('div[class="show-review-content content-wide"]') as $pros1) 
	{
    	$zalety1[] = $pros1->find('div[class="product-review-pros-cons"] div.pros-cell ul',0)->innertext; 
    	// Parse zalet i przypisanie jej do tabeli zalety1
	}
}

foreach($html->find('div[class="show-review-content content-wide"]') as $cons) {
    $wady[] = $cons->find('div[class="product-review-pros-cons"] div.cons-cell ul',0)->innertext; 
    // Parse wad i przypisanie jej do tabeli wady
}
for($numer_strony=2; $numer_strony<=$liczba_stron; $numer_strony++){
$strona[$numer_strony] = file_get_html('https://www.ceneo.pl/'.$id.'/opinie-'.$numer_strony.'');

foreach($strona[$numer_strony]->find('div[class="show-review-content content-wide"]') as $cons1) 
	{
    	$wady1[] = $cons1->find('div[class="product-review-pros-cons"] div.cons-cell ul',0)->innertext;
    	// $wady1[] = str_replace("<br>", "<li>", $wady1); 
    	// Parse wad i przypisanie jej do tabeli wady1
	}
}

foreach($html->find('div[class="show-review-content content-wide"]') as $vote_yes) {
    $yes[] = $vote_yes->find('span[id*="votes-yes"]',0)->innertext; 
    // Parse wad i przypisanie jej do tabeli wady
}
for($numer_strony=2; $numer_strony<=$liczba_stron; $numer_strony++){
$strona[$numer_strony] = file_get_html('https://www.ceneo.pl/'.$id.'/opinie-'.$numer_strony.'');

foreach($strona[$numer_strony]->find('div[class="show-review-content content-wide"]') as $vote_yes1) 
	{
    	$yes1[] = $vote_yes1->find('span[id*="votes-yes"]',0)->innertext;
    	// $wady1[] = str_replace("<br>", "<li>", $wady1); 
    	// Parse wad i przypisanie jej do tabeli wady1
	}
}

foreach($html->find('div[class="show-review-content content-wide"]') as $vote_no) {
    $no[] = $vote_no->find('span[id*="votes-no"]',0)->innertext; 
    // Parse wad i przypisanie jej do tabeli wady
}
for($numer_strony=2; $numer_strony<=$liczba_stron; $numer_strony++){
$strona[$numer_strony] = file_get_html('https://www.ceneo.pl/'.$id.'/opinie-'.$numer_strony.'');

foreach($strona[$numer_strony]->find('div[class="show-review-content content-wide"]') as $vote_no1) 
	{
    	$no1[] = $vote_yes1->find('span[id*="votes-no"]',0)->innertext;
    	// $wady1[] = str_replace("<br>", "<li>", $wady1); 
    	// Parse wad i przypisanie jej do tabeli wady1
	}
}

foreach ($html1->find('section[id="productTechSpecs"] table tr') as $item) {
    $detailsData[$counter]['property'] = trim($item->find('th',0)->plaintext);
    $detailsData[$counter]['data']     = trim($item->find('td',0)->plaintext);
    $counter++;
}

?>