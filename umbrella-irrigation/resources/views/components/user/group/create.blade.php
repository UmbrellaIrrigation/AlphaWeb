<div class="modal fade" id="createUserGroupModal" tabindex="-1" role="dialog" aria-labelledby="createUserGroupModal" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">

			<form method="POST" action="/">
				{{ csrf_field() }}

				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Create a New User Group</h5>
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
						<label for="parent_user_gid">Parent User Group:</label>
						<input type="number" class="form-control" id="parent_user_gid" name="parent_user_gid">
					</div>

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Create User Group</button>
				</div>

			</form>

		</div>
	</div>
</div>