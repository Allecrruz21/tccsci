<?php
session_start();
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../_css/bootstrap.css">
	<link rel="stylesheet" href="../_css/estilo.css">
	<link rel="icon" href="../_sources\icon2.png" type= "image/x-icon"/>
    <title>Login - SCI</title>
  </head>
  <body>
    
	<header><h1>Sistema de Captação de Imóveis</h1></header>
	
	
	
 
  <div id="caixalogin">
	<label id="lbl_log">Login</label>
	<div id="texto_login_mensg">
	<?php 
	if(isset($_SESSION['msg'])){ 
		echo $_SESSION['msg']; 
		unset($_SESSION['msg']);
		}
		?>
	</div>
    <div class="form-group">
     <form method="POST" action="php_action/logar.php" id="acesso">
      <label for="exampleDropdownFormEmail1">Usuário</label>
      <input type="text" class="texto" id="cxtxt" name="txtuser" size="18" maxlength="50" placeholder="Usuário"/>
    </div>
    <div class="form-group">
      <label for="exampleDropdownFormPassword1">Senha</label>
      <input type="password" class="texto" id="cxtxt" name="txtpass" size="8" maxlength="16" placeholder="******"/>
    </div>
	<div id="btnacesso">

    <button type="submit" name="logar" value="acessar" class=" btnlogar">Logar</button>
	<button  name="cadastrar" >cadastre-se</button>
	<a href="">Esqueci minha Senha!</a>
	</div>
  </div>
  </div>
  </form>
  </br>
	</br>
	
	
	
	<footer><label id="rodape">S.C.I - Versão: 1.0.0 - &copy;Copyright 2018</label></footer>
	
	<script src="_js/bootstrap.bundle.js"></script>
	<script src="_js/bootstrap.bundle.min.js"></script>
	<script src="_js/bootstrap.js"></script>
	<script src="_js/bootstrap.min.js"></script>
	<script src="_js/popper.min.js"></script>
	<script src="_js/jquery.min.js"></script>
	<script src="_js/jquery-3.3.1.slim.min.js"></script>
	
  </body>
</html>