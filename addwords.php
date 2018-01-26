<?php
                $new_lt = $_POST['new_lt'];
                $new_en = $_POST['new_en'];
                $new_de = $_POST['new_de'];
                $line = array($new_lt, $new_en, $new_de);

                $csvfailas = fopen('dictionary.csv', 'a');
                fputcsv($csvfailas, $line);
                fclose($csvfailas);

                echo "<h2>Reikšmė įrašyta</h2>";
                echo "<h3><a href='index.php'>Grįžti</a></p>";

?>
