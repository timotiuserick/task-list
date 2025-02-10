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
		<div class="row justify-content-md-center mt-4">
			<div class="col-md-6 text-center" id="sortable">
				@foreach ($tasks as $task)
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6 text-center">
									<h5 class="card-title">{{ Str::words($task->title, 3) }} <span class="badge bg-info">{{ $task->order }}</span></h5>
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
						</div>
					</div>
				@endforeach
			</div>
		</div>
		<div class="row justify-content-md-center mt-4 d-none">
			<div class="col-md-6 text-center" id="sortable">
				<form id="sort_form" action="{{ route('task.sort', $project->id) }}" method="POST" class="d-inline">
					@csrf
					<input type="text" id="old_order" name="old_order" class="form-control" value="" />
					<input type="text" id="new_order" name="new_order" class="form-control" value="" />
				</form>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
	<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
	<script>
		$( document ).ready(function() {
			$("#sortable").sortable({
				start: function(event, ui) {
					$('#old_order').val(ui.item.index() + 1);
				},
				stop: function(event, ui) {
					$('#new_order').val(ui.item.index() + 1);
					$('#sort_form').submit();
				}
			});
			$("#sortable").disableSelection();
		});
	</script>
</x-layout>
