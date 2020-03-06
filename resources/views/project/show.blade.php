@extends('layout')

@push('styles')
	<link type="text/css" rel="stylesheet" href="{{asset('css/fab.css')}}">
@endpush

@section('content')

	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default no-margin-bottom no-border-bottom">
				<div class="panel-heading">
					<h3 class="panel-title">@lang('labels.project')</h3>						
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12 text-right">
							<button class="btn btn-default">Assign</button>										
							<!--<button class="btn btn-default">Submit ticket</button>
							<button class="btn btn-success">Start project</button>
							<button class="btn btn-danger">Cancel project</button>-->
						</div>
					</div>								
					
					<div class="row m-t-20">
						<div class="col-md-12">
							<h4>Project description</h4>
							<p class="text-size-large">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>
							<p class="text-size-large">Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.</p>
							<p class="text-size-large">Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.</p>
							<p class="text-size-large">Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. </p>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-flat no-margin-top no-margin-bottom no-border-bottom">
				<div class="panel-heading">
					<h4 class="panel-title">Files</h4>						
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-1 col-xs-2">
							<i class="icon-file-pdf icon-2x m-t-5"></i>
						</div>									
						<div class="col-md-7 col-xs-5">
							<div class="no-padding no-margin">Project_wireframe.pdf<small class="display-block">14MB</small></div>
						</div>									
						<div class="col-md-4 col-xs-5 text-right">
							<button class="btn btn-default btn-xs"><i class="icon-eye2 position-left"></i>View</button>
							<button class="btn btn-default btn-xs"><i class="icon-download4 position-left"></i>Download</button>
						</div>
					</div>
					<div class="row m-t-20">
						<div class="col-md-1 col-xs-2">
							<i class="icon-file-excel icon-2x m-t-5"></i>
						</div>									
						<div class="col-md-7 col-xs-5">
							<div class="no-padding no-margin">Project_timeline.xls<small class="display-block">1.2MB</small></div>
						</div>									
						<div class="col-md-4 col-xs-5 text-right">
							<button class="btn btn-default btn-xs"><i class="icon-eye2 position-left"></i>View</button>
							<button class="btn btn-default btn-xs"><i class="icon-download4 position-left"></i>Download</button>
						</div>
					</div>								
					<hr>
					<form enctype="multipart/form-data" class="m-t-20">
						<div class="form-group no-margin-bottom">
							<input id="file-4" class="file" type="file" multiple data-preview-file-type="any" data-upload-url="#">
						</div>
					</form>
				</div>
			</div>
			<div class="panel panel-flat no-margin-top">
				<div class="panel-heading">
					<h4 class="panel-title">Advances</h4>						
				</div>
				<div class="panel-body">
					<div class="media">
						<div class="media-left">
							<a href="projects_details.htm#"><img src="assets/images/faces/face9.png" class="img-circle" alt=""></a>
						</div>

						<div class="media-body">
							<h6 class="media-heading">Marilyn Romero<span class="media-annotation pull-right">2 hours ago</span></h6>
							Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.

							<ul class="list-inline m-t-5">												
								<li><a href="projects_details.htm#"><i class="icon-reply text-success position-left"></i>Reply</a></li>
								<li><a href="projects_details.htm#"><i class="icon-pencil6 text-danger position-left"></i>Edit</a></li>
							</ul>
						</div>
					</div>

					<div class="media">
						<div class="media-left">
							<a href="projects_details.htm#"><img src="assets/images/faces/face6.png" class="img-circle" alt=""></a>
						</div>

						<div class="media-body">
							<h6 class="media-heading">Jonaly Smith<span class="media-annotation pull-right">1 day ago</span></h6>
							Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 

							<ul class="list-inline m-t-5">												
								<li><a href="projects_details.htm#"><i class="icon-reply text-success position-left"></i>Reply</a></li>
								<li><a href="projects_details.htm#"><i class="icon-pencil6 text-danger position-left"></i>Edit</a></li>
							</ul>
						</div>
					</div>
					
					<div class="media">
						<div class="media-left">
							<a href="projects_details.htm#"><img src="assets/images/faces/face8.png" class="img-circle" alt=""></a>
						</div>

						<div class="media-body">
							<h6 class="media-heading">John Deo<span class="media-annotation pull-right">3 days ago</span></h6>
							Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. 

							<ul class="list-inline m-t-5">												
								<li><a href="projects_details.htm#"><i class="icon-reply text-success position-left"></i>Reply</a></li>
								<li><a href="projects_details.htm#"><i class="icon-pencil6 text-danger position-left"></i>Edit</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="panel panel-flat">							
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<h5 class="no-margin">Time working:</h5>
						</div>
						
						<div class="col-md-6 text-right">
							<h5 class="no-margin">5 days</h5>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<h5 class="no-margin m-t-5">Estimated time:</h5>
						</div>
						
						<div class="col-md-6 text-right">
							<h5 class="no-margin m-t-5">13 days</h5>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12 m-t-5">
							<h6 class="no-margin m-b-10">Current status</h6>
							<div class="progress m-t-5 m-b-10">
								<div class="progress-bar progress-bar-success progress-bar-striped active" style="width: 55%">
									<span class="sr-only">55% Complete (success)</span>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<h6 class="no-margin m-b-10">Assigned to</h6>
							<img src="assets/images/faces/face5.png" class="img-rounded img-responsive img-sm" alt="">
							<img src="assets/images/faces/face6.png" class="img-rounded img-responsive img-sm" alt="">
							<img src="assets/images/faces/face7.png" class="img-rounded img-responsive img-sm" alt="">
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<h6 class="no-margin">Project details</h6>
							<div class="row">
								<div class="col-md-6 col-xs-6">
									<h5>Company</h5>
									<h5>Organization</h5>
									<h5>Assignee</h5>
									<h5>Reported to</h5>
								</div>
								
								<div class="col-md-6 col-xs-6 text-right">
									<h5>ABC Ltd.</h5>
									<h5>ENEE</h5>
									<h5>Ann Porter</h5>
									<h5>John Deo</h5>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<h6 class="no-margin m-b-10">Labels</h6>
							<span class="label label-info">HTML</span>
							<span class="label label-info">Admin</span>
							<span class="label label-info">Web app</span>
							<span class="label label-info">Developer application</span>
							<span class="label label-info">Responsive</span>
							<span class="label label-info">Envato</span>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<h6 class="no-margin m-b-10">Options</h6>
							<div class="checkbox">
								<label>
									<input type="checkbox" class="control-info" checked="checked">
									Make this project a priority
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" class="control-info" checked="checked">
									Send project report by email
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" class="control-info">
									Send all notifications by email
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
@stop


