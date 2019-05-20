@extends('layouts.master')
@section('content')
<div class="container">
	<form method="post" action="{{url('crud')}}">
		<div class="form-group row">
			{{csrf_field()}}
			<label class="col-sm-2 col-form-label col-form-label-lg">Title</label>
			<div class="col-sm-7">
				<input type="text" class="form-control col-sm-2" id="lgFormGroupInput" placeholder="title" name="title">
			</div>
		</div>
		<div class="form-group row">
			<label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Post</label>
      		<div class="col-sm-7">
        		<textarea name="post" rows="8" cols="90"></textarea>
        	</div>
		</div>
		<div class="form-group row">
      		<div class="col-md-2"></div>
      		<input type="submit" class="btn btn-primary">
    	</div>
	</form>
</div>
@endsection