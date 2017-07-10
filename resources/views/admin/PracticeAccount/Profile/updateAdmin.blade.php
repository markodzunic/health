<div id="update-admin" title="Edit Practice">
	<table id="practice-users" class="table table-bordered tablesorter" >
		<thead class="bg-pink white-text">
			<tr class="table-head">
					<th id="name" class="row">Name</th>
					<th id="email" class="row">Email</th>
					<th>Actions</th>
			</tr>
		</thead>

		<tbody class="table-body">
			@if ($users)
				@foreach ($users as $user)
					<tr user-id="{{ $user->id }}">
						<td>{{ !empty($user->first_name) ? $user->first_name : 'N/A' }} {{ !empty($user->last_name) ? $user->last_name : 'N/A' }}</td>
						<td>{{ !empty($user->email) ? $user->email : 'N/A' }}</td>
						<td>
							<a href="#" onclick="Users.SelectAdmin(this);return false;"
								class="select"
								users-id="{{ $user->id }}">
							Select Admin</a>
						</td>
					</tr>
				@endforeach
			@else
				<tr>
						No Users.
				</tr>
			@endif
		</tbody>
	</table>
</div>
