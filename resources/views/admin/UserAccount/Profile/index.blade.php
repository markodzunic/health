@extends('admin.layouts.default-admin-template')
@section('AditionalHead')
<style type="text/css">
body, #page-wrapper {
    background-color: #F9F9F9;
}
</style>
@stop

@section('MainContent')
	@include('admin.UserAccount.Profile.title')

	{!! view('admin.UserAccount.Profile.personal-info', [
				'user' => $user,
				'role' => $role,
        'roleO' => $roleO,
	]) !!}
@stop


@section('AditionalFoot')
	<script src="{{ URL::asset('/js/Admin/profile.js') }}"></script>
	<script type="text/javascript">
        $(function() {
            $('input[name="date_of_birth"]').datetimepicker();
        });
         $(document).ready(function() {
		    $( '.inputfile' ).each( function()
		    {
		      var $input   = $( this ),
		        $label   = $input.next( 'label' ),
		        labelVal = $label.html();

		      $input.on( 'change', function( e )
		      {
		        var fileName = '';

		        if( this.files && this.files.length > 1 )
		          fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
		        else if( e.target.value )
		          fileName = e.target.value.split( '\\' ).pop();

		        if( fileName )
		          $label.find( 'span' ).html( fileName );
		        else
		          $label.html( labelVal );
		      });

		      // Firefox bug fix
		      $input
		      .on( 'focus', function(){ $input.addClass( 'has-focus' ); })
		      .on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
		    });
		  });
    </script>
@stop
