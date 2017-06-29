<style type="text/css">
	.table > thead  {
		cursor:pointer;
	}
	.pagination>li:first-child>a, .pagination>li:first-child>span {
	    margin-left: 0;
	    border-top-left-radius: 0;
	    border-bottom-left-radius: 0;
	}
	.pagination>li:last-child>a, .pagination>li:last-child>span {
	    border-top-right-radius: 0;
	    border-bottom-right-radius: 0;
	}
	.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
	    color: #fff;
	    background-color: #ff66ff;
	    border-color: #ff66ff;
	}
	.pagination>li>a, .pagination>li>span {
	    color: #ff66ff;
	    background-color: #fff;
	    border: 1px solid #ddd;
	}
	.pagination-total {
		background: #00b0f0 ;
	    color: #fff;
	    padding: 8px 16px;
	    float: right;
	}
</style>
@if(Session::has('alert-success'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('alert-success') !!}</em></div>
@endif
<table id="practices" class="table table-bordered tablesorter" >
	<thead  class="bg-pink white-text">
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
								class="delete"
								practices-id="{{ $practice->id }}">
							Delete</a>
						</div>
            <div class="last-col">
							<a href="#" onclick="Practices.Update(this);return false;"
								class="update"
								practices-id="{{ $practice->id }}">
							Update</a>
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
