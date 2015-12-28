<?php
// include_once("../Sql.class.php");
$miSql = new Sqlmenu ();
// var_dump($this->miConfigurador);
$esteBloque = $this->miConfigurador->getVariableConfiguracion ( "esteBloque" );

$rutaBloque = $this->miConfigurador->getVariableConfiguracion ( "host" );
$rutaBloque .= $this->miConfigurador->getVariableConfiguracion ( "site" ) . "/blocks/";
$rutaBloque .= $esteBloque ['grupo'] . "/" . $esteBloque ['nombre'];

$directorio = $this->miConfigurador->getVariableConfiguracion ( "host" );
$directorio .= $this->miConfigurador->getVariableConfiguracion ( "site" ) . "/index.php?";
$directorio .= $this->miConfigurador->getVariableConfiguracion ( "enlace" );

$conexion = "estructura";
$esteRecursoDB = $this->miConfigurador->fabricaConexiones->getRecursoDB ( $conexion );

$miSesion = Sesion::singleton ();
// var_dump($_REQUEST);
// var_dump($_COOKIE);

$id_usuario=$_REQUEST['registro'];

// CambiarContraseña
$_REQUEST ['tiempo'] = time ();
$enlaceCambiarClave ['enlace'] = "pagina=cambiarClave";
$enlaceCambiarClave ['enlace'] .= "&opcion=cambiarClave";
$enlaceCambiarClave ['enlace'] .= "&campoSeguro=" . $_REQUEST ['tiempo'];
$enlaceCambiarClave ['enlace'] .= "&usuario=" . $id_usuario;
$enlaceCambiarClave ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url ( $enlaceCambiarClave ['enlace'], $directorio );
$enlaceCambiarClave ['nombre'] = "Cambiar Contraseña";

// Fin de la sesión

$enlaceFinSesion ['enlace'] = "action=loginArka";
$enlaceFinSesion ['enlace'] .= "&pagina=index";
$enlaceFinSesion ['enlace'] .= "&bloque=loginArka";
$enlaceFinSesion ['enlace'] .= "&bloqueGrupo=registro";
$enlaceFinSesion ['enlace'] .= "&opcion=finSesion";
$enlaceFinSesion ['enlace'] .= "&campoSeguro=" . $_REQUEST ['tiempo'];
$enlaceFinSesion ['enlace'] .= "&sesion=" . $miSesion->getSesionId ();
$enlaceFinSesion ['enlace'] .= "&usuario=" . $id_usuario;
$enlaceFinSesion ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url ( $enlaceFinSesion ['enlace'], $directorio );
$enlaceFinSesion ['nombre'] = "Cerrar Sesión";

// ------------------------------- Inicio del Menú-------------------------- //
?>
<nav id="cbp-hrmenu" class="cbp-hrmenu">
	<ul>
        <li><a href="#">GESTIÓN CONTRATOS</a>
			<div class="cbp-hrsub">
				<div class="cbp-hrsub-inner">
					<div>
						<h4>Contratos</h4>
						<ul>
							<li><a href="<?php echo $enlaceCambiarClave['urlCodificada'] ?>"><?php echo ($enlaceCambiarClave['nombre']) ?></a></li>
							<li><a href="<?php echo $enlaceFinSesion['urlCodificada'] ?>"><?php echo ($enlaceFinSesion['nombre']) ?></a></li>
						</ul>
					</div>
            	</div>
				
			</div>
		</li>
	</ul>
</nav>

