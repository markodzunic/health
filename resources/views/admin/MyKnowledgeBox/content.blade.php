<style type="text/css">
	.no-padding {
		padding: 0;
	}
	#knoledge-grid {
		margin-top: 90px;
	}
	.bg-green {
		background-color: #00ff00;
	}
	.bg-purple {
		background-color: purple;
	}
	#main-grid-col {
		min-height: 300px;
	}
	#main-grid-col,
	.grid-col-2x,
	.grid-col {
		padding-top: 20px;
		padding-top: 20px;
	}
	.grid-col-2x,
	.grid-col{
		text-align: center;
		position: relative;
		overflow:hidden;
	}
	.grid-col-2x a,
	.grid-col a{
		color: #fff;
		font-size: 20px;
		float: left;
    width: 100%;
    height: 100%;
	}
	.grid-col-2x a .grid-col-content,
	.grid-col a .grid-col-content{
		position: absolute;
		left: 0;
		right: 0;
		top: 0;
		bottom: 0;
		margin: auto;
		width: 100%;
	}
	.grid-col-2x a .grid-col-content,
	.grid-col a .grid-col-content{
		float: left;
		position: relative;
		width: 100%;
	}
	.grid-col-2x:hover,
	.grid-col:hover {
		opacity: 0.9
	}

</style>
<div id="knoledge-grid" class="container">
<div class="row">
	<div id="main-grid-col" class="col-md-8">
		<div>
			<h3 class="im-blue">Welcome to the Knowledge Box!</h3>
			<br>
			<h4 class="im-pink">Making things easy.</h4>
			<br>
			<p>Click <a href="" class="im-pink" data-toggle="modal" data-target="#siteMap">here</a> for Site Map </p>
		</div>
	</div>
	<div class="col-md-2">
		<div class="row">
			<div class="grid-col bg-pink col-md-12">
				<a href="{{ URL::to('/clinical_management') }}">
					<div class="grid-col-content">
						<strong>Clinical  Management</strong>
					</div>
				</a>
			</div>
			<div class="grid-col bg-lblue col-md-12">
				<a href="{{ URL::to('/infection_prevention') }}">
					<div class="grid-col-content">
						<strong>Infection Prevention & Control</strong>
					</div>
				</a>
			</div>
		</div>
	</div>
	<div class="grid-col-2x bg-green col-md-2">
		<a href="{{ URL::to('/practice_operations') }}">
			<div class="grid-col-content">
				<strong>Practice  Operations</strong>
			</div>
		</a>
	</div>

	<div class="grid-col bg-green col-md-2">
		<a href="{{ URL::to('/patient_management') }}">
			<div class="grid-col-content">
				<strong>Patient Management</strong>
			</div>
		</a>
	</div>
	<div class="grid-col bg-blue col-md-2">
		<a href="{{ URL::to('/data_protection') }}">
			<div class="grid-col-content">
				<strong>Privacy & Data Protection </strong>
			</div>
		</a>
	</div>
	<div class="grid-col bg-lblue col-md-2">
		<a href="{{ URL::to('/human_resources') }}">
			<div class="grid-col-content">
				<strong>Human Resources</strong>
			</div>
		</a>
	</div>
	<div class="grid-col bg-pink col-md-2">
		<a href="{{ URL::to('/information_security') }}">
			<div class="grid-col-content">
				<strong>Finances</strong>
			</div>
		</a>
	</div>
	<div class="grid-col bg-blue col-md-2">
		<a href="{{ URL::to('/health_safety') }}">
			<div class="grid-col-content">
				<strong>Health & Safety </strong>
			</div>
		</a>
	</div>
	<div class="grid-col bg-purple col-md-2">
		<a href="{{ URL::to('/emergency_planning') }}">
			<div class="grid-col-content">
				<strong>Emergency & Disaster Recovery</strong>
			</div>
		</a>
	</div>


</div>
</div>