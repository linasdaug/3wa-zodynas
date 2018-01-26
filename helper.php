<?php

function translate($lang, $target, $word) {

    global $dict;

    $row = [];
    $translation = "Vertimo nėra / No translation";
    foreach ($dict as $row) {
        foreach ($row as $l=>$w) {
            if ($w == $word) {
                $translation = $row["$target"];
                return $translation;
                break;
            };
        };
    };
    return $translation;
};

function wextract($target, $word) {

    global $dict;

    $row = [];
    $translation = "Vertimo nėra / No translation";
    foreach ($dict as $row) {
        foreach ($row as $l=>$w) {
            if ($w == $word) {
                $translation = $row["$target"];
                return $translation;
                break;
            }
        }
    }
    return $translation;
}








function versti($lang, $target, $word) {

    global $dict;


    $lt = array_column($dict, "LT");
    $en = array_column($dict, "EN");
    $de = array_column($dict, "DE");


    switch ($lang) {
        case 'EN':

        if (in_array($word, $en)) {
            $index = array_search($word, $en);
            $lt_translation = $lt[$index];
            $de_translation = $de[$index];
            } else {
                $lt_translation = "Vertimo nėra";
                $de_translation = "Keine Uebersetzung";
            };
                // $translation = "LT: ".$lt_translation." DE: ".$de_translation;
        break;

        case 'LT':

        if (in_array($word, $lt)) {
            $index = array_search($word, $lt);
            $en_translation = $en[$index];
            $de_translation = $de[$index];
            } else {
                $en_translation = "No translation";
                $de_translation = "Keine Uebersetzung";
            };
                // $translation = "EN: ".$en_translation." DE: ".$de_translation;
        break;


        case 'DE':

        if (in_array($word, $de)) {
            $index = array_search($word, $de);
            $en_translation = $en[$index];
            $lt_translation = $lt[$index];
            } else {
                $en_translation = "No translation";
                $lt_translation = "Vertimo nėra";
            };
                // $translation = "EN: ".$en_translation." LT: ".$lt_translation;
        break;

        default:
            $translation = "Pasirinkite kalbą / Choose language";


        };

        switch ($target) {
            case 'LT':
                $translation = $lt_translation;
                break;
            case 'EN':
                $translation = $en_translation;
                break;
            case 'DE':
                $translation = $de_translation;
                break;

        }
        $index = null;
        return $translation;
};


function languageName($language) {
    switch ($language) {
        case 'EN':
            $l = "anglų";
            break;
        case 'LT':
            $l = "lietuvių";
            break;
        case "DE":
            $l = "vokiečių";
            break;
        default:
            $l = "nepasirinkta";
    };
    return $l;
}
