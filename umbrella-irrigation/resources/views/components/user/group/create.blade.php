<div class="modal fade" id="createUserGroupModal" tabindex="-1" role="dialog" aria-labelledby="createUserGroupModal" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">

			<form method="POST" action="{{ route('usergroup.store') }}">
				{{ csrf_field() }}

				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Create a New User Group</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">

					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						<label for="name" class="control-label">Name</label>

						<div>
							<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus> 
							@if ($errors->has('name'))
								<small class="form-text alert alert-danger" role="alert">{{ $errors->first('name') }}</small>
							@endif
						</div>
					</div>

					<div class="form-group">
						<label for="parent_id">Parent User Group</label>
						<select class="form-control" id="parent_id" name="parent_id">
							<option value="null" selected>None</option>
							@foreach ($rootGroups as $group)
								<option value="{{ $group->id }}">{{ $group->name }}</option>
								@if (count($group->getChildGroups)) 
									@include('components.user.group.loop', ['childGroups' => $group->getChildGroups, 'space' => '&#x02514;&nbsp;']) 
								@endif
							@endforeach
						</select>
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