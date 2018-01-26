<?php

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');



$dict = [];
$language ="";
$targetLanguage ="";
$word="";

$ltvalue = "";
$envalue = "";
$devalue = "";




$csvfailas = fopen('dictionary.csv', 'r');

$i = 0;

while (($a=fgetcsv($csvfailas)) !=false) {
    $dict[] = [
        "LT" => $a[0],
        "EN" => $a[1],
        "DE" => $a[2]
    ];
    $i++;
}

fclose($csvfailas);




include 'helper.php';

include 'indexview.php';

// include 'update.php';

$new_lt = null;
$new_de = null;
$new_en = null;

if (isset($_POST['new_lt'])) {

$new_lt = $_POST['new_lt'];
$new_en = $_POST['new_en'];
$new_de = $_POST['new_de'];
$line = array($new_lt, $new_en, $new_de);

$csvfailas = fopen('dictionary.csv', 'a');
fputcsv($csvfailas, $line);
fclose($csvfailas);



echo "<div class='container'>";
echo "<h3>Naujas žodis <span>".$new_lt." / ".$new_en." / ".$new_de."</span> įrašytas.</h3>";
echo "<p><a href='index.php'>Grįžti</a></p>";
echo "</div>";

};

?>
