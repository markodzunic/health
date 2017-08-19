@extends('admin.layouts.default-admin-template')
@section('AditionalHead')

@stop

@section('MainContent')
	@include('admin.Notifications.title')

    @if ($notifications)
      @foreach ($notifications as $notification)
        <div class="">
            <div class="">{{ $notification->title }}</div>
            <div class="">{{ $notification->type == 'blog' ? $notification->category : $notification->pg_name. ' - '.$notification->category }}</div>
            <div class="">{{ $notification->user_name }}</div>
            <div class="">{{ $notification->created_at }}</div>
        </div>
      @endforeach
    @endif

    @if($pagination)
    	<div id="pagination" class="no-print">
    		<div class="sales-query-pagination">
    			{!! $notifications->links() !!}
    			<span class="pagination-total">Total: {{ $notifications->total() }}</span>
    		</div>
    	</div>
    @endif

@stop

@section('AditionalFoot')

@stop
