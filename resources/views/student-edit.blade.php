@include('components/header')

<div class='container'>
	<div class='row'>
		<div class='col-md-12'>
			<form action={{route('student.update', ['student' => $student])}} method='post'>
				@csrf
				@method('post')

				<label class='form-label'>First Name</label>
				<input class='form-control' type='text' name='firstname' value={{$student->firstname}}>

				<label class='form-label'>Middle Name</label>
				<input class='form-control' type='text' name='middlename' value={{$student->middlename}}>

				<label class='form-label'>Last Name</label>
				<input class='form-control' type='text' name='lastname' value={{$student->lastname}}>

				<label class='form-label'>Age</label>
				<input class='form-control' type='number' name='age' value={{$student->age}}>

				<h4 class='mt-3'>Gender</h4>
				<select class="form-select" aria-label="Gender" name='gender' value=value={{$student->gender}}>
					@if($student->gender == "Female")
						<option selected>Female</option>
						<option value="Female">Male</option>
					@endif

					@if($student->gender == "Male")
						<option selected>Male</option>
						<option value="Female">Female</option>
					@endif
					
				</select>
				
				<button type='submit' class='btn btn-dark mt-5'>Update Student Data</button>
			</form>

			<div class="card mt-3">
			  <h5 class="card-header">Cannot Be Undone</h5>
			  <div class="card-body">
			    <form action={{route('student.delete', ['student' => $student])}} method='post'>
					<button type='submit' class='btn btn-danger'>Delete Student Registration</button>
				</form>
			  </div>
			</div>
			
		</div>
	</div>
</div>

@include('components/footer')