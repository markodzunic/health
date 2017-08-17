<!DOCTYPE html>
<html lang="en">
<head>
	@include('admin.layouts.head')	
	@yield('AditionalHead')
	<style type="text/css">
		body {
			margin-top: 0;
		}
		.form-horizontal .form-group {
			margin-left: 0;
			margin-right: 0;
		}
		#user-forms .col-md-4,
		#user-forms .col-md-8 {
			padding-left: 50px;
			padding-right: 50px;
			height: 100vh;
		}
		#user-forms .user-forms-btn-set {
			text-align: left;
		}
		#user-forms .user-forms-btn-set .white-btn {
			border-color: transparent !important;
			text-decoration: none !important;
		}
		#user-forms img{
			max-width: 100%;
		}
		#user-forms form {
			max-width: 540px;
		}
		#user-forms.reg-form form {
			max-width: 100%;
		}
		#user-forms.reg-form .form-group {
			width: 48%;
			margin-right: 2%;
			float: left;
		}
		.vertical-center {
			padding: 30px 0;
			float: left;
			width: 100%;
		}
		@media screen and (max-width: 991px) {
			#user-forms .col-md-4,
			#user-forms .col-md-8 {
				height: auto;
				float: left;
    			width: 100%;
			}
			#user-forms {
				text-align: center;
			}
			#user-forms form {
				margin-left: auto;
				margin-right: auto;
			}
		}
		@media screen and (max-width: 768px) {
			#user-forms .col-md-4,
			#user-forms .col-md-8 {
				padding-left: 15px;
				padding-right: 15px;
			}
			#user-forms.reg-form .form-group,
			#user-forms.reg-form .form-group label {
				float: left;
    			width: 100%;
    			text-align: left;
			}
		}
	</style>
</head>
<body class="bg-lblue">

       <div class="container-fluid">
      	 	{{-- @include('admin.layouts.page-title') --}}
			@yield('MainContent')
       </div>{{-- container-fluid --}}
    
	

	@include('admin.layouts.footer')	

	@include('admin.layouts.foot')
	@yield('AditionalFoot')	
	
</body>
</html>

