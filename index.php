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
        
    echo "<h2>Miesiąc: $miesiac</h2>";
    
    $iterTyg = 1;
    $iterDzien = 0;
        
    while($iterTyg <= 7 || $iterDzien <= $dni) {
        //Przed miesiącem
        if($iterTyg < $dzienTygodnia && $iterDzien == 0) {
            echo '<div class="dzien pusty"> </div>';
            //echo '0 ';
        }
        else if($iterTyg == $dzienTygodnia && $iterDzien == 0) {
            $iterDzien++;
        }
        
        if($iterDzien >= 1 && $iterDzien <= $dni) {
            //W trakcie miesiąca
            if($iterDzien == $dzien) {
                echo '<div class="dzien dzisiaj">' . $iterDzien . '</div>';
                //echo '' . $iterDzien . ' ';
            } else {
                echo '<div class="dzien">' . $iterDzien . '</div>';
                //echo '' . $iterDzien . ' ';
            }
            $iterDzien++;
        } else if($iterDzien > $dni){
            //Po miesiącu
            echo '<div class="dzien pusty"> </div>';
            //echo '0 ';
        }
        
        //echo $iterTyg . ' ' . $iterDzien . '<br>';
            
        if($iterTyg < 7) {
            $iterTyg++;
        }
        else if($iterTyg == 7 && $iterDzien > $dni){
            break;
        } else if($iterTyg == 7) {
            echo '<div class="clear"></div>';
            $iterTyg = 1;
        }
    }
    
    echo '<div class="clear"></div>';
?>
   
    </div>
</body>
</html>