<?php

$dir = "modelos";

    $recurso = opendir($dir);

//print_r($productos);
?>
<div class="container elem1">
	<div class="col-lg-12">
<div class="jumbotron">
<h1 class="row justify-content-center my-3">Nuestros productos</h1>

<p>Peugeot te ayuda a comparar entre los diferentes modelos gracias a su módulo de ayuda de elección.
A través de una amplia gama de modelos, desde los hatchbacks a los monovolúmenes, SUV o familiares, para particulares o para profesionales, encontrarás el auto que se adapte a tus necesidades.</p>

<hr class="my-3">



<div class="row">
	<div class="row justify-content-center">

		<?php 
		while ($auto = readdir($recurso)){
			if($auto == "." || $auto == ".."){
            continue;
            }
            ?>
		<div class="card mx-2 my-2">
		<h4 class="card-header text-center"><?= ucwords(file_get_contents("$dir/$auto/$auto.txt")) ?></h4>
		<img src="<?= "$dir/$auto/$auto.png"; ?>" alt="<?= $auto ?>">
		<div class="card-body">
			
			<p class="card-text text-center">Precio: <?= file_get_contents("$dir/$auto/precio.txt") ?></p>
		</div>
	</div>
		<?php
		}

		 ?>

	</div>
</div>

</div>
</div>
</div>