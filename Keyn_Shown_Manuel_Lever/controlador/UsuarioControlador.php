<?php

class UsuarioControlador {
    
    function __construct() {
        
    }

	function getUsuarios(){
		
		require_once ('modelo/UsuarioModelo.php');
		$usuarioMo=new UsuarioModelo();
		$rest = $usuarioMo->getUsuarios($_POST['bEstado']);
        $arr=array();
		foreach ( $rest as $obj){
			$arr[]= array($obj->getNombre(),$obj->getCedula(),$obj->getFecha(),$obj->getSexo(),$obj->getTipo(),$obj->getEstado());
		}
		return $arr;

	}

    function buscarUsuario(){
        require_once ('modelo/UsuarioModelo.php');  
        $usuarioMo=new UsuarioModelo();
        $rest = $usuarioMo->buscarUsuario($_POST['bCedula']);
        $arr=array();
        foreach ( $rest as $obj){
            $arr[]= array($obj->getNombre(),$obj->getCedula(),$obj->getFecha(),$obj->getSexo(),$obj->getTipo(),$obj->getEstado());
        }
        return $arr;
    }
	
    function addUsuario($arr){
        require_once ('modelo/Usuario.php');
        require_once ('modelo/UsuarioModelo.php');

        $usuario = new Usuario();
        $usuarioMo=new UsuarioModelo();
        $usuario->setNombre($arr["nombre"]);		
        $usuario->setCedula($arr["cedula"]);
        $usuario->setFecha($arr["fecha"]);
        $usuario->setSexo($arr["sexo"]);
        $usuario->setTipo($arr["tipo"]);
        $usuario->setEstado($arr["estado"]);
        return $usuarioMo->addUsuario($usuario);
    }

    function actualisarUsuario($arr){
        require_once ('modelo/Usuario.php');
        require_once ('modelo/UsuarioModelo.php');

        $usuario = new Usuario();
        $usuarioMo=new UsuarioModelo();
        $usuario->setNombre($arr["nombre"]);        
        $usuario->setCedula($arr["cedula"]);
        $usuario->setFecha($arr["fecha"]);
        $usuario->setSexo($arr["sexo"]);
        $usuario->setTipo($arr["tipo"]);
        $usuario->setEstado($arr["estado"]);
        return $usuarioMo->actualisarUsuario($usuario);
    }

    function iniciar($arr){
        $_SESSION['Reg']='ok';
        return null;
    }
    function cerrar(){
        $_SESSION['Reg']='no';
        return null;
    }
}
