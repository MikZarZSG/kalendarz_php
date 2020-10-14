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
    $dzienTygodnia = date("N");
        
    echo "<h2>Miesiąc: $miesiac</h2>";
        
    for($i = 1; $i <= $dni; $i++) {
        if($i == $dzien) {
            echo '<div class="dzien dzisiaj">' . $i . '</div>';
        } else {
            echo '<div class="dzien">' . $i . '</div>';
        }
    }
        
    echo "<p>$dzienTygodnia</p>";
?>
   
    </div>
</body>
</html>