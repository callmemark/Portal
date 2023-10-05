@include('components/header')

<div class='container'>
	<div class='row'>
		<div class='col-md-12'>
			<table class='table'>
				<tr>
					<th>Name</th>
					<th>Age</th>
					<th>Gender</th>
					<th>Edit</th>
				</tr>

				@foreach($students as $student)
					<tr>
						<td>{{$student -> firstname}} {{$student -> middlename}} {{$student -> lastname}}</td>
						<td>{{$student -> age}}</td>
						<td>{{$student -> gender}}</td>
						<td>
							<form action='{{route('student.edit', ['student' => $student])}}' method='get'>
								@csrf
								@method('get')
								<button class='btn btn-dark' type='submit'>Edit</button>
							</form>
						</td>
					</tr>
				@endforeach
			</table>			
		</div>
	</div>
</div>

@include('components/footer')