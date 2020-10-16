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
    
    function pobierzIloscDni($miesiac, $rok) {
        switch($miesiac) {
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:
                return 31;
            case 2:
                if(($rok % 4 == 0 && $rok % 100 != 0) || $rok % 400 == 0) return 29;
                return 28;
            case 4:
            case 6:
            case 9:
            case 11:
                return 30;
            default:
                return 31;
        }
    }
    
        
    
    //Pobranie danych dot. daty
    $dzien = date("d");
    $miesiac = date("m");
    $rok = date("Y");
    $dni = pobierzIloscDni($miesiac, $rok);
    $pierwszyDzien = mktime(1, 0, 0, $miesiac, 1, $rok);
    $dzienTygodnia = date("N", $pierwszyDzien);
    
    //echo $dzienTygodnia;
        
    echo "<h2>Miesiąc: $miesiac</h2>";
    
    /*
    for($i = 1; $i <= $dni; $i++) {
        if($i == $dzien) {
            echo '<div class="dzien dzisiaj">' . $i . '</div>';
        } else {
            echo '<div class="dzien">' . $i . '</div>';
        }
    }
        
    echo "<p>$dzienTygodnia</p>";
    */
    
    $iterTyg = 1;
    $iterDzien = 1;
        
    $i = 0;
        
    while($iterTyg < 7 || $iterDzien <= $dni) {
        if($iterDzien == 1) {
            if($iterTyg < $dzienTygodnia) {
                echo " 0 ";
            } else {
                echo " $iterDzien ";
                $iterDzien++;
            }
        } else if($iterDzien > 1 && $iterDzien <= $dni) {
            echo " $iterDzien ";
            $iterDzien++;
        } else {
            echo " 0 ";
        }
        
        echo $iterTyg . "<br>";
        
        if($iterTyg < 7) $iterTyg++;
        else $iterTyg = 1;
        
        
        
        $i++;
    }
?>
   
    </div>
</body>
</html>