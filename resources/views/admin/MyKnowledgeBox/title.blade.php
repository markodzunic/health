<section class="admin-title-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Hello, {{ Auth::user()->first_name .' '. Auth::user()->last_name }}</h1>
            </div>
        </div>
    </div>
</section>
