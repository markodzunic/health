@extends('public.layouts.default-template')
@section('AditionalHead')
<style>
	header, footer {
		display: none !important;
	}
	h1 {
		font-size: 100px;
		line-height: 120px;
	}
</style>
@stop

@section('StartPreloader')

@stop

@section('PageBanner')	

@stop

@section('MainContent')
<section>
	<div class="container">
		<div class="row" style="padding-top: 100px;">
			<div class="col-md-12">
				<h1>Oops!</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">				
				<h3>We can't seem to find the<br /> page you are looking for.</h3>
				<h4>Error Code: 404</h4>			
			</div>
			<div class="col-md-6">
                <div class="image-wrapper im-center">
                    <a href="{{ URL::to('/home') }}">
                        <img src="{{ asset('/img/imdeical-logo-icon-210.png') }}" alt="iMedical">
                    </a>
                </div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p><strong>Here are some helpfull links instead:</strong></p>
				<ul class="list-inline">
					<li><a href="{{ URL::to('/home') }}">Home</a></li>
					<li><a href="{{ URL::to('/features') }}">Features</a></li>
					<li><a href="{{ URL::to('/blog') }}">Blog</a></li>
					<li><a href="{{ URL::to('/contact') }}">Contact</a></li>
					<li><a href="{{ URL::to('/register') }}">Register</a></li>
					<li><a href="{{ URL::to('/faqs') }}">FAQs</a></li>
					<li><a href="{{ URL::to('/legals') }}">Legal</a></li>
					<li><a href="{{ URL::to('/pricing-plan') }}">Plans & Pricing</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>
@stop


@section('EndPreloader')

@stop
	
@section('AditionalFoot')

@stop