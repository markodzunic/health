@if(Session::has('alert-success'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('alert-success') !!}</em></div>
@endif
<table id="practices" class="table table-bordered tablesorter" >
	<thead  class="bg-lblue im-white">
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
		@if ($practices)
			@foreach ($practices as $practice)
				<tr>
          <td>{{ !empty($practice->name) ? $practice->name : 'N/A' }}</td>
					<td>{{ !empty($practice->description) ? $practice->description : 'N/A' }}</td>
					<td>{{ !empty($practice->address) ? $practice->address : 'N/A' }}</td>
          <td>{{ !empty($practice->fax) ? $practice->fax : 'N/A' }}</td>
          <td>{{ !empty($practice->email) ? $practice->email : 'N/A' }}</td>
          <td>{{ !empty($practice->site) ? $practice->site : 'N/A' }}</td>
          <td>
            <div class="last-col">
							<a href="#" onclick="Practices.Delete(this);return false;"
								class="delete btn im-btn pink-btn no-margin-bottom im-btn-small"
								practices-id="{{ $practice->id }}">								
								<i class="fa fa-trash" aria-hidden="true"></i>
								<div class="im-btn-info">Delete Account</div></a>
							</a>
						</div>
            <div class="last-col">
							<a href="#" onclick="Practices.Update(this);return false;"
								class="update btn im-btn pink-btn no-margin-bottom im-btn-small"
								practices-id="{{ $practice->id }}">
								<i class="fa fa-edit" aria-hidden="true"></i>
								<div class="im-btn-info">Edit Info</div></a>
							</a>
						</div>
          </td>
				</tr>
			@endforeach
		@endif
	</tbody>
</table>
</div>
@if($pagination)
	<div id="pagination" class="no-print">
		<div class="sales-query-pagination">
			{!! $practices->links() !!}
			<span class="pagination-total">Total: {{ $practices->total() }}</span>
		</div>
	</div>
@endif
