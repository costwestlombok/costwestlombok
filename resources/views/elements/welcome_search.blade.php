<!-- buscador -->
<!--================================ STATIC HEADER SECTION==========================================-->
		<?php   
		$instituciones = array(
		    "HONDUTEL"=>"hondutel",
		    "ENP"=>"enp",
		    //"COALIANZA"=>"coalianza",
		    "Fondo Vial"=>"fondovial",
		    "INSEP" => "insep",
		    //"SAPP" => "sapp",
		    "InvestH" => "invest",
		    "ENEE" => "enee",
		    "IDECOAS" => "idecoas",
		    "SESAL" => "sesal",
		    "SEDUC" => "seduc"
		);
		?>

		<section class="static-section" id="section-search">
			<div class="container">
				<div class="static-header-content">
					<div class="static-header-text">
						<h4 class="white">Bienvenidos al   </h4>
						<h4 class="white margin-bottom-60"><span class="blue-1">Sistema de Información y Seguimiento  de Obras y Contratos de Supervisión</span></h4>
					</div>

					<?php 
					ini_set('display_errors', true);
					if($_POST){
						$busqueda = trim($_POST['palabras']);
						$entidad0 = trim($_POST['entidad']);
					}
					if (empty($busqueda)){
						$busqueda ="";
					}
					if (empty($entidad0)){
						$entidad0 ="Todas las Entidades";
					}
					?>		
					<div class="container ">
						<div class="search-form-wrap">
							<form class="clearfix" action="{{ route('transparency.results') }}" method="POST">


		          				<input type="hidden" name="_token" value="{{ csrf_token() }}">

		          				<div class="row">
		          					<div class="col-md-4">
										<div class="input-field-wrap pull-left">
											<input class="search-form-input" name="palabras" placeholder="Ingrese texto a buscar..."  value="<?php echo $busqueda; ?>" type="text"/>
										</div>
		          					</div>
		          					<div class="col-md-4">
										<div class="select-field-wrap pull-left">
											<select class="search-form-select" name="municipio" >
												<option class="options" value="0">Todos los departamentos</option>
												<option class="options" value="1">Atlántida</option>
												<option class="options" value="2">Colón</option>
												<option class="options" value="3">Comayagua</option>
												<option class="options" value="4">Copán</option>
												<option class="options" value="5">Cortés</option>
												<option class="options" value="6">Choluteca</option>
												<option class="options" value="7">El Paraíso</option>					
												<option class="options" value="8">Francisco Morazán</option>
												<option class="options" value="9">Gracias a Dios</option>
												<option class="options" value="10">Intibucá</option>
												<option class="options" value="11">Islas de la Bahía</option>
												<option class="options" value="12">La Paz</option>
												<option class="options" value="13">Lempira</option>
												<option class="options" value="14">Ocotepeque</option>
												<option class="options" value="15">Olancho</option>
												<option class="options" value="16">Santa Bárbara</option>
												<option class="options" value="17">Valle</option>
												<option class="options" value="18">Yoro</option>			
											</select>
										</div>
		          					</div>
		          					<div class="col-md-4">
		          						<div class="select-field-wrap pull-left">

											<select class="search-form-select" name="entidad">
												<option value="0">TODAS</option>
											<?php
											//include 'array_instituciones.php'; 
											//$entidades = array('Todas las entidades', 'FondoVial', 'InvestH','INSEP','ENP');
											$current_entidad = strtoupper($entidad0);
											$i = 1;
											foreach($instituciones as $x => $entidad) { 

											//foreach($entidades as $entidad) {
											    if(strtoupper($entidad) == $current_entidad) {
											        echo '<option selected="selected" value="'.$i.'">'. strtoupper($entidad).'</option>';
											    } else {
											        echo '<option value="'.$i.'">'. strtoupper($entidad).'</option>';
											    }
											    $i++;
											}
											?>
											</select>

											<!--

											<select class="search-form-select" name="entidad" >
												<option class="options" value="1">Todas las Entidades</option>
												<option class="options" value="2">ENP</option>
												<option class="options" value="3">INSEP</option>
												<option class="options" value="4">HONDUTEL</option>
												<option class="options" value="5">Fondo Vial</option>
												<option class="options" value="6">wordpress</option>
												<option class="options" value="7">bootstrap</option>
											</select>

											-->

										</div>
		          					</div>
									
								</div>
								<div class="row">

									<div class="col-md-4">
										<div class="input-field-wrap pull-left">
											<input class="search-form-input" name="codigo" placeholder="Ingrese un código..."  value="<?php echo $busqueda; ?>" type="text"/>
										</div>
									</div>
									<div class="col-md-4">
										<div class="input-field-wrap pull-left">
											<input class="search-form-input" name="publicacion" placeholder="Seleccione fecha de publicación..."  value="<?php echo $busqueda; ?>" type="text"/>
										</div>
									</div>
									<div class="col-md-4">
										<div class="select-field-wrap pull-left">
											<!--<input class="search-form-input" name="palabras" placeholder="Seleccione un sector..."  value="<?php echo $busqueda; ?>" type="text"/>-->
											<select class="search-form-select pull-left" name="sector">
												<option>INFRAESTRUCTURA</option>
												<option>INFRAESTRUCTURA</option>
											</select>
										</div>

									</div>

								</div>
								<div class="row" style="text-align: center;">
									<div class="col-md-12" class="text-center" style="text-align: center;">
										<div class="submit-field-wrap" style="margin: 0 auto;">
											<input class="search-form-submit bgblack white" name="boton" type="submit" value="Buscar" />
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

		</section>

