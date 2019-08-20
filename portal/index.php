<?php
session_start();

include_once 'conectar.php';
$caminho = "http://tccsci.epizy.com/php_action/upload/"; //caminho da imagem
//$caminho ="https://cdn.pixabay.com/photo/2018/09/09/13/32/fantasy-3664586_960_720.jpg";
?>

	<!doctype html>
	<html lang="pt-br">
	  <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

		<link rel="stylesheet" href="_css/bootstrap.css">
		<link rel="stylesheet" href="_css/estilo.css">
		<link rel="icon" href="_images\logoico.png" type= "image/x-icon"/>
		<title>Portal de Imóveis PE</title>
	  </head>
	  <body>
	  
	  <header>
		  <div class="media">
		  <img src="_images/logo64.png" class="align-self-center mr-3">
		  <div class="media-body">
			<h1 class="mt-0">Portal de Imóveis PE</h1>
		  </div>
		</div>
	  </header>
	 
	 <h2>Seu Imóvel está aqui</h2>
	
	<div class="container" id="centro">
	<form method="post" action="index.php#ancora">
		<div class="form-row" id="pesquisa">
			
		<div class="form-group col-md-3">
		  <label for="inputState">Interesse em:</label>
		  <select id="inputState" class="form-control" name="interesse">
			<option>-</option>
			<option>Aluguel</option>
			<option>Venda</option>
		  </select>
		</div>
		
		<div class="form-group col-md-3">
			  <label for="inputState">Tipo de Imóvel:</label>
			  <select id="inputState" class="form-control" name="tipo-imovel">
				<option>-</option>
				<option>Apartamento</option>
				<option>Casa</option>
				<option>Flat</option>
				<option>Galpão</option>
				<option>Loja</option>
				<option>Sala Comercial</option>
				<option>Terreno</option>
				<option>Lote</option>
			  </select>
			</div>
		
		<div class="form-group col-md-3">
		  <label for="inputState">Estadia:</label>
		  <select id="inputState" class="form-control" name="tipo">
			<option>-</option>
			<option>Residencial</option>
			<option>Comercial</option>
		  </select>
		</div>
			<div id="botao">
				<button type="submit" class="btn btn-danger">Pesquisar</button>
			</div>	
			</div>
		</form>
		</div>


<?php	
	$interesse = $_POST['interesse'];
	$tipo = $_POST['tipo-imovel'];
	$imovel = $_POST['tipo'];
	 
	 
?>




<div class="container">
	<div class="card" style="width: 50%; margin-left:20%;">
	
			<?php include_once("conexao.php");
			//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina 
			$teste = 50;
            $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

			//Selecionar todos os cursos da tabela
			$result_curso = "SELECT * FROM imovel";
			$resultado_curso = mysqli_query($conectar, $result_curso);

			//Contar o total de cursos
			$total_cursos = mysqli_num_rows($resultado_curso);

			//Seta a quantidade de cursos por pagina
			$quantidade_pg = 1;

			//calcular o número de pagina necessárias para apresentar os cursos
			$num_pagina = ceil($total_cursos/$quantidade_pg);

			//Calcular o inicio da visualizacao
			$incio = ($quantidade_pg*$pagina)-$quantidade_pg;

			//Selecionar os cursos a serem apresentado na página
			$result_cursos = "SELECT * FROM imovel limit $incio, $quantidade_pg";
			$resultado_cursos = mysqli_query($conectar, $result_cursos);
			$total_cursos = mysqli_num_rows($resultado_cursos);
            
			 while($rows_cursos = mysqli_fetch_assoc($resultado_cursos)){
                 $id_imovel = $rows_cursos['id_imovel'];
                  // teste para trazer a imagem //
                
				 ?>		
						
							
			<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
			<!-- Indicators -->
			<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
			
				<div class="item active">
				<img src ="<?php echo "$caminho".$rows_cursos['imagem'];?>">
               <!-- <?php echo $rows_cursos['imagem']; ?> -->
				
				
				</div>

                 <?php $result = "SELECT imagem FROM imagem where idimovel='$id_imovel' limit 1, $teste";
		    	 $resultado = mysqli_query($conectar, $result);
                  while($rows_c = mysqli_fetch_assoc($resultado)){ ?>

				<div class="item">	
				<img src ="<?php echo "$caminho".$rows_c['imagem'];?>">
				</div>
                 
                <?php } ?>
				
			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Next</span>
			</a>
			</div>
							
							
							
							
							
							<div class="caption text-center">
							
								<h3><?php echo $rows_cursos['valor_imovel']; ?></h3>
								<h3><?php echo $rows_cursos['tipo_imovel']; ?></h3>
								<h3><?php echo $rows_cursos['situacao_imovel']; ?></h3>
								<h3><?php echo $rows_cursos['caracteristicas']; ?></h3>
                                <h3><?php echo $rows_cursos['id_imovel']; ?></h3>
                            
								
								
								
								
							</div>
					
				<?php } ?>
				
				<?php
				//Verificar a pagina anterior e posterior
				$pagina_anterior = $pagina - 1;
				$pagina_posterior = $pagina + 1;
			?>
			<nav class="text-center">
				<ul class="pagination">
					<li>
						<?php
						if($pagina_anterior != 0){ ?>
							<a href="index.php?pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						<?php }else{ ?>
							<span aria-hidden="true">&laquo;</span>
					<?php }  ?>
					</li>
					<?php 
					
					
					
					
					
					//Apresentar a paginacao
					for($i = 1; $i < $num_pagina + 1; $i++){ ?>
						<li><a href="index.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php } ?>
					<li>
						<?php
						if($pagina_posterior <= $num_pagina){ ?>
							<a href="index.php?pagina=<?php echo $pagina_posterior; ?>" aria-label="Previous">
								<span aria-hidden="true">&raquo;</span>
							</a>
						<?php }else{ ?>
							<span aria-hidden="true">&raquo;</span>
					<?php }  ?>
					</li>
				</ul>
			</nav>
			
			
			
			
			
			
			
			
			
			
			
			
			


	</div>
</div>	
	
	<footer>
	<h5>Integração S.C.I - Portal de Imóveis &copy;Copyright 2019. Todos os direitos reservados ao Grupo SCI&reg;.</h5>
	</footer>
	
		<script src="_js/bootstrap.bundle.js"></script>
		<script src="_js/bootstrap.bundle.min.js"></script>
		<script src="_js/bootstrap.js"></script>
		<script src="_js/bootstrap.min.js"></script>
		<script src="_js/popper.min.js"></script>
		<script src="_js/jquery.min.js"></script>
		<script src="_js/jquery-3.3.1.slim.min.js"></script>


<!--

 
                    <label id="info">Valor:</label>&nbsp;<label class="inf2" name="inf2">R$ 0,00</label>
                    &nbsp;
                    <label id="info">Tipo:</label>&nbsp;<label class="inf3" name="inf3">Informação</label>
                    </br>
                    <label id="info">Banheiro:</label>&nbsp;<label class="inf4" name="inf4">00</label>
                    &nbsp;
                    <label id="info">Quartos:</label>&nbsp;<label class="inf5" name="inf5">00</label>
                    &nbsp;
                    <label id="info">Imóvel:</label>&nbsp;<label class="inf6" name="inf6">Informação6</label>

-->



	  </body>
	</html>