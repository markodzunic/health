<div class="row">
    <div class="col-md-12">
        <h1>Hello, {{ Auth::user()->first_name .' '. Auth::user()->last_name }}</h1>   
    </div>
</div>
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
