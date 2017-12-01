<div class="h1 text-center">Valve Form</div>
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
		<label for="longitude">Longitude:</label>
		<input type="text" class="form-control" id="longitude" name="longitude" required>
	</div>

	<div class="form-group">
		<label for="min-flow">Min flow:</label>
		<input type="text" class="form-control" id="min-flow" name="min-flow" required>
	</div>

	<div class="form-group">
		<label for="max-flow">Max flow:</label>
		<input type="text" class="form-control" id="max-flow" name="max-flow" required>
	</div>

	<div class="form-group">
		<label for="current-flow">Current flow:</label>
		<input type="text" class="form-control" id="current-flow" name="current-flow" required>
	</div>

	<div class="form-group">
		<label for="min-voltage">Min Voltage:</label>
		<input type="text" class="form-control" id="min-voltage" name="min-voltage" required>
	</div>

	<div class="form-group">
		<label for="max-flow">Max Voltage:</label>
		<input type="text" class="form-control" id="max-flow" name="max-flow" required>
	</div>

	<div class="form-group">
		<label for="current-voltage">Current Voltage:</label>
		<input type="text" class="form-control" id="current-voltage" name="current-voltage" required>
	</div>

	<div class="form-group">
		<input type="checkbox" class="form-control" id="normally-open" name="normally-open">
		<label for="normally-open">Normally Open</label>
	</div>

	<div class="form-group">
		<input type="checkbox" class="form-control" id="isParent" name="isParent">
		<label for="isParent">isParent</label>
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">Create Valve</button>
	</div>

</form>

<!--br>
<div class="h5 text-left">Already have an <a href="/login">account</a>?</div-->