@extends('layout_front')

@section('content')
	
	<!--================================PAGE TITLE==========================================-->
		<div class="page-title-wrap bgamarillo padding-top-150 padding-bottom-30"><!-- section title -->
			<h4 class="white">Preguntas Frecuentes</h4>
		</div><!-- section title end -->
		
		<!--================================listing SECTION==========================================-->
		
		<section class="aside-layout-section padding-top-70 padding-bottom-40">
			<div class="container"><!-- section container -->
				<div class="row"><!-- row -->
					<div class="col-md-9 col-sm-8 col-xs-12 main-wrap"><!-- content area column -->
						<div class="blog-section padding-bottom-40">
							

							<div class="entry-wrap shadow-1 margin-bottom-20"><!-- blog entry -->
								
								<div class="entry-content">
									<div class="entry-title">
										<h4>1 ¿Qué es SISOCS y para qué se utiliza?</h4>
									</div>

									<div class="entry-disc">
										<p>
											El Sistema de Información y Seguimiento a Obras y Contratos de Supervisión “SISOCS” es la
herramienta creada por Decreto Ejecutivo PCM 02-2015, mediante la cual se publica y difunde
información relevante de los procesos de planificación, adquisición, contratación y ejecución
de los proyectos de infraestructura pública.
										</p>
									</div>
								</div>
							</div><!-- blog entry end -->


							<div class="entry-wrap shadow-1 margin-bottom-20"><!-- blog entry -->
								
								<div class="entry-content">
									<div class="entry-title">
										<h4>2. ¿Cuáles son las instituciones que ingresan proyectos?</h4>
									</div>

									<div class="entry-disc">
										<p>
										
De acuerdo al <a href="http://sisocs.org/docs/decreto_sisocs.pdf" target="blank">Decreto Ejecutivo PCM02-2015</a> las entidades que forman partedel Gabinete Central de Infraestructura Productiva están obligadas a divulgar información en SISOCS. Estas instituciones son: La Secretaría de Infraestructura y Servicios Públicos (INSEP) a
través de la Dirección General de Carreteras(DGC), el Fondo Vial, la Secretaría de Salud
(SESAL), la Secretaría de Educación (SEDUC), Inversión Estratégica de Honduras (INVEST-H), la
Empresa Nacional Portuaria (ENP), Hondutel, Empresa Nacional de Energía Eléctrica (ENEE), y
el Instituto de Desarrollo Comunitario de Agua y Saneamiento (IDECOAS).
										</p>
									</div>
								</div>
							</div><!-- blog entry end -->



							<div class="entry-wrap shadow-1 margin-bottom-20"><!-- blog entry -->
								
								<div class="entry-content">
									<div class="entry-title">
										<h4>3 ¿Cómo puedo buscar un proyecto?</h4>
									</div>

									<div class="entry-disc">
										<p>
											Para buscar información sobre el proyecto que deseas solo debes colocar alguna palabra clave relacionada a la ubicación del proyecto, por ejemplo, nombre de la ciudad o municipio. Si tienes el nombre del proyecto también puedes colocarlo. 
<br><br>Para más información sobre el uso del sistema puedes descargar el Manual de Usuario ciudadano <a href="http://sisocs.local:8888/docs/manual_sisocs.pdf" target="blank">aquí</a>. 

										</p>
									</div>
								</div>
							</div><!-- blog entry end -->


							<div class="entry-wrap shadow-1 margin-bottom-20"><!-- blog entry -->
								
								<div class="entry-content">
									<div class="entry-title">
										<h4>4. ¿Por qué no encuentro el proyecto que busco?</h4>
									</div>

									<div class="entry-disc">
										<p>
											Antes de buscar un proyecto es importante que trates de investigar cual es la entidad está a cargo del proyecto, tomando en cuenta que no todas las entidades a cargo de ejecutar proyectos de infraestructura pública se encuentran divulgando en este portal. Por ejemplo, los proyectos ejecutados bajo modalidad de Alianza Público-Privada se encuentran en el portal de transparencia de APP, al cual puedes acceder haciendo <a href="">clic aquí</a>. <br><br>
Si el proyecto que buscas pertenece a alguna de las entidades obligadas a divulgar información aquí pero aun así no encuentras la información, es probable que esta aun no haya sido publicada. Para verificar si es este el caso puedes enviar una pregunta en la viñeta de <a href="contacto.php" target="blank">“contáctenos”</a> .

										</p>
									</div>
								</div>
							</div><!-- blog entry end -->



							<div class="entry-wrap shadow-1 margin-bottom-20"><!-- blog entry -->
								
								<div class="entry-content">
									<div class="entry-title">
										<h4>5. ¿Qué tipo de información puedo encontrar en SISOCS? </h4>
									</div>

									<div class="entry-disc">
										<p>
											En el Sistema de Información y Seguimiento de Obras y Contratos de Supervisión (SISOCS) podrás encontrar toda la información de cada una de las etapas en la que se encuentran los proyectos de infraestructura ejecutados por las entidades antes mencionadas. Esta información corresponde a 66 puntos de datos del Estándar de la Iniciativa de <a href="http://www.costhonduras.hn/" target="blank">Transparencia en Infraestructura CoST Honduras </a> 
											<br><br>
Algunos de estos datos son: nombre de las empresas participantes en la licitación, y nombre de la empresa adjudicada, el contrato de construcción y supervisión, el costo inicial y final del proyecto, razones de modificaciones de los contratos, entre otros. 

										</p>
									</div>
								</div>
							</div><!-- blog entry end -->




							<div class="entry-wrap shadow-1 margin-bottom-20"><!-- blog entry -->
								
								<div class="entry-content">
									<div class="entry-title">
										<h4>¿Tienes alguna otra pregunta? </h4>
									</div>

									<div class="entry-disc">
										<p>
											Envíala a nuestro <a href="contacto.php" target="blank">formulario de contacto</a>.
										</p> 


									</div>
								</div>
							</div><!-- blog entry end -->
						
					


						</div>
					</div><!-- content area end -->
					

					<!-- rightbar -->
					@component('elements.welcome_rightbar', ['instituciones' => $instituciones])
					@endcomponent


				</div>
			</div><!-- section container end -->
		</section>

@endsection