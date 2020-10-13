<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Kalendarz</title>
    
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="kontener">
        <h1>Kalendarz</h1>
    
<?php
    //Pobranie danych dot. daty
    $dzien = date("d");
    $miesiac = date("m");
    $rok = date("Y");
    $dni;
        
    echo "<h2>Miesiąc: $miesiac</h2>";
    
    //Ilość dni w zależności od miesiąca
    switch($miesiac) {
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            $dni = 31;
            break;
        case 2:
            if(($rok % 4 == 0 && $rok % 100 != 0) || $rok % 400 == 0) $dni = 29;
            else $dni = 28;
            break;
        case 4:
        case 6:
        case 9:
        case 11:
            $dni = 30;
            break;
        default:
            $dni = 31;
    }
    
//    echo $dzien . "<br>";
//    echo $miesiac . "<br>";
//    echo $rok . "<br>";
//    echo $dni . "<br>";
        
    for($i = 1; $i <= $dni; $i++) {
        echo '<div class="dzien">' . $i . '</div>';
    }
?>
   
    </div>
</body>
</html>