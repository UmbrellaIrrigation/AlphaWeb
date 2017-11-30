<!-- NOT DONE YET -->
<div class="h1 text-center">Users Form</div>
<br>
<form method="POST" action="/register">
	{{ csrf_field() }}

	<div class="form-group">
		<label for="parentId">parentId:</label>
		<input type="text" class="form-control" id="parentId" name="parentId" required>
	</div>

	<div class="form-group">
		<label for="name">Name:</label>
		<input type="text" class="form-control" id="name" name="name" required>
	</div>

	<div class="form-group">
		<label for="description">Description:</label>
		<input type="text" class="form-control" id="description" name="description" required>
	</div>

	<div class="form-group">
		<label for="latitude">Latitude:</label>
		<input type="text" class="form-control" id="latitude" name="latitude" required>
	</div>

	<div class="form-group">
		<label for="password_confirmation">Password Confirmation:</label>
		<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">Create User</button>
	</div>

</form>

<!--br>
<div class="h5 text-left">Already have an <a href="/login">account</a>?</div-->