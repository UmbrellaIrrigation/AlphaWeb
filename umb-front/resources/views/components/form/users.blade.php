<div class="h1 text-center">Users Form</div>
<br>
<form method="POST" action="/">
	{{ csrf_field() }}

	<div class="form-group">
		<label for="username">UserName:</label>
		<input type="text" class="form-control" id="username" name="username" required>
	</div>

	<div class="form-group">
		<label for="email">Email:</label>
		<input type="text" class="form-control" id="email" name="email" required>
	</div>

	<div class="form-group">
		<label for="password">Password:</label>
		<input type="password" class="form-control" id="password" name="password" required>
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
		<label for="permission">Permission:</label>
		<input type="number" class="form-control" id="permission" name="permission" required>
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">Create User</button>
	</div>

</form>
