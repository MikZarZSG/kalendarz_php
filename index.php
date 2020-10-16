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
        
    function wygenerujKalendarz($dzienDzisiaj, $miesiac, $rok, $iloscDni, $dzienTygodniaPierwszego) {
echo<<<END
        <h2>$miesiac.$rok</h2>
            <div class="kalendarz">
                <div class="dzien opis">Pon</div>
                <div class="dzien opis">Wt</div>
                <div class="dzien opis">Śr</div>
                <div class="dzien opis">Czw</div>
                <div class="dzien opis">Pt</div>
                <div class="dzien opis">Sob</div>
                <div class="dzien opis">Ndz</div>
                <div class="clear"></div>

END;

        $iterTyg = 1;
        $iterDzien = 0;

        while($iterTyg <= 7 || $iterDzien <= $dni) {
            //Przed miesiącem
            if($iterDzien == 0) {
                if($iterTyg < $dzienTygodniaPierwszego) {
                    echo '<div class="dzien pusty"> </div>';
                } else { $iterDzien++; }
            }

            if($iterDzien >= 1 && $iterDzien <= $iloscDni) {
                //W trakcie miesiąca
                if($iterDzien == $dzienDzisiaj) {
                    echo '<div class="dzien dzisiaj">' . $iterDzien . '</div>';
                } else {
                    echo '<div class="dzien">' . $iterDzien . '</div>';
                }
                $iterDzien++;
            } else if($iterDzien > $iloscDni){
                //Po miesiącu
                echo '<div class="dzien pusty"> </div>';
            }

            if($iterTyg < 7) {
                //KOlejny dzień tygodnia
                $iterTyg++;
            }
            else if($iterTyg == 7 && $iterDzien > $iloscDni) {
                //Koniec generowania kalendarza
                break;
            } 
            else {
                //Nowa linia - nowy tydzień
                echo '<div class="clear"></div>';
                $iterTyg = 1;
            }
        }

        echo '<div class="clear"></div>';

        echo '</div>';
    }
    
        
    
    //Pobranie danych dot. daty
    $dzien = date("d");
    $miesiac = date("m");
    $rok = date("Y");
    $dni = pobierzIloscDni($miesiac, $rok);
    $pierwszyDzien = mktime(1, 0, 0, $miesiac, 1, $rok);
    $dzienTygodnia = date("N", $pierwszyDzien);
    
    //Generowanie kalendarza
    wygenerujKalendarz($dzien, $miesiac, $rok, $dni, $dzienTygodnia);
?>
   
    </div>
</body>
</html>