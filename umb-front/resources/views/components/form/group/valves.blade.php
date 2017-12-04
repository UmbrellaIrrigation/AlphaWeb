<div class="h1 text-center">Valve Group Form</div>
<br>
<form method="POST" action="/">
	{{ csrf_field() }}

	<div class="form-group">
		<label for="name">Name:</label>
		<input type="text" class="form-control" id="name" name="name" required>
	</div>

	<div class="form-group">
        <label for="parent_valve_gid">Parent Valve Group Id:</label>
		<input type="number" class="form-control" id="parent_valve_gid" name="parent_valve_gid">
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">Create Valve Group</button>
	</div>

</form>