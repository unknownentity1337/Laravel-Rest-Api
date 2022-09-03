@section('title', 'User Dashboard')
@push('style')
    <style>
        li {
            font-size: 14px;
            margin-left: 11px;
            list-style-type: circle;
        }
    </style>
@endpush
<x-user-layout>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="far fa-eye"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Visitor</h4>
                    </div>
                    <div class="card-body">
                        {{ $visitor }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-sync"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Request</h4>
                    </div>
                    <div class="card-body">
                        {{ $req ? $req->total_request : 0 }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
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
                <div class="card-icon bg-success">
                    <i class="fas fa-history"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Today</h4>
                    </div>
                    <div class="card-body">
                        {{ $req ? $req->today_request : 0 }}
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-fire"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Features</h4>
                    </div>
                    <div class="card-body">
                        {{ $feature }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="far fa-check-circle"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Active</h4>
                    </div>
                    <div class="card-body">
                        {{ $active }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-exclamation"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Error</h4>
                    </div>
                    <div class="card-body">
                        {{ $error }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-sack-dollar"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Donated</h4>
                    </div>
                    <div class="card-body">
                        0 Rp
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-10 col-lg-6">
                <div class="card card-stats card-round">
                    <div class="card-header">
                        <h3 style="margin-bottom: 0">
                            T.O.S
                    </div>
                    <div class="card-body mb-3">
                        <ol>
                            <li> Dilarang flooding requests.</li>
                            <li>
                                Membuat banyak akun pada IP yang sama maka IP otomatis akan di block.
                            </li>
                            <li>
                                Owner dapat sewaktu waktu mengubah ketentuan di website ini, demi menjaga
                                kualitas website.
                            </li>
                            <li>
                                Dilarang keras untuk menyebarkan apikey Anda, jika ketahuan. InsyaAllah akan di
                                block :)
                            </li>
                            <li> Dilarang membuat api dari api yang telah disediakan.</li>
                            <li>
                                Owner tidak bertanggung jawab atas apa yang Anda lakukan dalam penggunaan
                                website ini.
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-10 col-lg-6">
                <div class="card card-stats card-round">
                    <div class="card-header">
                        <h3 style="margin-bottom: 0">
                            F.Q.A
                        </h3>
                    </div>
                    <div class="card-body mb-3">
                        <ol>
                            <li>Q : Website ini dibuat dengan apa?</li>
                            <li>A : Website ini dibuat menggunakan laravel + livewire </li>
                            <li>Q : Kapankah limit api key akan direset?</li>
                            <li>A : Limit api key akan di reset setiap pukul 00:00 , dapat dilihat secara langsung di <a
                                    href="https://timee.io/3aG">Sini</a></li>
                            <li>Q : Apakah source code website ini dijual?</li>
                            <li>A : Tidak , source code website ini tidak dijual , silahkan gunakan api yang tersedia
                                secara gratis :) </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
</x-user-layout>
