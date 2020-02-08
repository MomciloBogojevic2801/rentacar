<?php class Korisnik {

public $korisnikID = 0;
public $ime = '';
public $prezime = '';

public static function vratiSve($db){
    $result = $db->query('SELECT * FROM korisnik');

    $korisnici = array();

    while($row = $result->fetch_assoc()) { 

        $korisnik = new Korisnik();
        $korisnik->korisnikID= $row['korisnikID'];
        $korisnik->ime = $row['ime'];
        $korisnik->prezime = $row['prezime'];


        array_push($korisnici, $korisnik); 
    }

    return $korisnici;
}

} ?>
