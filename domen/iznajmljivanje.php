<?php class Iznajmljivanje {

public $iznajmljivanjeID = 0;
public $vozilo = 0;
public $korisnik = 0;
public $datumOd = '';
public $datumDo = '';
public $cenaPoDanu = 0;
// public $ukupnaCena = 0;

public static function vratiSve($db){
    
    
    // $result = $db->query('SELECT *,((i.datumDo - i.datumOd)*i.cenaPoDanu) as ukupnaCena FROM iznajmljivanje i join korisnik k on i.korisnik=k.korisnikID join vozilo v on i.vozilo=v.voziloID');
    $result = $db->query('SELECT * FROM iznajmljivanje i join korisnik k on i.korisnik=k.korisnikID join vozilo v on i.vozilo=v.voziloID');
    


    $iznajmljivanja = array();

    while($row = $result->fetch_assoc()) { 
        // $tip = new TipVozila();
        // $tip->tipID= $row['tipID'];
        // $tip->nazivTipa= $row['nazivTipa'];


        $vozilo = new Vozilo();
        $vozilo->voziloID= $row['voziloID'];
        $vozilo->model= $row['model'];
        $vozilo->marka= $row['marka'];
        $vozilo->regBr= $row['regBr'];
        // $voziloPom->tipVozila = $tip;

        $korisnik= new Korisnik();
        $korisnik->korisnikID= $row['korisnikID'];
        $korisnik->ime = $row['ime'];
        $korisnik->prezime = $row['prezime'];

        $iznajmljivanje = new Iznajmljivanje();
        $iznajmljivanje->iznajmljivanjeID = $row['iznajmljivanjeID'];
        $iznajmljivanje->vozilo = $vozilo;
        $iznajmljivanje->korisnik = $korisnik;
        $iznajmljivanje->datumOd = $row['datumOd'];
        $iznajmljivanje->datumDo = $row['datumDo'];
        $iznajmljivanje->cenaPoDanu = $row['cenaPoDanu'];
        // $ukupnaCena = $row['ukupnaCena'];

        array_push($iznajmljivanja, $iznajmljivanje); 
    }

    return $iznajmljivanja;
}

public static function vratiSveSortirano($db, $sort){
    
    $result = $db->query('SELECT * FROM iznajmljivanje i join korisnik k on i.korisnik=k.korisnikID join vozilo v on i.vozilo=v.voziloID order by cenaPoDanu ' .$sort);

 


    $iznajmljivanja = array();

    while($row = $result->fetch_assoc()) { 
        // $tip = new TipVozila();
        // $tip->tipID= $row['tipID'];
        // $tip->nazivTipa= $row['nazivTipa'];


        $vozilo = new Vozilo();
        $vozilo->voziloID= $row['voziloID'];
        $vozilo->model= $row['model'];
        $vozilo->marka= $row['marka'];
        $vozilo->regBr= $row['regBr'];

        $korisnik= new Korisnik();
        $korisnik->korisnikID= $row['korisnikID'];
        $korisnik->ime = $row['ime'];
        $korisnik->prezime = $row['prezime'];

        $iznajmljivanje = new Iznajmljivanje();
        $iznajmljivanje->iznajmljivanjeID = $row['iznajmljivanjeID'];
        $iznajmljivanje->vozilo = $vozilo;
        $iznajmljivanje->korisnik = $korisnik;
        $iznajmljivanje->datumOd = $row['datumOd'];
        $iznajmljivanje->datumDo = $row['datumDo'];
        $iznajmljivanje->cenaPoDanu = $row['cenaPoDanu'];

        array_push($iznajmljivanja, $iznajmljivanje); 
    }

    return $iznajmljivanja;
}


public static function sacuvaj($db, $vozilo, $korisnik, $datumOd, $datumDo, $cenaPoDanu){
    
    $vozilo = mysqli_real_escape_string($db,$vozilo);
    $korisnik = mysqli_real_escape_string($db,$korisnik);
    $datumOd = mysqli_real_escape_string($db,$datumOd);
    $datumDo = mysqli_real_escape_string($db,$datumDo);
    $cenaPoDanu = mysqli_real_escape_string($db,$cenaPoDanu);
    // $cenaPoDanu = mysqli_real_escape_string($db,$_POST[$cenaPoDanu]);



    $result = $db->query("INSERT INTO iznajmljivanje (vozilo, korisnik, datumOd, datumDo, cenaPoDanu)
        VALUES ('$vozilo', '$korisnik', '$datumOd', '$datumDo', '$cenaPoDanu')");

    if ($result > 0) return true; else return false;
}

public static function obrisi($db,$id){

    $result = $db->query("DELETE FROM iznajmljivanje where iznajmljivanjeID=".$id);


    return true;
}

} ?>
