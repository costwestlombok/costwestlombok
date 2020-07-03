

@extends('layout')

@section('title')

@stop

@push('styles')
	<link type="text/css" rel="stylesheet" href="{{asset('css/fab.css')}}">
@endpush

@section('content')
	<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Tender Evaluation/Award List</h5>				
					</div>
					<div class="panel-body">
					</div>
					<div class="table-responsive">
						<table class="table table-togglable table-hover datatable datatable-header-basic">
							<thead>
								<tr>
									<th>#</th>
									<th>Tender Name</th>										
									<th>Process Number</th>
									<th>Cost Estimation</th>
									<th>Participants</th>
									<th class="text-center">Actions</th>
									<th></th>
								</tr>
							</thead>
							
							<tbody>
								@foreach ($awards as $award)
							<tr>
								<td>{{$loop->index+1}}</td>
								<td>{{$award->tender->project_process_name}}</td>
								<td>{{$award->process_number}}</td>
								<td>{{ number_format($award->contract_estimate_cost) }}</td>
								<td>{{$award->participants_number}}</td>
								<td><a href="{{ route('award.edit', $award->id) }}" class="btn btn-defaut">
									<i class="icon-pencil6"></i>
								</a></td>
								<td>
									<form action="{{ route('award.destroy', $award->id)}}" method="post">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button class="btn btn-danger" type="submit">
											<i class="icon-trash"></i>
										</button>
									</form>
								</td>
							</tr>
						@endforeach
							</tbody>
						</table>

						<!--floating buttons-->
						<!--<div style="min-height:240px"></div>-->
						<ul class="fab-menu fab-menu-absolute fab-menu-bottom-right" data-fab-toggle="hover">
							<li>
								<a class="fab-menu-btn btn bg-success btn-float btn-rounded btn-icon" href="{{route('award.create')}}">
									<i class="fab-icon-open icon-file-plus2"></i>
									<!--<i class="fab-icon-close icon-cross2"></i>-->
								</a>
							</li>
						</ul>

					</div>
				</div>				
@stop

@push('scripts')	
<script src="{{asset('js/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('js/tables/datatables/extensions/fixed_header.min.js')}}"></script>
<script src="{{asset('js/pages/datatable_extension_fixed_header.js')}}"></script>

<script src="{{asset('js/tables/footable.min.js')}}"></script>
<script src="{{asset('js/pages/tables_responsive.js')}}"></script>

<script src="{{asset('js/pages/fab_buttons.js')}}"></script>
@endpush

