@include('components/header')


<style>
        
	.signin-page{
	    height: 100vh;
	}
	#form-headline{
		font-weight: bolder;
		font-size: 7rem;
	}
	#sub-for4m-headline{
		font-weight: bolder;
		font-size: 3rem;
	}
	.error{
		color: red;
		font-weight: bold;
	}
	a{
		text-decoration: none;
		color: white;
	}

</style>

<div class='container-fluid'>
	<div class='row'>
		<div class='col-md-6 d-flex flex-column align-items-center justify-content-center'>
			<p id='form-headline'><span id='sub-for4m-headline'>school </span><br> Portal</p>
		</div>

		<div class='col-md-6 signin-page d-flex flex-column align-items-center justify-content-center'>
			<h4>SignIn</h4>

			
				@foreach($errors as $err)
					<div class="card">
						  <h5 class="card-header">Errors</h5>
						  <div class="card-body">
							<p class="card-text error">{{$err}}</p>
						</div>
					</div>
				@endforeach

				@if(session() -> has('error'))
					<p class='error'>
						{{session() -> get('error')}}
					</p>
				@endif
			  

			<form action={{route('user.create')}} method='post'>
				@csrf
				@method('post')

				<label class='form-label'>First Name</label>
				<input type='text' class='form-control' name='firstname' required>

				<label class='form-label'>Middle Name</label>
				<input type='text' class='form-control' name='middlename' required>

				<label class='form-label'>Last Name</label>
				<input type='text' class='form-control' name='lastname' required>

				<label class='form-label'>Email</label>
				<input type='email' class='form-control' name='email' required>

				<label class='form-label'>Password</label>
				<input type='password' class='form-control' name='pwd' required>

				<div class="form-check">
					<label class='form-label'>Is Admin</label>
				 	<input class='form-check-input' type='checkbox' value='true' id='defaultCheck1' name='isadmin'>
				</div>

				<button class='btn btn-dark mt-3' type='submit'>Create Account</button>
				<button class='btn btn-secondary mt-3' type='link'>
				<a href={{route('signin.form')}} /> SignIn </button>
			</form>
		</div>
	</div>
</div>


@include('components/footer')