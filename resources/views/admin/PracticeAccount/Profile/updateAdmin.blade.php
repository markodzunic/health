<div id="update-admin" title="Edit Practice">
	<div class="col-md-12" style="margin-bottom: 30px;">
		<table id="practice-users" class="table table-bordered tablesorter" >
			<thead class="bg-pink im-white">
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
							<td class="im-center">
								@if (!$user->is_admin)
									<div onclick="Users.SelectAdmin(this);return false;"
										is-admin = "1"
										class="select btn im-btn pink-btn no-margin-bottom im-btn-small"
										users-id="{{ $user->id }}">
										<i class="fa fa-check" aria-hidden="true"></i>
											<div class="im-btn-info">Select Admin</div>
									</div>
								@else
										<div onclick="Users.SelectAdmin(this);return false;"
											is-admin = "0"
											class="select btn im-btn pink-btn no-margin-bottom im-btn-small"
											users-id="{{ $user->id }}">
											<i class="fa fa-times" aria-hidden="true"></i>
												<div class="im-btn-info">Unselect Admin</div>
										</div>
								@endif
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
</div>
