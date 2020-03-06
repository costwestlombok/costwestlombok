@extends('layout')



@push('styles')
	<link type="text/css" rel="stylesheet" href="{{asset('css/fab.css')}}">
@endpush

@section('content')

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title">Contratos</h5>						
				</div>

				<table class="table table-hover invoice-list responsive" id="datatable">
					<thead>
						<tr>
							<th>#</th>
							<th>Organización</th>										
							<th>Adjudicación</th>
							<th>Numero de contrato</th>
							<th>Título</th>
							<th class="text-center">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ( count($obj) > 0 ) :
							foreach ( $obj as $obj ):
						?>
						<tr>
							<td><?= $obj['id'] ?></td>
							<td><?= $obj['organizations_id'] ?></td>
							<td>
								<h5 class="no-margin">
									<a href="projects_list.htm#"><?= $obj['awards_id'] ?></a>												
								</h5>
							</td>													
							<td>
								<?= $obj['contract_number'] ?>
							</td>
							<td><?= $obj['contract_title'] ?></td>
							<td class="text-center">
								<ul class="icons-list">
									<li><a href="projects_details.htm" target="_blank"><i class="icon-eye2"></i></a></li>
									<li class="dropdown">
										<a href="projects_list.htm#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i> <span class="caret"></span></a>
										<ul class="dropdown-menu dropdown-menu-right">
											<li><a href="projects_list.htm#"><i class="icon-checkmark3"></i> Mark as completed</a></li>
											<li><a href="projects_list.htm#"><i class="icon-cross2"></i> Mark as incomplete</a></li>
											<li class="divider"></li>
											<li><a href="projects_list.htm#"><i class="icon-pencil6"></i> Edit</a></li>
											<li><a href="projects_list.htm#"><i class="icon-trash"></i> Delete</a></li>
										</ul>
									</li>
								</ul>
							</td>
						</tr>
						<?php
							endforeach;
						endif; 
						?>
													
					</tbody>
				</table>
			</div>

			<!--floating buttons-->
			<!--<div style="min-height:240px"></div>-->
			<ul class="fab-menu fab-menu-absolute fab-menu-bottom-right" data-fab-toggle="hover">
				<li>
					<a class="fab-menu-btn btn bg-success btn-float btn-rounded btn-icon" href="{{route('contract.create')}}">
						<i class="fab-icon-open icon-file-plus2"></i>
						<!--<i class="fab-icon-close icon-cross2"></i>-->
					</a>
				</li>
			</ul>
			
		</div>																						
	</div>	

@stop

@push('scripts')
<script src="{{asset('js/pages/fab_buttons.js')}}"></script>
@endpush