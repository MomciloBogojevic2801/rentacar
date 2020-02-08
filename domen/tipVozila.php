<?php class TipVozila {

public $tipID = 0;
public $nazivTipa = '';

public static function vratiSve($db){
    $result = $db->query('SELECT * FROM tipVozila');

    $tipovi = array();

    while($row = $result->fetch_assoc()) { 

        $tip = new TipVozila();
        $tip->tipID= $row['tipID'];
        $tip->nazivTipa = $row['nazivTipa'];


        array_push($tipovi, $tip); 
    }

    return $tipovi;
}

} ?>