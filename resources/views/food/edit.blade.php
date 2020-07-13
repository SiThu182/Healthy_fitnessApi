@extends('backtemplate')
@section('content')
	<div class="col-md-10 offset-1">
		 
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">food</h3>
			</div>
			<form action="{{route('food.update',$food->id)}}" method="post" enctype="multipart/form-data">
					@csrf
					@method('PUT')
				<div class="card-body">
				
				
				 
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>food Name</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="food_name" class="form-control" value="{{$food->food_name}}">
						</div>
	
					</div>
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>Calories</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="calories" class="form-control" value="{{$food->calories}}">
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
									<option value="{{$category->id}}"
										@if($category->id == $food->category_id)
										{{'selected'}}
										@endif
										>{{$category->category_name}}</option>
								@endforeach
							</select>
						</div>
	
					</div>
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>New Image</label>
						</div>
						<div class="col-md-8">
							<input type="file" name="food_image" class="form-control">
						</div>
	
					</div>	
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>old Image</label>
						</div>
						<div class="col-md-8">
							<img src="{{$food->food_image}}" width="150" height="150">
						</div>
						<input type="hidden" name="old_image" value="{{$food->food_image}}">
	
					</div>		
					<input type="submit" value="ADD" class="btn btn-dark">
				</div>
			</form>	
			
		</div>	
			
		

		</div>

</div>	
@endsection