<div class="modal fade" id="createValveGroupModal" tabindex="-1" role="dialog" aria-labelledby="createValveGroupModal" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
	
		<form method="POST" action="/">
			{{ csrf_field() }}

			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Create a New Valve Group</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<div class="form-group">
					<label for="name">Name:</label>
					<input type="text" class="form-control" id="name" name="name" required>
				</div>

				<div class="form-group">
					<label for="parent_valve_gid">Parent Valve Group Id:</label>
					<input type="number" class="form-control" id="parent_valve_gid" name="parent_valve_gid">
				</div>
			</div>

			<div class="modal-footer">
				<div class="form-group">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Create Valve Group</button>
				</div>
			</div>
		</form>
	</div>
</div>
</div>
