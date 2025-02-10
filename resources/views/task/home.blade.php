<x-layout>
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-md-4 text-center">
				<h1>Project: {{ $project->title }}</h1>
				<h1>Task List</h1>
				<div class="row justify-content-md-center mt-4">
					<div class="col-md-6 align-self-center">
						<a href="{{ route('project.index') }}" class="btn btn-warning">
							Back
						</a>
					</div>
					<div class="col-md-6 text-center">
						<a href="{{ route('task.create', $project->id) }}" class="btn btn-success">
							New Task
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row justify-content-md-center">
			<div class="col-md-6 text-center">
				@foreach ($tasks as $task)
					<div class="row justify-content-md-center mt-4 border">
						<div class="col-md-6 align-self-center">
							{{ $task->title }}
						</div>
						<div class="col-md-6 text-center">
							<a href="{{ route('task.show', $task->id) }}" class="btn btn-success">View</a>
							<a href="{{ route('task.edit', $task->id) }}" class="btn btn-warning">Edit</a>
							<form action="{{ route('task.destroy', $task->id) }}" method="POST" class="d-inline">
								@csrf
								@method('DELETE')
								<button class="btn btn-danger">Delete</button>
							</form>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</x-layout>
