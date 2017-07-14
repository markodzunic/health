<section class="im-center small-padding" id="pricing-plan-menu">
	<div class="container">
	  <div class="row">

	    <div class="col-md-4 im-pricing-plan-x" id="pricing-plan-1">
	      <div class="pricing-table im-blue">

	        <div class="pricing-table-header im-center">
	          <div class="badge-cont bg-blue"><img src="{{ asset('/img/pricing-3.svg') }}" alt=""></div>
	          <h3>BASIC<br> PLAN</h3>
	        </div>

	        <div class="pricing-table-body im-center">
	          <a class="btn im-btn blue-btn" href="#">View Pricing</a>
	          <h5>Lorem ipsum dolor sit amet</h5>
	          <p class="im-blue">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eu condimentum arcu. Sed urna arcu, faucibus ullamcorper nisl eu, lobortis egestas nunc. Duis eget dolor erat. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
	        </div>

	        <div class="pricing-table-footer im-center">
	          <p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</strong></p>
	        </div>

	      </div>

	    </div><!--/col--> 


	     <div class="col-md-4 im-pricing-plan-x" id="pricing-plan-2">
	      <div class="pricing-table im-lblue">

	        <div class="pricing-table-header im-center">
	        <div class="badge-cont bg-lblue"><img src="{{ asset('/img/pricing-2.svg') }}" alt=""></div>
	          <h3>BUSINESS<br> PLAN</h3>
	        </div>

	        <div class="pricing-table-body im-center">
	          <a class="btn im-btn lblue-btn" href="#">View Pricing</a>
	          <h5>Lorem ipsum dolor sit amet</h5>
	          <p class="im-blue">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eu condimentum arcu. Sed urna arcu, faucibus ullamcorper nisl eu, lobortis egestas nunc. Duis eget dolor erat. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
	        </div>

	        <div class="pricing-table-footer im-center">
	          <p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</strong></p>
	        </div>

	      </div>

	    </div><!--/col--> 


	     <div class="col-md-4 im-pricing-plan-x" id="pricing-plan-3">
	      <div class="pricing-table im-pink" >

	        <div class="pricing-table-header im-center">
	          <div class="badge-cont bg-pink"><img src="{{ asset('/img/pricing-1.svg') }}" alt=""></div>
	          <h3>PREMIUM<br> PLAN</h3>
	        </div>

	        <div class="pricing-table-body im-center">
	          <a class="btn im-btn pink-btn" href="#" >View Pricing</a>
	          <h5>Lorem ipsum dolor sit amet</h5>
	          <p class="im-blue">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eu condimentum arcu. Sed urna arcu, faucibus ullamcorper nisl eu, lobortis egestas nunc. Duis eget dolor erat. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
	        </div>

	        <div class="pricing-table-footer im-center">
	          <p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</strong></p>
	        </div>

	      </div>

	    </div><!--/col-->

	    <div class="col-md-12">
	    	<div id="plan-navigation">
	    		<div class="left-nav">
	    			<a href="#" class="btn im-btn lblue-btn im-prev"><i class="fa fa-arrow-left"></i></a>
	    			<a href="#" class="btn im-btn lblue-btn im-next"><i class="fa fa-arrow-right"></i></a>
	    		</div>
	    		<div class="right-nav">
	    			<a href="#" class="btn im-btn pink-btn im-close"><i class="fa fa-close"></i></a>
	    		</div>
	    	</div>
	    	<div class="pricing-plan-1 im-pricing-plan-s">
	    		@include('public.PricingPlan.basic-plan')
	    	</div>
	    	<div class="pricing-plan-2 im-pricing-plan-s">
	    		@include('public.PricingPlan.business-plan')
	    	</div>
	    	<div class="pricing-plan-3 im-pricing-plan-s">
	    		@include('public.PricingPlan.premium-plan')
	    	</div>
	    </div>


	  </div><!--/row-->
	</div>

</section>