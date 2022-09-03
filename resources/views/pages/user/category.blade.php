@section('title', $c->title)

<x-user-layout>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="p-8 pt-4 mt-2 bg-white">
                    <div class="table-responsive-lg">
                        <table class="table table-bordered table-striped text-md" id="table-1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Method</th>
                                    <th>Parameter</th>
                                    <th>Status</th>
                                    <th>Go</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($c->api as $a)
                                        <td>{{ $a->id }}</td>
                                        <td>{{ $a->title }}</td>
                                        <td><a href="{{ $c->slug }}">{{ $c->title }}</a></td>
                                        <td>{{ $a->method }}</td>
                                        <td>{{ $a->parameter }}</td>
                                        <td>{{ $a->status ? 'Active' : 'Deactive' }}
                                        <td>Go</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            $(document).ready(function() {
                $("#table-1").dataTable({

                    // scrollCollapse: true,
                });
            });
        </script>
    @endpush
</x-user-layout>
