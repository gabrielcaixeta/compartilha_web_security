<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Compartilha</title>
    <link href="css/style.css" type="text/css" rel="stylesheet" />
</head>

<body>
<div id="header">
        <div id="logo">
            Compartilha
        </div>
<?php
require_once('verifica_sessao.php');
 
 ?>
</div><!--FECHA HEADER -->
 <div id="menu">
    <a href="area_restrita.php?pg=view/canal/lista" >Canais</a> &nbsp;&nbsp;&nbsp;
    <a href="area_restrita.php?pg=view/curso/lista" >Cursos</a> &nbsp;&nbsp;&nbsp;
    <a href="area_restrita.php?pg=view/usuariocurso/lista" >Meus Cursos</a> &nbsp;&nbsp;&nbsp;
   
 </div><!--FECHA MENU -->
<br />
<div id="content"> 
    <div id="contet-wrap">
        <?php 
             foreach ($_REQUEST as $___opt => $___val) {
              $$___opt = $___val;
             }
            if(empty($pg)) {
              include("view/canal/lista.php");
             }
            elseif(!is_file("$pg.php") )
             {
               echo '<span>A p?gina n?o existe.</span><br><span>Por favor selecione uma p?gina a partir do Menu Principal.</span>'; 
             }
             else {
               include("$pg.php");
             }
           ?>
    </div>
</div><!--FECHA CONTENT -->
 <div id="footer">
       Todos os direitos resevados. &COPY;2012, SI.COM
   </div> <!--FECHA FOOTER -->
</body>
</html>
