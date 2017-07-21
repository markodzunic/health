@if(Session::has('alert-success'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('alert-success') !!}</em></div>
@endif
<table id="pages" class="table table-bordered tablesorter" >
	<thead  class="bg-lblue im-white">
		<tr class="table-head">
		   	@foreach ($columns as $c => $col)
					<th id="{{ $c }}" order-by="" class="row" onclick="Pages.sort(this);return false;">

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
		@if ($pages)
			@foreach ($pages as $page)
				<tr>
          <td>{{ !empty($page->title) ? $page->title : 'N/A' }}</td>
					<td>{{ !empty($page->description) ? $page->description : 'N/A' }}</td>
					<td>{{ !empty($page->page) ? $page->page : 'N/A' }}</td>
          <td>{{ !empty($page->section) ? $page->section : 'N/A' }}</td>
          <td>
            <div class="last-col">
							<a href="#" onclick="Pages.Delete(this);return false;"
								class="delete btn im-btn pink-btn no-margin-bottom im-btn-small"
								pages-id="{{ $page->id }}">
								<i class="fa fa-trash" aria-hidden="true"></i>
								<div class="im-btn-info">Delete Page Section</div></a>
							</a>
						</div>
            <div class="last-col">
							<a href="#" onclick="Pages.Update(this);return false;"
								class="update btn im-btn pink-btn no-margin-bottom im-btn-small"
								pages-id="{{ $page->id }}">
								<i class="fa fa-edit" aria-hidden="true"></i>
								<div class="im-btn-info">Edit Page Section</div></a>
							</a>
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
			{!! $pages->links() !!}
			<span class="pagination-total">Total: {{ $pages->total() }}</span>
		</div>
	</div>
@endif
