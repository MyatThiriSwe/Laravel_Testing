@extends('layouts.master')
@section('content')
	<div class="container">
		@if(!empty($cruds)) 
			<table class="table table-striped" style="text-align: center;" id="crudTable">
				<thead>
					<tr>
						<th width="10%" style="text-align: center;">ID</th>
						<th width="15%" style="text-align: center;">Title</th>
						<th width="20%" style="text-align: center;">Post</th>
						<th width="15%" style="text-align: center;">Created Date</th>
						<th width="15%" style="text-align: center;">Updated Date</th>
						<th  width="20%" colspan="2" style="text-align: center;">Actions</th>
					</tr>
				</thead>
				<tbody>
					@php 
						$serial_num = 1;
					@endphp
					@foreach($cruds as $post)
						<tr>
							<td>{{$serial_num}}</td>
							<td>{{$post["title"]}}</td>
							<td>{{$post["post"]}}</td>
							<td>{{$post["created_at"]}}</td>
							<td>{{$post["updated_at"]}}</td>
							<td  width="50%">
								<a class="btn btn-warning" href="{{action('CRUDController@edit',$post['id'])}}" >Edit</a>
							</td>
							<td width="50%">
								<form action="{{action('CRUDController@destroy', $post['id'])}}" method="post">
					            	{{csrf_field()}}
						            <input name="_method" type="hidden" value="DELETE">
						            <button class="btn btn-danger" type="submit">Delete</button>
					         	</form>
					        </td>
						</tr>
						@php 
							$serial_num++;
						@endphp 
					@endforeach
				</tbody>
			</table>
			@else
			<h5>Data is not found.</h5>
		@endif
	</div>

@endsection