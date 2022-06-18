<?php

class UsuarioModelo{
	private $db;//alamacenar la conexion
	private $usuarios;//almacenar persona
	public function __construct(){
		require_once("Conectar.php");
		$this->db=conectar::conexion();//:: por que es estatico
		$this->usuarios=array();
	}
	
	public function getUsuarios (){
        
        if($_POST['bEstado']=="Activo"){
        	$consulta=$this->db->query("select * from usuarios where estado='Activo'"); 
        }else{
        	if($_POST['bEstado']=="Inactivo"){
        		$consulta=$this->db->query("select * from usuarios where estado='Inactivo'");
        	}
        }

        //$consulta=$this->db->query("select * from persona"); 
		while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
			require_once("Usuario.php");
			$usuario = new Usuario();
                        $usuario->setNombre($fila["nombre"]);
                        $usuario->setCedula($fila["cedula"]);
                        $usuario->setFecha($fila["fechaNacimiento"]);
                        $usuario->setSexo($fila["sexo"]);
                        $usuario->setTipo($fila["tipo"]);
                        $usuario->setEstado($fila["estado"]);
                        $this->usuarios[]=$usuario;
		}
		return $this->usuarios;
	}

	public function buscarUsuario($rr){
		$cc=$_POST['bCedula'];
		$consulta=$this->db->query("select * from usuarios where cedula='$cc'"); 
        //$consulta=$this->db->query("select * from usuarios where cedula= '$cc' ");
		while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
			require_once("Usuario.php");
			$usuario = new Usuario();
                        $usuario->setNombre($fila["nombre"]);
                        $usuario->setCedula($fila["cedula"]);
                        $usuario->setFecha($fila["fechaNacimiento"]);
                        $usuario->setSexo($fila["sexo"]);
                        $usuario->setTipo($fila["tipo"]);
                        $usuario->setEstado($fila["estado"]);
                        $this->usuarios[]=$usuario;
		}
		return $this->usuarios;
	}

	public function actualisarUsuario($usuario){
		//
		$nombre=$usuario->getnombre();
		$cedula=$usuario->getCedula();
		$fecha=$usuario->getFecha();
		$sexo=$usuario->getSexo();
		$tipo=$usuario->getTipo();
		$estado=$usuario->getEstado();
		try{

		if($this->db->query("UPDATE usuarios set nombre='$nombre', fechaNacimiento='$fecha', sexo='$sexo', tipo='$tipo', estado='$estado'WHERE cedula='$cedula'") ){
			return true;
		} else{
			return false;
		}

		}catch (Exception $e){
			//die ("Error".$e->getMessage());
			?>
			<script>alert("<?php echo "Linea del error: ".$e->getLine()."__NO INGREESO LOS DATOS CORECTAMENTE."; ?>");</script>
			<?php
     	}
	}

	public function addUsuario ($usuario){
		/*?> <script>alert("<?php echo $usuario->getFecha(); ?>");</script><?php*/
        $nombre=$usuario->getnombre();
		$cedula=$usuario->getCedula();
		$fecha=$usuario->getFecha();
		$sexo=$usuario->getSexo();
		$tipo=$usuario->getTipo();
		$estado=$usuario->getEstado();
		try{

		if($this->db->query("INSERT INTO usuarios(nombre, cedula, fechaNacimiento, sexo, tipo, estado)VALUES('$nombre', '$cedula', '$fecha', '$sexo', '$tipo', '$estado')")){
			return true;
		} else{
			return false;
		}

		}catch (Exception $e){
			//die ("Error".$e->getMessage());
			?>
			<script>alert("<?php echo "Linea del error: ".$e->getLine()."__Cedula ya Existente."; ?>");</script>
			<?php
     	}
	}
}