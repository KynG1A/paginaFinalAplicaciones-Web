<?php

class LibroModelo{
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

	public function addLibro ($libro, $ejemplares){
		/*?> <script>alert("<?php echo $usuario->getFecha(); ?>");</script><?php*/
        $nombre=$libro->getnombre();
		$isbn=$libro->getIsbn();
		$codigo=$libro->getCodigo();
		$categoria=$libro->getCategoria();
		$estado=$libro->getEstado();
		$cadena="INSERT INTO libros(nombreLibro	, ISBN, codigoEjemplar, categoria, estado)VALUES ";
		for($i=0;$i<$ejemplares;$i++){
			$cadena .="('".$nombre."','".$isbn."','".$codigo[$i]."','".$categoria."','".$estado[$i]."'),";
		}
		$cadena_final=substr($cadena,0,-1);
		$cadena_final.=";";
		try{

		if($this->db->query($cadena_final)){
			return true;
		} else{
			return false;
		}

		}catch (Exception $e){
			//die ("Error".$e->getMessage());
			?>
			<script>alert("<?php echo "Linea del error: ".$e->getLine()."__ISBN y CODIGO ya Existente."; ?>");</script>
			<?php
     	}
	}
}