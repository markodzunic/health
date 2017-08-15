<section>
	<div class="container-fluid kb-container-padding">

		<ul class="accordion">
		  <li>
		    <a class="toggle bg-lblue im-active" href="javascript:void(0);">
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
		    <a class="toggle bg-lblue" href="javascript:void(0);">
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
		    <a class="toggle bg-lblue" href="javascript:void(0);">
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
		    <a class="toggle bg-lblue" href="javascript:void(0);">
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
		    <a class="toggle bg-lblue" href="javascript:void(0);">
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
		    <a class="toggle bg-lblue" href="javascript:void(0);">
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
	</div>
</section>
