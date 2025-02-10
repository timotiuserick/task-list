<x-layout>
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-md-4 text-center">
				<h1>New Project</h1>
			</div>
		</div>
		<div class="row justify-content-md-center">
			<div class="col-md-4">
				<form action="{{ route('project.store') }}" method="POST">
					@csrf
					<div class="form-group row mb-1">
						<div class="col-sm-12 text-center">
							<input type="text" name="title" placeholder="Title" class="form-control" required />
						</div>
					</div>

					<div class="form-group row mb-1">
						<div class="col-sm-6">
							<a href="{{ route('project.index') }}" class="form-control btn btn-warning">Back</a>
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
