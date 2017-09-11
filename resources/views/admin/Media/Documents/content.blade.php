<div class="container-fluid">
	@if(Session::has('alert-success'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('alert-success') !!}</em></div>
@endif
<table id="documents" class="table tablesorter table-striped" >
	<thead  class="bg-lblue">
		<tr class="table-head im-white">
		   	@foreach ($columns as $c => $col)
					<th id="{{ $c }}" order-by="" class="row" onclick="Document.sort(this);return false;">

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
		@if ($documents)
			@foreach ($documents as $document)
				<tr>
          			<td>{{ !empty($document->name) ? $document->name : 'N/A' }}</td>
					<td><a href="{{ asset('/doc'.$document->path) }}">{{ !empty($document->path) ? $document->path : 'N/A' }}</a></td>

			          <td class="practice-controles">
							<a href="#" onclick="Document.Delete(this);return false;"
								class="delete btn im-btn no-margin-bottom im-btn-small"
								documents-id="{{ $document->id }}">								
								<i class="fa fa-trash" aria-hidden="true"></i>
								<div class="im-btn-info">Delete Account</div></a>
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
			{!! $documents->links() !!}
			<span class="pagination-total">Total: {{ $documents->total() }}</span>
		</div>
	</div>
@endif


</div>