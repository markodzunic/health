<section>
	<div class="container-fluid kb-container-padding">
		<input type="hidden" id="section" name="section" value="{{ isset($data['section']) ? $data['section'] : '' }}">
		<input type="hidden" id="pg_id" name="pg_id" value="{{ isset($data['pg_id']) ? $data['pg_id'] : '' }}">
		<ul class="accordion">
		  <li>
		    <a id="recommended_practice" class="toggle bg-lblue im-active" href="javascript:void(0);">
		    	<i class="fa fa-trophy" aria-hidden="true"></i>
				<span>RBP</span>
			</a>
		    <div class="inner show">
		     	<div class="container">
						@if ($recommended_practice)
							@foreach ($recommended_practice as $rp)
		     				@include('admin.MyKnowledgeBox.Features.section')
							@endforeach
						@endif
		     	</div>
		    </div>
		  </li>

		  <li>
		    <a id="diff_practice" class="toggle bg-lblue" href="javascript:void(0);">
		    	<i class="fa fa-info-circle" aria-hidden="true"></i>
				<span>Our Practice Differences</span>
		    </a>
		    <div class="inner">
		     	<div class="container">
						@if ($diff_practice)
							@foreach ($diff_practice as $rp)
		     				@include('admin.MyKnowledgeBox.Features.section')
							@endforeach
						@endif
		     	</div>
		    </div>
		  </li>

		  <li>
		    <a id="checklist" class="toggle bg-lblue" href="javascript:void(0);">
		    	<i class="fa fa-check-circle" aria-hidden="true"></i>
				<span>Checklists</span>
		    </a>
		    <div class="inner">
		     	<div class="container">
						@if ($checklist)
							@foreach ($checklist as $rp)
		     				@include('admin.MyKnowledgeBox.Features.section')
							@endforeach
						@endif
		     	</div>
		    </div>
		  </li>

		  <li>
		    <a id="templates" class="toggle bg-lblue" href="javascript:void(0);">
		    	<i class="fa fa- fa-columns" aria-hidden="true"></i>
				<span>Templates</span>
		    </a>
		    <div class="inner">
		     	<div class="container">
						@if ($templates)
							@foreach ($templates as $rp)
		     				@include('admin.MyKnowledgeBox.Features.section')
							@endforeach
						@endif
		     	</div>
		    </div>
		  </li>

		  <li>
		    <a id="faq" class="toggle bg-lblue" href="javascript:void(0);">
		    	<i class="fa  fa-question-circle" aria-hidden="true"></i>
				<span>FAQs</span>
		    </a>
		    <div class="inner">
		     	<div class="container">
						@if ($faq)
							@foreach ($faq as $rp)
		     				@include('admin.MyKnowledgeBox.Features.section')
							@endforeach
						@endif
		     	</div>
		    </div>
		  </li>

		  <li>
		    <a id="resources" class="toggle bg-lblue" href="javascript:void(0);">
		    	<i class="fa fa-cogs" aria-hidden="true"></i>
				<span>Resources</span>
		    </a>
		    <div class="inner">
		     	<div class="container">
						@if ($ressources)
							@foreach ($ressources as $rp)
		     				@include('admin.MyKnowledgeBox.Features.section')
							@endforeach
						@endif
		     	</div>
		    </div>
		  </li>
		 </ul>

		  	{{-- <div id="welcome-content" class="small-padding">
		  		<div class="container">
		  			<div class="row">
		  				<div class="col-md-12" align="center">
		  					<img src="{{ asset('/img/welcome-img.jpg') }}" alt="">
		  				</div>
		  				<div class="col-md-12">
		  					<p>Medical practices are getting busier whilst the resources available to help with increased demand have reduced. The only option for practice owners, operators and staff is to increase and preserve efficiency daily to create and operate an efficient and organised practice.</p>

							<p>The importance of all staff understanding and implementing the same approach to processes and completion of tasks is critical to ensuring consistency, productivity and best practice. </p>

							<p>This section sets out information relating to Appointment Management, Telephone Administration, Post / Mail, Email & Fax communications, Practice Visitors and Internal Communication.
							</p>
		  				</div>
		  			</div>
		  		</div>
		  	</div> --}}
	</div>
</section>
