<!-- welcome footer -->

		<!--================================ FOOTER AREA ==========================================-->
		
		<footer class="footer style-1 padding-top-20 bg222">
			


			<div class="footer-bottom">
				<div class="container">
					<div class="row clearfix">
						<div class="col-md-12 col-sm-12 col-xs-12 pull-right margin-bottom-20">
							<nav class="footer-menu wsmenu clearfix">
								<ul class="wsmenu-list pull-right">
									<li><a href="https://creativecommons.org/licenses/by/4.0/" target="_blank">
										<img src="{{ asset('frontend/images/cc_icon.png') }}" alt="">
									</a></li>
									<li><a href="https://creativecommons.org/licenses/by/4.0/" target="_blank">
										<img src="{{ asset('frontend/images/attribution_icon.png') }}" alt="">
									</a></li>

								  <li><a href="#" class="">Inicio</a></li>
								  <li><a href="#">Entidades <span class="arrow"></span></a></li>
								  <li><a href="#">Decreto Ejecutivo SISOCS<span class="arrow"></span></a></li>
								  <li><a href="#">Manual de Usuario <span class="arrow"></span></a></li>
								  <li><a href="#">Preguntas Frecuentes <span class="arrow"></span></a></li>
								  <li><a href="#">Contáctenos <span class="arrow"></span></a></li>
								</ul>
							</nav>
						</div>
						
					</div>
				</div>
			</div>
		</footer>
	</div>
	
	<!--================================JQuery===========================================-->
        
	<script type="text/javascript" src="{{ asset('frontend/js/jquery-1.11.3.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.js') }}"></script><!-- jquery 1.11.2 -->
	<script src="{{ asset('frontend/js/jquery.easing.min.js') }}"></script>
	<script src="{{ asset('frontend/js/modernizr.custom.js') }}"></script>
	
	<!--================================BOOTSTRAP===========================================-->
        
	<script src="{{ asset('frontend/bootstrap/js/bootstrap.min.js') }}"></script>	
	
	<!--================================NAVIGATION===========================================-->
	
	<script type="text/javascript" src="{{ asset('frontend/js/menu.js') }}"></script>
	
	<!--================================SLIDER REVOLUTION===========================================-->
		
	<script type="text/javascript" src="{{ asset('frontend/assets/revolution_slider/js/revolution-slider-tool.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/assets/revolution_slider/js/revolution-slider.js') }}"></script>
	
	
	<!--================================OWL CARESOUL=============================================-->
		
	<script src="{{ asset('frontend/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('frontend/js/triger.js') }}" type="text/javascript"></script>
		
	<!--================================FunFacts Counter===========================================-->
		
	<script src="{{ asset('frontend/js/jquery.countTo.js') }}"></script>
	
	<!--================================jquery cycle2=============================================-->
	
	<!--<script src="{{ asset('frontend/js/jquery.cycle2.min.js') }}" type="text/javascript"></script>-->	
	
	<!--================================waypoint===========================================-->
		
	<script type="text/javascript" src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script><!-- Countdown JS FILE -->
	
	<!--================================RATINGS===========================================-->	
	
	<script src="{{ asset('frontend/js/jquery.raty-fa.js') }}"></script>
	<script src="{{ asset('frontend/js/rate.js') }}"></script>
	
	<!--================================ testimonial ===========================================-->
	<script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">	
			
			<div class="rg-image-wrapper">
				<div class="rg-image"></div>
				<div class="rg-caption-wrapper">
					<div class="rg-caption" style="display:none;">
						<p></p>
						<h5></h5>
						<div class="caption-metas">
							<p class="position"></p>
							<p class="orgnization"></p>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</script>	
	<script type="text/javascript" src="{{ asset('frontend/assets/testimonial/js/jquery.tmpl.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/assets/testimonial/js/jquery.elastislide.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/assets/testimonial/js/gallery.js') }}"></script>
	
	<!--================================custom script===========================================-->
		
	<script type="text/javascript" src="{{ asset('frontend/js/custom.js') }}"></script>

	@stack('scripts')

    
</body>
</html>