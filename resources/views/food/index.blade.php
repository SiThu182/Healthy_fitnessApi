@extends('backtemplate')
@section('content')
	<div class="col-md-10 offset-1">
		 
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">food</h3>
			</div>
			<form action="{{route('food.store')}}" method="post" enctype="multipart/form-data">
					@csrf
				<div class="card-body">
				
				
				 
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>food Name</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="food_name" class="form-control">
						</div>
	
					</div>
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>Calories</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="calories" class="form-control">
						</div>
	
					</div>
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>Image</label>
						</div>
						<div class="col-md-8">
							<input type="file" name="food_image" class="form-control">
						</div>
	
					</div>
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>Category</label>
						</div>
						<div class="col-md-8">
							<select name="category" class="form-control">
								<option selected disabled>Select Category</option>
								@foreach($categories as $category)
									<option value="{{$category->id}}">{{$category->category_name}}</option>
								@endforeach
							</select>
						</div>
	
					</div>	
					<input type="submit" value="ADD" class="btn btn-dark">
				</div>
			</form>	
			
		</div>	
			
		

		</div>
		<div class="col-md-12 mt-5">
			<h3>Car list</h3>
			<table class="table table-active">
				<thead>
					<th>NO.</th>
					<th>food Name</th>
				 	<th>Category</th>
				 	<th>Calories</th>
					<th>Action</th>
				</thead>
				@php $i = 1 @endphp
					@foreach($foods as $food)
				<tbody>
					
						<td>{{$i++}}</td>
						<td>{{$food->food_name}}</td>
						<td>{{$food->category->category_name}}</td>
						<td><img src="{{$food->food_image}}" width="150" height="150"></td>
					 	<td>{{$food->calories}}</td>
						 
						<td> 
							<a href="{{route('food.edit',$food->id)}}" class="btn btn-primary float-left mr-3">Edit </a>
							<form action="{{route('food.destroy',$food->id)}}" method="post">
			                  @method('Delete')
			                  @csrf
			                  <input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger">
                			</form>

                		</td>		
				
				</tbody>
					@endforeach
			</table>
		</div>
</div>	
@endsection