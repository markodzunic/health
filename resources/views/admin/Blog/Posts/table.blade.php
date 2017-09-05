@if(Session::has('alert-success'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('alert-success') !!}</em></div>
@endif
<table id="blogs" class="table table-striped tablesorter" >
	<thead  class="bg-lblue">
		<tr class="table-head im-white">
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
      <th id="category" order-by="" class="row">Category</th>
      <th id="actions" class="row">Actions</th>
		</tr>
	</thead>

	<tbody class="table-body">
		@if ($blogs)
			@foreach ($blogs as $blog)
				<tr>
          <td>{{ !empty($blog->title) ? $blog->title : 'N/A' }}</td>
					<td>{{ !empty($blog->user_name) ? $blog->user_name : 'N/A' }}</td>
					<td>{{ !empty($blog->created_at) ? $blog->created_at : 'N/A' }}</td>
          <td>{{ !empty($blog_data[$blog->id]) ? $blog_data[$blog->id]['categories'] : 'N/A' }}</td>
          <td class="last-col">
			<a href="#" onclick="Blogs.Delete(this);return false;"
				class="delete im-btn no-margin-bottom im-btn-small"
				blogs-id="{{ $blog->id }}">
				<i class="fa fa-trash" aria-hidden="true"></i>
				<div class="im-btn-info">Delete Blog Post</div></a>
			</a>
			<a href="#" onclick="Blogs.Update(this);return false;"
				class="update im-btn no-margin-bottom im-btn-small"
				blogs-id="{{ $blog->id }}">
				<i class="fa fa-edit" aria-hidden="true"></i>
				<div class="im-btn-info">Edit Post</div></a>
			</a>
          </td>
				</tr>
			@endforeach
		@endif
	</tbody>
</table>
@if($pagination)
	<div id="pagination" class="no-print">
		<div class="sales-query-pagination">
			{!! $blogs->links() !!}
			<span class="pagination-total">Total: {{ $blogs->total() }}</span>
		</div>
	</div>
@endif
