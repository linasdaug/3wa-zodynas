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
            <h3>Žodyno atnaujinimas</h3>
            <br>

<?php
                include helper.php;
                $ltvalue = "";
                $envalue = "";
                $devalue = "";

                echo($word);

                if ($language=="LT"){$ltvalue = $word;$envalue = wextract("EN",$word);$devalue=wextract("DE",$word);};
                if ($language=="DE"){$devalue = $word;$envalue = wextract("EN",$word);$ltvalue=wextract("LT",$word);};
                if ($language=="EN"){$envalue = $word;$ltvalue = wextract("LT",$word);$devalue=wextract("DE",$word);};

             ?>


             <form class="new-word-input" action="index.php" method="post">
                 <h2>Atnaujinti žodyną</h2>
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
