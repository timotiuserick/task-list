<x-layout>
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-md-4 text-center">
				<h1>Project List</h1>
				<a href="{{ route('project.create') }}" class="btn btn-success">
					New Project
				</a>
			</div>
		</div>
		<div class="row justify-content-md-center mt-4">
			<div class="col-md-6 text-center">
				@foreach ($projects as $project)
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6 text-center">
									<h5 class="card-title">{{ $project->title }}</h5>
								</div>
								<div class="col-md-6 text-center">
									<a href="{{ route('task.index', $project->id) }}" class="btn btn-info">View Tasks</a>
									<a href="{{ route('project.edit', $project->id) }}" class="btn btn-warning">Edit</a>
									<form action="{{ route('project.destroy', $project->id) }}" method="POST" class="d-inline">
										@csrf
										@method('DELETE')
										<button class="btn btn-danger">Delete</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</x-layout>
