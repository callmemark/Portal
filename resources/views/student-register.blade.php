@include('components/header')

<style>
	#submit-btn{
		padding: 0.5rem 5rem;
		margin-top: 2ren;
	}

	.error{
		font-weight: bold;
		color: red;
	}
</style>

<div class='container'>
	<div class='row'>
		<div class='col-md-12'>
			<h3>Student Information</h3>

			@if($errors -> any())
				@foreach($errors -> all() as $err)
					<p class='error'>{{$err}}</p>
				@endforeach
			@endif

			@if(session() -> has('success'))
				<h5 class='success'>{{session('success')}}</h5>
			@endif

			@if(session() -> has('error'))
				<h5 class='error'>{{session('error')}}</h5>
			@endif

			<form action={{route('student.create')}} method='post'>
				@csrf
				@method('post')

				<label class='form-label'>First Name</label>
				<input class='form-control' type='text' name='firstname'>

				<label class='form-label'>Middle Name</label>
				<input class='form-control' type='text' name='middlename'>

				<label class='form-label'>Last Name</label>
				<input class='form-control' type='text' name='lastname'>

				<label class='form-label'>Age</label>
				<input class='form-control' type='number' name='age'>

				<h4 class='mt-3'>Gender</h4>
				<select class="form-select" aria-label="Gender" name='gender'>
					<option selected>Male</option>
					<option value="Female">Female</option>
				</select>
				
				<button type='submit' class='btn btn-dark mt-3'>Register</button>
			</form>
		</div>
	</div>
</div>


@include('components/footer')