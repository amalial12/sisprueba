<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E</title>
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">

</head>
<style type="text/css">	
	h5
	{font:30px 'Castellar'; 
		text-shadow:0px 0px 3px white;
		font-weight:bold; 
	}
	#div {
		position: absolute;
		top: 5%;
		left: 20%;
		transformar: translate(-50%, -50%);
		border: 3ps solid #73AD21;
		box-shadow:0px 0px 15px 5px black; 
		}
	button
	{
	   box-shadow:0px 0px 10px black, inset 0px 0px 5px black ;	
	}
	a
	{box-shadow:0px 0px 10px black, inset 0px 0px 5px black ;}
	p
	{ font:16px 'Cascadia Code SemiBold'; 

	}
	img {
		top: 100px;
  display: block;
  width: 100%;
  margin: auto;

  }
</style>

<body class="">
<section class="container">
	<h2 class="text-danger text-center mt-5"> 	</h2>
	<?php
	      $pnombre=$_GET['pnom'];
				$snombre=$_GET['snom'];
				$app=$_GET['app'];
				$apm=$_GET['apm'];
				$usuario=$_GET['usuario'];
				$clave=$_GET['clave'];
				$direc=$_GET['direc'];
				$nac=$_GET['nac'];
				$dep=$_GET['dep'];
				$carrera=$_GET['carrera'];
			  $turno=$_GET['turno'];
			  $grado=$_GET['grado'];
			  $genero=$_GET['gen'];

	?>
	   <div class="card mb-3 " style="max-width: 800px;" id="div">
			  <div class="row g-0">
			  	
			    <div class="col-md-5">
			      <img src="../../vista/assets/img/galeria/img2.jpg" class=" rounded-start" alt="...">
			    </div>
			    <div class="col-md-7">
			      <div class="card-body">
			        <h5 class="card-header -center">BIENVENIDO</h5>
			        <p class="card-title">Nombre Completo: <?php echo $pnombre." ", $snombre." ",$app." ",$apm ;   ?></p>
			        <p class="card-title">Genero: <?php echo $genero ;   ?></p>
						  <p class="card-title">Email: <?php echo $usuario ;   ?></p>
						  <p class="card-title ">Contraseña: <?php echo $clave ;?></p>		
						  <p class="card-title">Direccion: <?php echo $direc ;   ?></p>
						  <p class="card-title">Nacionalidad: <?php echo $nac ;   ?></p>
						  <p class="card-title">Departamento: <?php echo $dep ;   ?></p>
						  <p class="card-title">Carrera: <?php echo $carrera ;   ?></p>
						  <p class="card-title">Turno: <?php echo $turno ;   ?></p>
						  <p class="card-title">Grado: <?php echo $grado ;   ?></p>
			         <center>
								<a href="../../formulario.php" class="btn btn-danger fw-bold m-3" >RETORNAR</a>
							</center>	
			      </div>
			    </div>
			  </div>
			  
     </div>
							
												   
	

	
</section>
  <script src="../assets/bootstrap/js/bootstrap.min.js"> </script>
</body>
</html>
