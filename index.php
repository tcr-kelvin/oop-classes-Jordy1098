<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>translatie</h1>
<form action="index.php" method="post">
    <textarea name="tekst" id="tekst" cols="80" rows="10">Zet hier tekst</textarea><br/>
    <input type="radio" name="vraag" value="versleutel">versleutel
    <input type="radio" name="vraag" value="ontcijfer">ontcijfer
    <input type="submit" value="ont- of vercijfer maar">
</form>
</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: jordyklouwens
 * Date: 14/12/2018
 * Time: 09:02
 */

function versleutel($klareTekst){
    $eerstDeel="";
    $tweedeDeel="";
    $sleutelTekst="";
    $lengteTekst=0;

    $lengteTekst=strlen($klareTekst);

    $t=0;
    while ($t<$lengteTekst){
        $eerstDeel=$eerstDeel.substr($klareTekst,$t,1);
        $t=$t+1;
        $tweedeDeel=$tweedeDeel.substr($klareTekst,$t,1);
        $t=$t+1;
    }

    $cijferTekst=$eerstDeel.$tweedeDeel;
    return $cijferTekst;
}

function ontcijfer($cijferTekst){
    $helftTekst=strlen($cijferTekst)/2;

    if ($helftTekst<>round($helftTekst));{
        $helftTekst=$helftTekst+5;
    }
    $klareTekst="";
    $t=0;
    while ($t<$helftTekst){
        $klareTekst=$klareTekst.substr($cijferTekst,$t,1);
        $klareTekst=$klareTekst.substr($cijferTekst,$helftTekst+$t,1);
        $t=$t+1;
    }
    return $klareTekst;
}

if (empty($_POST['vraag'])){
    echo "<div id='melding'>je moet <i>versleutel</i> of <i>ontcijfer</i> invullen! </div>";
} else {
    $tekst=$_POST["tekst"];
    $keuze=$_POST["vraag"];
    if($keuze == "versleutel"){
        $klareTekst = $tekst;
        $cijferTekst = versleutel($klareTekst);
        echo "Klare tekst: <div id='klaretekst'>" . $klareTekst . "<br/></div>";
        echo "Cijfertekst: <div id='cijfertekst'>" . $cijferTekst . "<br/></div>";
    }else{
        $cijferTekst = $tekst;
        $klareTekst = ontcijfer($cijferTekst);
        echo "Cijfertekst: <div id='cijfertekst'>" . $cijferTekst . "<br/></div>";
        echo "Klare tekst: <div id='klaretekst'>" . $klareTekst . "<br/></div>";
    }
}