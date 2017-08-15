<style type="text/css">
#intro-section {
	position: relative;
	height: 100vh;
}
#intro-text span{
	font-size: 200px;
	line-height: 200px;
	font-weight: bold;
}
.logo:before {
    display: none;
  }
@media screen and (max-width: 991px) {
	#intro-text span {
		font-size: 130px;
		line-height: 130px;
	}
}
@media screen and (max-width: 776px) {
	#intro-text span {
		font-size: 100px;
		line-height: 100px;
	}
}
@media screen and (max-width: 480px) {
	#intro-text span {
		font-size: 50px;
		line-height: 50px;
	}
}
</style>
<section id="intro-section">
	<div class="container">
		<div class="intro-container im-center">
				<div id="intro-text">
				<span class="im-lblue animate bounceInUp"  data-wow-delay="1s">i</span>
				<span class="im-lblue animate bounceInUp"  data-wow-delay="1.2s">M</span>
				<span class="im-lblue animate bounceInUp"  data-wow-delay="1.4s">e</span>
				<span class="im-lblue animate bounceInUp"  data-wow-delay="1.6s">d</span>
				<span class="im-lblue animate bounceInUp"  data-wow-delay="1.8s">i</span>
				<span class="im-lblue animate bounceInUp"  data-wow-delay="2s">c</span>
				<span class="im-lblue animate bounceInUp"  data-wow-delay="2.2s">a</span>
				<span class="im-lblue animate bounceInUp"  data-wow-delay="2.4s">l</span>
			</div>
			<div class="small-padding im-center">
				<p class="h3">Life in Practice just got a whole lot easier.</p>
			</div>
			<div class="im-center">
				@if (!Auth::user())                          
	                <a class="btn im-btn pink-btn" href="{{ URL::to('/register') }}">Get started</a>
	            @else
	               <a class="btn im-btn pink-btn" href="{{ URL::to('/dashboard') }}">Get started</a>
	            @endif
			</div>
		</div>
		<a href="#" id="next-section" title="Back to top" style="display: block;">↓</a>
	</div>
</section>
