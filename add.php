<?php
include  'konekcija.php';

include 'domen/korisnik.php';
include 'domen/vozilo.php';
include 'domen/tipVozila.php';
include 'domen/iznajmljivanje.php';

  $vozilo = trim($_POST['vozilo']); 
  $korisnik = trim($_POST['korisnik']); 
  $datumOd = trim($_POST['datumOd']);
  $datumDo = trim($_POST['datumDo']);
  $cenaPoDanu = trim($_POST['cenaPoDanu']);

  Iznajmljivanje::sacuvaj($db,$vozilo,$korisnik,$datumOd,$datumDo, $cenaPoDanu);

  header("Location: index.php");


 ?>
