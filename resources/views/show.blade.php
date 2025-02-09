<x-layout>
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-md-4 text-center">
				<h1>View Task</h1>
			</div>
		</div>
		<div class="row justify-content-md-center">
			<div class="col-md-4">
				<div class="form-group row mb-1">
					<div class="col-sm-12 text-center">
						<input type="text" name="title" placeholder="Title" class="form-control" value="{{ $task->title }}" disabled />
					</div>
				</div>
				<div class="form-group row mb-1">
					<div class="col-sm-12 text-center">
						<textarea name="description" rows="5" placeholder="Description" class="form-control" disabled>{{ $task->description }}</textarea>
					</div>
				</div>

				<div class="form-group row mb-1">
					<div class="col-sm-6">
						<a href="{{ route('task.index') }}" class="form-control btn btn-warning">Back</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-layout>
