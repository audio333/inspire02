@extends('layouts.app')

@section('content')
	<div class="container">
		<h2>New Professor</h2>
		<form action="{{ route('professors.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Enter Title" name="title">
			</div>
			<div class="form-group">
				<textarea class="form-control" placeholder="Enter Content" name="content"></textarea>
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Upload</span>
				</div>
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="inputGroupFile01" name="image">
					<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
				</div>
			</div>

			<button type="submit" class="btn btn-primary">Save</button>
		</form>
	</div>
@endsection