<?php
  include 'konekcija.php';

  include 'domen/korisnik.php';
  include 'domen/vozilo.php';
  include 'domen/tipVozila.php';
  include 'domen/iznajmljivanje.php';

  Iznajmljivanje::obrisi($db,$_GET['id']);

  header("Location: listaIznajmljivanja.php");


 ?>
