@extends('admin.layouts.default-admin-template')
@section('AditionalHead')

@stop

@section('MainContent')
	@include('admin.UserAccount.users.title')
  
  <div class="toolbar">
    <input type="hidden" id="orderby" name="orderby" value="{{ $orderby }}">
    <input type="hidden" id="sortby" name="sortby" value="{{ $sortby }}">
  </div>

  <section>
    <div class="container-fluid">
      <div id="table-section" class="table-section">
        {!! view('admin.UserAccount.users.table', [
            'users' => $users,
            'columns' => $columns,
            'pagination' => $pagination,
        ]) !!}
      </div>
    </div>
  </section>
@stop

@section('AditionalFoot')
		<script src="{{ URL::asset('/js/Admin/users.js') }}"></script>
		<script type="text/javascript">
        Users.init();
    </script>
@stop
