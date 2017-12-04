<div class="h1 text-center">User Group Form</div>
<br>
<form method="POST" action="/">
	{{ csrf_field() }}

	<div class="form-group">
		<label for="name">Name:</label>
		<input type="text" class="form-control" id="name" name="name" required>
	</div>

	<div class="form-group">
        <label for="parent_user_gid">Parent User Group Id:</label>
		<input type="number" class="form-control" id="parent_user_gid" name="parent_user_gid">
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">Create User Group</button>
	</div>

</form>