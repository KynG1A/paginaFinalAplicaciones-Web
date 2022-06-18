<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
            
        </style>
    </head>
    <body>
        <?php
        //session_start();
        session_start();

        if(isset($_SESSION['Reg'])){
            if($_SESSION['Reg']=='ok'){
                echo "2";
            }
            if($_SESSION['Reg']=='no'){
                echo    "no existe";
                session_destroy();
            }
        }
        ?><br><br><br><?php 
        if($_POST['enviar']){
            $controlador =$_POST['controlador'];
            $accion =$_POST['accion'];
            $vista1=$_POST['vista1'];
            if (file_exists("controlador/{$controlador}.php")){
                    require_once("controlador/{$controlador}.php");
                    $con = new $controlador();
                    $resp=$con->$accion($_POST);
                    require_once("vista/{$vista1}.html");
            }else{
                    echo"no existe";
            }
		
        }else{
            require_once("vista/generalVista.html");

            /*?><script>alert("<?php echo "Linea del error"; ?>");</script><?php*/
        }

        ?>
    </body>
</html>
