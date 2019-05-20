@extends('layouts.master')
@section('content')
	<div class="container">
		<form id="myForm">
        <div class="success" style="text-align: center"></div>
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
              <label for="type">Type:</label>
              <input type="text" class="form-control" id="type">
            </div>
            <div class="form-group">
               <label for="price">Price:</label>
               <input type="text" class="form-control" id="price">
             </div>
            <button class="btn btn-primary"  id="ajaxSubmit">Submit</button>
        </form>
	</div>
	<script type="text/javascript">
    //alert('hi');
    $(document).ready(function(){
        $('#ajaxSubmit').click(function(e){
            e.preventDefault();
              $.ajaxSetup({
                 headers:{
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                 }
              });
              $.ajax({
                url:"{{url('/grocery/post')}}",
                method: 'post',
                data:{
                    name:$('#name').val(),
                    type:$('#type').val(),
                    price:$('#price').val()
                },
                success:function(result){
                  if(result){
                    var succ = result.success;
                     $("div.success").append(succ);  
                     $("div.success").addClass("alert alert-success");  
                     $("#name").val("");
                     $("#type").val("");
                     $("#price").val("");
                  }
                }
              })
        })
    })
	</script>
@endsection