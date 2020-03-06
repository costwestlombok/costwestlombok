@extends('layout_pages')

@section('content')
	<!-- World map -->
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title">Mapa del Proyecto</h5>				
				</div>

				<div class="panel-body">				
					<!--<div class="map-container map-world"></div>-->
					<iframe src="https://www.google.com/maps/embed?pb=!1m12!1m10!1m3!1d1814366.9465232622!2d-86.6876183658756!3d14.374767409206175!2m1!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2shn!4v1555189533836!5m2!1ses-419!2shn" width="100%" height="550" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
	<!-- /world map -->
@endsection

@push('scripts')
<script src="{{ asset('js/maps/jvectormap/jvectormap.min.js') }}"></script>
<script src="{{ asset('js/maps/jvectormap/map_files/world.js') }}"></script>
<script src="{{ asset('js/pages/maps_vector.js') }}"></script>
@endpush