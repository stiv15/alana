<?php
if (! isset ( $GLOBALS ["autorizado"] )) {
	include ("../index.php");
	exit ();
}
class Formulario {
	var $miConfigurador;
	var $lenguaje;
	var $miFormulario;
	function __construct($lenguaje, $formulario) {
		$this->miConfigurador = \Configurador::singleton ();
		
		$this->miConfigurador->fabricaConexiones->setRecursoDB ( 'principal' );
		
		$this->lenguaje = $lenguaje;
		
		$this->miFormulario = $formulario;
	}
	function formulario() {
		$directorioImagenes = $this->miConfigurador->getVariableConfiguracion ( "rutaUrlBloque" ) . "/css/imagen";
		// Rescatar los datos de este bloque
		$esteBloque = $this->miConfigurador->getVariableConfiguracion ( "esteBloque" );
		
		$rutaBloque = $this->miConfigurador->getVariableConfiguracion ( "host" );
		$rutaBloque .= $this->miConfigurador->getVariableConfiguracion ( "site" ) . "/blocks/";
		$rutaBloque .= $esteBloque ['grupo'] . "/" . $esteBloque ['nombre'];
		$rutaBloque .= '/css';
		$atributosGlobales ['campoSeguro'] = 'false';
		$_REQUEST ['tiempo'] = time ();
		
		// -------------------------------------------------------------------------------------------------
		
		?>



<div id="Fondo_Slider">
	<div id="slider1_container"
		style="position: inherit; top: 0px; left: 0px; width: 1800px; height: 880px; overflow: hidden; z-index: 0;">
		<!-- Slides Container -->
		<div u="slides"
			style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 1800px; height: 880px; overflow: hidden;z-index: 0;">
			<div>
				<img u="image" src="<?php echo $rutaBloque ?>/imagen/Fractales1.jpg" />
			</div>
			<div>
				<img u="image" src="<?php echo $rutaBloque ?>/imagen/Fractales2.jpg" />
			</div>
			<div>
				<img u="image" src="<?php echo $rutaBloque ?>/imagen/Fractales3.jpg" />
			</div>
			<div>
				<img u="image" src="<?php echo $rutaBloque ?>/imagen/Fractales4.jpg" />
			</div>
		</div>
	</div>
</div>





<header>
	<div id="fondo_base"></div>
</header>
<section>
	<article id="botonRegistro">

		<button id="abrir"
			class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only"
			role="button" aria-disabled="false">ACCESO APLICATIVO</button>

	</article>

	<article id="fondo_login"> 
                <?php
		
		// ---------------- SECCION: Parámetros Generales del Formulario ----------------------------------
		$esteCampo = $esteBloque ['nombre'];
		$atributos ['id'] = $esteCampo;
		$atributos ['nombre'] = $esteCampo;
		/**
		 * Nuevo a partir de la versión 1.0.0.2, se utiliza para crear de manera rápida el js asociado a
		 * validationEngine.
		 */
		$atributos ['validar'] = false;
		
		// Si no se coloca, entonces toma el valor predeterminado 'application/x-www-form-urlencoded'
		$atributos ['tipoFormulario'] = '';
		
		// Si no se coloca, entonces toma el valor predeterminado 'POST'
		$atributos ['metodo'] = 'POST';
		
		// Si no se coloca, entonces toma el valor predeterminado 'index.php' (Recomendado)
		$atributos ['action'] = 'index.php';
		$atributos ['titulo'] = $this->lenguaje->getCadena ( $esteCampo );
		
		// Si no se coloca, entonces toma el valor predeterminado.
		$atributos ['estilo'] = '';
		$atributos ['marco'] = false;
		$tab = 1;
		// ---------------- FIN SECCION: de Parámetros Generales del Formulario ----------------------------
		// ----------------INICIAR EL FORMULARIO ------------------------------------------------------------
		$atributos ['tipoEtiqueta'] = 'inicio';
		$atributos = array_merge ( $atributos, $atributosGlobales );
		echo $this->miFormulario->formulario ( $atributos );
		
		$atributosGlobales ['campoSeguro'] = 'true';
		$_REQUEST ['tiempo'] = time ();
		
		// -------------------------------------------------------------------------------------------------
		
		$atributos ["id"] = "botones";
		$atributos ["estilo"] = "marcoBotones";
		echo $this->miFormulario->division ( "inicio", $atributos );
		unset ( $atributos );
		
		$esteCampo = 'usuario';
		$atributos ['id'] = $esteCampo;
		$atributos ['nombre'] = $esteCampo;
		$atributos ['tipo'] = 'text';
		$atributos ['estilo'] = 'login jqueryui';
		$atributos ['marco'] = false;
		$atributos ['columnas'] = 1;
		$atributos ['dobleLinea'] = false;
		$atributos ['tabIndex'] = $tab;
		$atributos ['textoFondo'] = $this->lenguaje->getCadena ( $esteCampo );
		$atributos ['validar'] = 'required';
		
		if (isset ( $_REQUEST [$esteCampo] )) {
			$atributos ['valor'] = $_REQUEST [$esteCampo];
		} else {
			$atributos ['valor'] = '';
		}
		$atributos ['titulo'] = $this->lenguaje->getCadena ( $esteCampo . 'Titulo' );
		$atributos ['deshabilitado'] = false;
		$atributos ['tamanno'] = 20;
		$atributos ['maximoTamanno'] = '20';
		$tab ++;
		
		// Aplica atributos globales al control
		$atributos = array_merge ( $atributos, $atributosGlobales );
		echo $this->miFormulario->campoCuadroTexto ( $atributos );
		unset ( $atributos );
		
		$esteCampo = 'clave';
		$atributos ['id'] = $esteCampo;
		$atributos ['nombre'] = $esteCampo;
		$atributos ['tipo'] = 'password';
		$atributos ['estilo'] = 'login jqueryui';
		$atributos ['marco'] = false;
		$atributos ['columnas'] = 1;
		$atributos ['dobleLinea'] = false;
		$atributos ['tabIndex'] = $tab;
		$atributos ['textoFondo'] = $this->lenguaje->getCadena ( $esteCampo );
		$atributos ['validar'] = 'required';
		
		if (isset ( $_REQUEST [$esteCampo] )) {
			$atributos ['valor'] = $_REQUEST [$esteCampo];
		} else {
			$atributos ['valor'] = '';
		}
		$atributos ['titulo'] = $this->lenguaje->getCadena ( $esteCampo . 'Titulo' );
		$atributos ['deshabilitado'] = false;
		$atributos ['tamanno'] = 20;
		$atributos ['maximoTamanno'] = '10';
		$tab ++;
		
		// Aplica atributos globales al control
		$atributos = array_merge ( $atributos, $atributosGlobales );
		echo $this->miFormulario->campoCuadroTexto ( $atributos );
		unset ( $atributos );
		
		echo $this->miFormulario->division ( "fin" );
		
		$atributos ["id"] = "botones";
		$atributos ["estilo"] = "marcoBotones";
		echo $this->miFormulario->division ( "inicio", $atributos );
		unset ( $atributos );
		
		// -----------------CONTROL: Botón ----------------------------------------------------------------
		$esteCampo = 'botonIngresar';
		$atributos ["id"] = $esteCampo;
		$atributos ["tabIndex"] = $tab;
		$atributos ["tipo"] = 'boton';
		// submit: no se coloca si se desea un tipo button genérico
		$atributos ['submit'] = true;
		$atributos ["estiloMarco"] = '';
		$atributos ["estiloBoton"] = 'jqueryui';
		// verificar: true para verificar el formulario antes de pasarlo al servidor.
		$atributos ["verificar"] = true;
		$atributos ["tipoSubmit"] = 'jquery'; // Dejar vacio para un submit normal, en este caso se ejecuta la función submit declarada en ready.js
		$atributos ["valor"] = $this->lenguaje->getCadena ( $esteCampo );
		$atributos ['nombreFormulario'] = $esteBloque ['nombre'];
		$tab ++;
		
		// Aplica atributos globales al control
		$atributos = array_merge ( $atributos, $atributosGlobales );
		echo $this->miFormulario->campoBoton ( $atributos );
		unset ( $atributos );
		
		// ------------------Fin Division para los botones-------------------------
		echo $this->miFormulario->division ( "fin" );
		
		// Paso 1: crear el listado de variables
		
		$valorCodificado = "action=" . $esteBloque ["nombre"];
		$valorCodificado .= "&pagina=" . $this->miConfigurador->getVariableConfiguracion ( 'pagina' );
		$valorCodificado .= "&bloque=" . $esteBloque ['nombre'];
		$valorCodificado .= "&bloqueGrupo=" . $esteBloque ["grupo"];
		$valorCodificado .= "&opcion=validarLogin";
		$valorCodificado .= "&tiempo=" . $_REQUEST ['tiempo'];
		/**
		 * SARA permite que los nombres de los campos sean dinámicos.
		 * Para ello utiliza la hora en que es creado el formulario para
		 * codificar el nombre de cada campo.
		 */
		$valorCodificado .= "&campoSeguro=" . $_REQUEST ['tiempo'];
		// Paso 2: codificar la cadena resultante
		$valorCodificado = $this->miConfigurador->fabricaConexiones->crypto->codificar ( $valorCodificado );
		
		$atributos ["id"] = "formSaraData"; // No cambiar este nombre
		$atributos ["tipo"] = "hidden";
		$atributos ['estilo'] = '';
		$atributos ["obligatorio"] = false;
		$atributos ['marco'] = true;
		$atributos ["etiqueta"] = "";
		$atributos ["valor"] = $valorCodificado;
		echo $this->miFormulario->campoCuadroTexto ( $atributos );
		unset ( $atributos );
		
		// ----------------FIN SECCION: Paso de variables -------------------------------------------------
		// ---------------- FIN SECCION: Controles del Formulario -------------------------------------------
		// ----------------FINALIZAR EL FORMULARIO ----------------------------------------------------------
		// Se debe declarar el mismo atributo de marco con que se inició el formulario.
		$atributos ['marco'] = true;
		$atributos ['tipoEtiqueta'] = 'fin';
		echo $this->miFormulario->formulario ( $atributos );
		?>
            </article>
	<div id="logo_u">
		<img src="<?php echo $directorioImagenes ?>/escudo.png" width='100'
			height='100' />
	</div>


</section>



<?php ?>
<section>
	<div id="fondo_texto">
		<div id="texto">
			<h3>SISTEMA DE GESTIÓN</h3>
			<h3>CONTRACTUAL Y COMPRAS</h3>
			<BR>
			<h2>ARGO</h2>
		</div>
	</div>
</section>
<footer>
	<br>

	<div id="footerLeft">
		<p>Universidad Distrital Francisco José de Caldas</p>
		<p>
			Todos los derechos reservados. Carrera 8 N. 40-78 Piso 1 / PBX
			3238400 - 3239300 <a href="">computo@udistrital.edu.co</a>
		</p>
	</div>
	<div id="footerRight">
		<a href="https://www.facebook.com/UniversidadDistrital.SedeIngenieria"
			target="_blank"><img
			src="<?php echo $directorioImagenes ?>/facebook.png" /></a> <a
			href="https://plus.google.com/110031223488101566921/about?gl=co&hl=es"
			target="_blank"><img
			src="<?php echo $directorioImagenes ?>/google+.png" /></a> <a
			href="http://www.udistrital.edu.co/" target="_blank"><img
			src="<?php echo $directorioImagenes ?>/mail.png" /></a>
	</div>
</footer>

<?php
	}
	function mensaje() {
		
		// Si existe algun tipo de error en el login aparece el siguiente mensaje
		$mensaje = $this->miConfigurador->getVariableConfiguracion ( 'mostrarMensaje' );
		$this->miConfigurador->setVariableConfiguracion ( 'mostrarMensaje', null );
		
		if (isset ( $_REQUEST ['error'] ) == true || isset ( $_REQUEST ['mostrarMensaje'] ) == true) {
			
			if (isset ( $_REQUEST ['mostrarMensaje'] ) == true) {
				$mensaje = $_REQUEST ['mostrarMensaje'];
				$atributos ["estilo"] = 'information';
			} else if (isset ( $_REQUEST ['error'] ) == true) {
				$atributos ["estilo"] = 'error';
				$mensaje = $_REQUEST ['error'];
			}
			// -------------Control texto-----------------------
			$esteCampo = 'divMensaje';
			$atributos ['id'] = $esteCampo;
			$atributos ["tamanno"] = '';
			$atributos ["etiqueta"] = '';
			$atributos ["columnas"] = ''; // El control ocupa 47% del tamaño del formulario
			$atributos ['mensaje'] = $this->lenguaje->getCadena ( $mensaje );
			echo $this->miFormulario->campoMensaje ( $atributos );
			unset ( $atributos );
		}
		return true;
	}
}

$miFormulario = new Formulario ( $this->lenguaje, $this->miFormulario );
$miFormulario->formulario ();
$miFormulario->mensaje ();
?>