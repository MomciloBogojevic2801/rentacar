<?php include 'konekcija.php'; ?>
<!DOCTYPE html>
 <html >
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Renta Car</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

	<link rel="shortcut icon" href="favicon.ico">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700,900' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700" rel="stylesheet">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/superfish.css">
	<link rel="stylesheet" href="css/style.css">

	<script src="js/modernizr-2.6.2.min.js"></script>
	</head>


	<body>
		<div id="glavni-wrapper">
		<div id="glavni-page">
		<div id="glavni-header">

      <?php include 'header.php'; ?>

		<div id="glavni-work-section">
			<div class="container">
          <h1 class="naslov text-center"> Dodaj iznajmljivanje </h1>
          <form method="POST" action="add.php">
         
            <label for="datum">Datum od</label>
            <input type="date" class="form-control" placeholder="Unesite datum pocetka iznajmljivanja" name="datumOd" id="datumOd">

            <label for="datum">Datum do</label>
            <input type="date" class="form-control" placeholder="Unesite datum zavrsetka iznajmljivanja" name="datumDo" id="datumDo">

            <label for="cena">Cena po danu</label>
            <input type="number" class="form-control" placeholder="Unesite cenu po danu za rentiranje" name="cenaPoDanu" id="cenaPoDanu">
            
            <label for="korisnik">Korisnik</label>
            <select class="form-control"name="korisnik" id="korisnik">
            </select>
            
            <label for="vozilo">Vozilo</label>
            <select class="form-control"name="vozilo" id="vozilo">
            </select>


            <label for="dugme"></label>
            <input type="submit" class="form-control btn-primary" name="sacuvaj" id="dugme" value="Sacuvaj">
          </form>
			</div>
		</div>
		<?php include 'footer.php'; ?>
	</div>
	</div>

	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.js"></script>
	<script src="js/main.js"></script>

<script>
    function popuniVozila(){
      var zahtev = $.ajax({
          url: "kontroler.php",
          method: "GET",
          data: { opcija : 'vozilo' }
          });

        zahtev.done(function( json ) {
          var nalepi='';


          $.each($.parseJSON(json), function(idx, obj) {
            nalepi+='<option value="'+obj.voziloID+'">'+obj.marka + ' ' + obj.model+'</option>';
              });
          $("#vozilo").html(nalepi);

        });

    }

    

  </script>
  <script>
    function popuniKorisnike(){
      var zahtev = $.ajax({
          url: "kontroler.php",
          method: "GET",
          data: { opcija : 'korisnik' }
          });

        zahtev.done(function( json ) {
          var nalepi='';


          $.each($.parseJSON(json), function(idx, obj) {
                  nalepi += '<option value="'+obj.korisnikID+'">'+obj.ime + ' ' + obj.prezime+'</option>';
              });
          $("#korisnik").html(nalepi);

        });

    }

    

  </script>
  <script>
    popuniVozila();
    popuniKorisnike();
  </script>

	</body>
</html>
