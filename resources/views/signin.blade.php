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
			<div class='err_handler'>
				
				@if($errors -> any())
					@foreach($errors -> all() as $err)
						<p>{{$err}}</p>
					@endforeach
				@endif

				@if(session()->has('success'))
					<p>{{session('success')}}</p>
				@endif

				@if(session()->has('error'))
					<p>{{session('error')}}</p>
				@endif
				
			</div>
			<form action={{route('user.signin')}} method='post'>
				@csrf
				@method('post')

				<label class='form-label'>Email</label>
				<input type='email' class='form-control' name='email' required>

				<label class='form-label'>Password</label>
				<input type='password' class='form-control' name='pwd' required>

				<button class='btn btn-dark mt-3' type='submit'>SignIn</button>
				<button class='btn btn-secondary mt-3' type='link'>
				<a href={{route('signup.form')}} /> SignUp </button>
			</form>
		</div>
	</div>
</div>


@include('components/footer')