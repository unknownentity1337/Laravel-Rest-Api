<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>User</h4>
                </div>
                <div class="card-body">
                    {{ $user }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fas fa-fire"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Api</h4>
                </div>
                <div class="card-body">
                    {{ $api }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fas fa-sync"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Changelog</h4>
                </div>
                <div class="card-body">
                    {{ $changelog }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-book"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Category</h4>
                </div>
                <div class="card-body">
                    {{ $category }}
                </div>
            </div>
        </div>
    </div>
</div>
