@include('components/header')


<div class='container'>
	<div class='row'>
		<div class='col-md-12'>
			<h4 class='mb-5'>Subjects</h4>
			<table class='table'>
				<tr>
					<th>Subject</th>
					<th>Unit></th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				@foreach($subjects as $subject)
					<tr>
						<td>{{$subject -> subject}}</td>
						<td>{{$subject -> unit}}</td>
						<td>
							<form action='#' method='post'>
								@csrf
								@method('post')
								<button class='btn btn-secondary'>Edit</button>
							</form>
						</td>
						<td>
							<button class='btn btn-danger' data-bs-toggle="modal" data-bs-target="#delete-modal">Delete</button>
							<form action={{route('subject.delete', ['subject' => $subject])}} method='post'>
								@csrf
								@method('post')

								@include('components/confirmation-modal', 
									[	'modal_id' => 'delete-modal',
										'title' => 'Delete Data',
										'message' => 'This action cannot be undone'])
							</form>
						</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>

	<div class='row'>
		<div class='col-md-12'>
			<h4 class='mt-5 mb-2'>Add Subjects</h4>
			<form action={{Route('subject.create')}} method='post'>
				@csrf
				@method('post')

				<label class='form-label'>Add Subject</label>
				<input class='form-control' type="text" name='subject' required>

				<label class='form-label'>Unit</label>
				<input class='form-control' type='number' name='unit' required>

				@foreach($errors as $err)
					<p class='error'>$err</p>
				@endforeach

				@if(session() -> has('error'))
					<p class='error'>{{session() -> get('error')}}</p>
				@endif

				@if(session() -> has('success'))
					<p class='success'>{{session() -> get('success')}}</p>
				@endif

				<button class='btn btn-dark mt-2' type='submit'>Add New Subject</button>
			</form>

		</div>
	</div>
</div>


@include('components/footer')