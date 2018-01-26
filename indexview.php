<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Anketa</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="master.css">
    </head>
    <body>
        <div class="container">
            <h1>Didysis visų kalbų žodynas</h1>
            <br>



            <form class="input-group" action="index.php" method="get">
                <div class="row">
                    <div class="col-md-6">
                    <h3>Iš kokios kalbos versti:</h3><br>
                        <select class="btn btn-default dropdown-toggle" name="language">
                            <option value="No">-Pasirinkti kalbą /Choose language-</option>
                            <option value="EN">English</option>
                            <option value="LT">Lietuvių</option>
                            <option value="DE">Vokiečių</option>
                        </select><br><br>
                    </div>
                    <div class="col-md-6">
                        <h3>Į kokią kalbą išversti:</h3><br>
                        <select class="btn btn-default dropdown-toggle" name="targetLanguage">
                            <option value="No">-Pasirinkti kalbą /Choose language-</option>
                            <option value="EN">English</option>
                            <option value="LT">Lietuvių</option>
                            <option value="DE">Vokiečių</option>
                        </select><br><br>
                    </div>
                </div>
                    <div class="row">
                        <div class="inputbox col-sm-12">
                            <input class="wordinput" type='text' name='word' value='' placeholder = "Enter word"></input><br><br>

                            <button class="btn btn-info" type="submit" name="button">Versti / Translate</button><br><br>
                        </div>
                    </div>

            </form>




            <?php

            if(isset($_GET['language'])) {

            $language = $_GET['language'];
            $targetLanguage = $_GET['targetLanguage'];
            $word = $_GET['word'];

            $vertimas = versti($language, $targetLanguage, $word);

            $vertimas2 = translate($language, $targetLanguage, $word);

            // echo "<h3>Žodžio <em>".$word."</em> vertimas: <strong>".$vertimas."</strong></h3>";

            echo "<h3>Žodžio <span>".$word."</span> vertimas iš ".languageName($language)." į ".languageName($targetLanguage)." k. : <span>".$vertimas2."</span></h3>";
            // echo "<form action='update.php'><button class='btn btn-primary' type='submit' name='update'>Update translation</button></form><br>";



            if ($vertimas2 == "Vertimo nėra / No translation") {

                echo "Nepamirškite papildyti žodyno.";
                $ltvalue = "";
                $envalue = "";
                $devalue = "";
                if ($language=="LT"){$ltvalue = $word;};
                if ($language=="DE"){$devalue = $word;};
                if ($language=="EN"){$envalue = $word;};

            } else {
                echo "Nepamirškite atnaujinti:";
                if ($language=="LT"){$ltvalue = $word;$envalue=translate("LT","EN",$word);$devalue=translate("LT","DE",$word);};
                if ($language=="DE"){$devalue = $word;$envalue=translate("DE","EN",$word);$ltvalue=translate("DE","LT",$word);};
                if ($language=="EN"){$envalue = $word;$ltvalue=translate("EN","LT",$word);$devalue=translate("EN","DE",$word);};

            };

        };

             ?>
             <br><br><br>

             <form class="new-word-input" action="index.php" method="post">
                 <h2>Papildyti žodyną</h2>
                 Lietuvių:
                 <input type="text" name="new_lt" value="<?php echo $ltvalue?>" placeholder = ""><br>
                 Anglų:
                 <input type="text" name="new_en" value="<?php echo $envalue?>" placeholder = ""><br>
                 Vokiečių:
                 <input type="text" name="new_de" value="<?php echo $devalue?>" placeholder = ""><br>
                 <button class="btn btn-info" type="submit" name="button">Įvesti / Enter</button><br><br>
             </form>


             <?php


             ?>


        </div>
    </body>
</html>
