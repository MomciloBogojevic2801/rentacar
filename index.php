
<?php include 'konekcija.php';
?>

<!DOCTYPE html>
 <html >
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>RentaCar</title>
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
		  <h1 class="naslov text-center"> Lista iznajmljivanja </h1>
		  
		 <input type="text" id="filter">
		  <div id="lista">
          </div>
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
    function vratiPodatke(){
      var zahtev = $.ajax({
          url: "kontroler.php",
          method: "GET",
          data: { opcija : 'iznajmljivanje' }
          });

        zahtev.done(function( json ) {
          var nalepi='<table class="table table-hover">';
          nalepi+='<thead>';
          nalepi+='<tr>';
          
          nalepi+='<th>Vozilo</th>';
          nalepi+='<th>Korisnik</th>';
          nalepi+='<th>Datum Od</th>';
          nalepi+='<th>Datum Do</th>';
          nalepi+='<th>Cena po danu</th>';
        //   nalepi+='<th>Ukupna cena</th>';
          
          nalepi+='</tr>';
          nalepi+='</thead>';
          nalepi+='<tbody>';

          $.each($.parseJSON(json), function(idx, obj) {
                  nalepi+='<tr>';
                  
                  nalepi+='<td>'+obj.vozilo.model +  ' ' +obj.vozilo.marka+'</td>';
                  nalepi+='<td>'+obj.korisnik.ime + ' ' + obj.korisnik.prezime+'</td>';
                  nalepi+='<td>'+obj.datumOd+'</td>';
                  nalepi+='<td>'+obj.datumDo+'</td>';
                  nalepi+='<td>'+obj.cenaPoDanu+'</td>';
                

                  nalepi+='</tr>';
              });

          nalepi+='</tbody>';
          nalepi+='</table>';

          $("#lista").html(nalepi);  

        });
    }

  </script>
  <script>
    vratiPodatke();

	$(document).ready(function(){
  $("#filter").on("keyup", function() {
    var value = $(this).val().toUpperCase();
    $("tbody tr").filter(function() {
      $(this).toggle($(this).text().toUpperCase().indexOf(value) > -1)
    });
  });
});

  </script>

	</body>
</html>