<?php class Vozilo {

public $voziloID = 0;
public $model = '';
public $marka = '';
public $regBr = '';
public $tipVozila = 0;

public static function vratiSve($db){
    
    $result = $db->query('SELECT * FROM vozilo v join tipVozila t on v.tipVozila=t.tipID');

    $vozila = array();

    while($row = $result->fetch_assoc()) { 
        $tip = new TipVozila();
        $tip->tipID= $row['tipID'];
        $tip->nazivTipa= $row['nazivTipa'];


        $vozilo = new Vozilo();
        $vozilo->voziloID= $row['voziloID'];
        $vozilo->model= $row['model'];
        $vozilo->marka= $row['marka'];
        $vozilo->regBr= $row['regBr'];
        $vozilo->tipVozila = $tip;


        array_push($vozila, $vozilo); 
    }

    return $vozila;
}

} ?>
