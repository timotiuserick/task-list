<x-layout>
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-md-4 text-center">
				<h1>Edit Task</h1>
			</div>
		</div>
		<div class="row justify-content-md-center">
			<div class="col-md-4">
				<form action="{{ route('task.update', $task->id) }}" method="POST">
					@csrf
					<div class="form-group row mb-1">
						<div class="col-sm-12 text-center">
							<input type="text" name="title" placeholder="Title" class="form-control" value="{{ $task->title }}" required />
						</div>
					</div>
					<div class="form-group row mb-1">
						<div class="col-sm-12 text-center">
							<textarea name="description" rows="5" placeholder="Description" class="form-control">{{ $task->description }}</textarea>
						</div>
					</div>

					<div class="form-group row mb-1">
						<div class="col-sm-6">
							<a href="{{ route('task.index', $task->project_id) }}" class="form-control btn btn-warning">Back</a>
						</div>
						<div class="col-sm-6">
							<button class="form-control btn btn-success">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</x-layout>
