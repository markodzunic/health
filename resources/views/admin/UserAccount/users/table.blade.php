@if(Session::has('alert-success'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('alert-success') !!}</em></div>
@endif
<table id="users" class="table table-bordered tablesorter" >
	<thead class="bg-lblue im-white">
		<tr class="table-head">
		   	@foreach ($columns as $c => $col)
					<th id="{{ $c }}" order-by="" class="row" onclick="Users.sort(this);return false;">

					{{-- sorting arrows and column name--}}
					<div class="col-lg-10 col-md-10 col-sm-10">{{ $col }}</div>
					<div class="col-lg-2 col-md-2 col-sm-2">
						<i class="sort sort_desc"></i>
						<i class="sort sort_asc"></i>
					</div>
				</th>
			@endforeach
      <th id="actions" class="row">Actions</th>
		</tr>
	</thead>

	<tbody class="table-body">
		@if ($users)
			@foreach ($users as $user)
				<tr>
          <td>{{ !empty($user->title) ? $user->title : 'N/A' }}</td>
					<td>{{ !empty($user->first_name) ? $user->first_name : 'N/A' }}</td>
					<td>{{ !empty($user->last_name) ? $user->last_name : 'N/A' }}</td>
          <td>{{ !empty($user->gender) ? $user->gender : 'N/A' }}</td>
          <td>{{ !empty($user->email) ? $user->email : 'N/A' }}</td>
          <td>{{ !empty($user->display_name) ? $user->display_name : 'N/A' }}</td>
          <td>{{ !empty($user->position_type) ? $user->position_type : 'N/A' }}</td>
					<td>{{ !empty($user->phone) ? $user->phone : 'N/A' }}</td>
          <td>{{ !empty($user->med_reg_number) ? $user->med_reg_number : 'N/A' }}</td>
          <td>
            <div class="last-col">
							<a href="#" onclick="Users.Delete(this);return false;"
								class="delete btn im-btn pink-btn no-margin-bottom im-btn-small"
								users-id="{{ $user->id }}">
							<i class="fa fa-trash" aria-hidden="true"></i>
							<div class="im-btn-info">Delete Account</div></a>
						</div>
            <div class="last-col">
							<a href="#" onclick="Users.Update(this);return false;"
								class="update btn im-btn pink-btn no-margin-bottom im-btn-small"
								users-id="{{ $user->id }}">
							<i class="fa fa-edit" aria-hidden="true"></i>
							<div class="im-btn-info">Edit Info</div></a>
						</div>
          </td>
				</tr>
			@endforeach
		@endif
	</tbody>
</table>
@if($pagination)
	<div id="pagination" class="no-print">
		<div class="sales-query-pagination">
			{!! $users->links() !!}
			<span class="pagination-total">Total: {{ $users->total() }}</span>
		</div>
	</div>
@endif
