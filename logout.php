<?php
	session_start();
	if(isset($_SESSION['usuario'])){
		unset($_SESSION['usuario']); //retira o valor 
		session_destroy(); // destroy
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <title>Compartilha</title>
        <link href="css/style.css" type="text/css" rel="stylesheet" />
    </head>
<body>
    <div id="header">
        <div id="logo">
            Compartilha
        </div><!--FECHA LOGO -->
        
        <div id="autentica">
            <P>Usuario não Logado!</P>
        </div>
    </div><!--FECHA HEADER -->

    <div id="content">
       <div id="plogin">
           <p> usuario deslogado</p>
 <p><a href="index.php">Pagina de login</a></p>
    </div> <!--FECHA CONTENT-->

   <div id="footer">
       Todos os direitos resevados. &COPY;2012, SI.COM
   </div> <!--FECHA FOOTER -->
</body>
</html>