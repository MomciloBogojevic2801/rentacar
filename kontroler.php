<?php
  include 'konekcija.php';

  include 'domen/korisnik.php';
  include 'domen/vozilo.php';
  include 'domen/tipVozila.php';
  include 'domen/iznajmljivanje.php';


  if(isset($_GET['opcija'])){
      if($_GET['opcija'] == 'korisnik'){
        echo json_encode(Korisnik::vratiSve($db));
      }

      if($_GET['opcija'] == 'vozilo'){
        echo json_encode(Vozilo::vratiSve($db));
      }

      if($_GET['opcija'] == 'iznajmljivanje'){
        echo json_encode(Iznajmljivanje::vratiSve($db));
      }

      if($_GET['opcija'] == 'sort'){
        echo json_encode(Iznajmljivanje::vratiSveSortirano($db,$_GET['sort']));
    }

  }

 ?>
