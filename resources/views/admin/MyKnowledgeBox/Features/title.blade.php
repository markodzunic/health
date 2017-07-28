<section class="admin-title-section bg-blue im-white">
	<div class="container-fluid">
		<div class="row">
	    	<div class="col-md-12">
	    		<a href="{{ URL::to('/home') }}">iMedical</a> <i class="fa fa-angle-right"></i>
	    		<a href="{{ URL::to('/dashboard') }}">Dashboard</a> <i class="fa fa-angle-right"></i>
				<a href="{{ URL::to('/my_knowledge_box') }}">My Knowledge Box</a> <i class="fa fa-angle-right"></i>
				<a href="{{ URL::to('/') }}" class="im-active">{{ $page->name }}</a>
		    </div>
		</div>
	</div>
</section>
