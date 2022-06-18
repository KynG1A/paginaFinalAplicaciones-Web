<?php

class conectar{	
	public static function conexion(){
		
		try{
			$conexion = new PDO ('mysql:localhost=localhost; dbname=biblioteca;','test','12345678');
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conexion->exec("SET CHARACTER SET UTF8");
			
		}catch(Exception $e){
			die ("Error".$e->getMessage());
			?>
			<script>alert("<?php echo "Linea del error".$e->getLine(); ?>");</script>
			<?php
			//echo "Linea del error".$e->getLine();
		}
		return $conexion;
	}
}