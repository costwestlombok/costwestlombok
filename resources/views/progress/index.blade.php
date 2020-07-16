

@extends('layout')

@section('title')

@stop

@push('styles')
	<link type="text/css" rel="stylesheet" href="{{asset('css/fab.css')}}">
@endpush

@section('content')
	<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Progress List</h5>				
					</div>
					<div class="panel-body">
					</div>
					<div class="table-responsive">
						<table class="table table-togglable table-hover datatable datatable-header-basic">
							<thead>
								<tr>
									<th>#</th>
                                    <th>Project Title</th>
									<th>Physical Program (%)</th>										
                                    <th>Real Physical (%)</th>
                                    <th>Scheduled Finance</th>
                                    <th>Real Finance</th>
                                    <th>Advance Date</th>
                                    <th>
                                        Images
                                    </th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							
							<tbody>
								@foreach ($advances as $data)
							<tr>
								<td>{{$loop->index+1}}</td>
                                <td>{{$data->project->project_title}}</td>
                                <td>{{$data->programmed_percent}}</td>
                                <td>{{$data->real_percent}}</td>
                                <td>{{$data->scheduled_financing}}</td>
                                <td>{{$data->real_financing}}</td>
                                <td>{{$data->date_of_advance}}</td>
                                <td>
                                    <a href="{{ url('/advance-images/'.$data->id) }}" class="btn btn-info">Images</a>
                                </td>
								<td><a href="{{ route('progress.edit', $data->id) }}" class="btn btn-defaut">
									<i class="icon-pencil6"></i>
								</a></td>
								<td>
									<form action="{{ route('progress.destroy', $data->id)}}" method="post">
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
								<a class="fab-menu-btn btn bg-success btn-float btn-rounded btn-icon" href="{{route('progress.create')}}">
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

