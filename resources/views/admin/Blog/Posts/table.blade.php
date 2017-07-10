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
<table id="blogs" class="table table-bordered tablesorter" >
	<thead  class="bg-pink white-text">
		<tr class="table-head">
		   	@foreach ($columns as $c => $col)
					<th id="{{ $c }}" order-by="" class="row" onclick="Blogs.sort(this);return false;">

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
		@if ($blogs)
			@foreach ($blogs as $blog)
				<tr>
          <td>{{ !empty($blog->title) ? $blog->title : 'N/A' }}</td>
					<td>{{ !empty($blog->description) ? $blog->description : 'N/A' }}</td>
					<td>{{ !empty($blog->created_at) ? $blog->created_at : 'N/A' }}</td>
          <td>
            <div class="last-col">
							<a href="#" onclick="Blogs.Delete(this);return false;"
								class="delete"
								blogs-id="{{ $blog->id }}">
							Delete</a>
						</div>
            <div class="last-col">
							<a href="#" onclick="Blogs.Update(this);return false;"
								class="update"
								blogs-id="{{ $blog->id }}">
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
			{!! $blogs->links() !!}
			<span class="pagination-total">Total: {{ $blogs->total() }}</span>
		</div>
	</div>
@endif
