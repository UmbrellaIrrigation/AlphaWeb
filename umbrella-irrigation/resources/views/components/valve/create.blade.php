<div class="modal fade" id="createValveModal" tabindex="-1" role="dialog" aria-labelledby="createValveModal" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">

			<form method="POST" action="/">
				{{ csrf_field() }}

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create a New Valve</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
				</div>

                <div class="modal-body">

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

				</div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Create Valve</button>
				</div>

			</form>
		</div>
    </div>
</div>
