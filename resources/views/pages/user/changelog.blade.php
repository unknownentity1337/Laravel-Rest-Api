@section('title', 'Changelog')
<x-user-layout>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="activities">
                    @foreach ($changelogs as $cg)
                        <div class="activity">
                            <div class="activity-icon bg-primary text-white shadow-primary">
                                <i class="fas fa-sync"></i>
                            </div>
                            <div class="activity-detail">
                                <div class="mb-2">
                                    <span class="text-job text-primary">{{ $cg->created_at->format('d M Y') }}</span>
                                    <span class="bullet"></span>

                                </div>
                                {!! $cg->content !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-user-layout>
