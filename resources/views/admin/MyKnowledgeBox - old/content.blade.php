<section>
	<div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class='input-group date'>
                    <input type='text' class="form-control" placeholder="Search My Knowledge Box" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-search"></span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="knoledge-grid">
	<div class="container">
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
						<a href="{{ URL::to('/my_knowledge_box_features') }}">
							<div class="grid-col-content">
								<strong>Clinical  Management</strong>
							</div>
						</a>
					</div>
					<div class="grid-col bg-lblue col-md-12">
						<a href="{{ URL::to('/my_knowledge_box_features') }}">
							<div class="grid-col-content">
								<strong>Infection Prevention & Control</strong>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="grid-col-2x bg-green col-md-2">
				<a href="{{ URL::to('/my_knowledge_box_features') }}">
					<div class="grid-col-content">
						<strong>Practice  Operations</strong>
					</div>
				</a>
			</div>

			<div class="grid-col bg-green col-md-2">
				<a href="{{ URL::to('/my_knowledge_box_features') }}">
					<div class="grid-col-content">
						<strong>Patient Management</strong>
					</div>
				</a>
			</div>
			<div class="grid-col bg-blue col-md-2">
				<a href="{{ URL::to('/my_knowledge_box_features') }}">
					<div class="grid-col-content">
						<strong>Privacy & Data Protection </strong>
					</div>
				</a>
			</div>
			<div class="grid-col bg-lblue col-md-2">
				<a href="{{ URL::to('/my_knowledge_box_features') }}">
					<div class="grid-col-content">
						<strong>Human Resources</strong>
					</div>
				</a>
			</div>
			<div class="grid-col bg-pink col-md-2">
				<a href="{{ URL::to('/my_knowledge_box_features') }}">
					<div class="grid-col-content">
						<strong>Finances</strong>
					</div>
				</a>
			</div>
			<div class="grid-col bg-blue col-md-2">
				<a href="{{ URL::to('/my_knowledge_box_features') }}">
					<div class="grid-col-content">
						<strong>Health & Safety </strong>
					</div>
				</a>
			</div>
			<div class="grid-col bg-purple col-md-2">
				<a href="{{ URL::to('/my_knowledge_box_features') }}">
					<div class="grid-col-content">
						<strong>Emergency & Disaster Recovery</strong>
					</div>
				</a>
			</div>

		</div>
	</div>
</section>