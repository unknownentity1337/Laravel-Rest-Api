@section('title', $c->title . " Api's")

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
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Method</th>
                                    <th>Parameter</th>
                                    <th>For User</th>
                                    <th>Status</th>
                                    <th>Url</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($c->api as $r => $a)
                                    <tr>
                                        <td>{{ $r + 1 }}</td>
                                        <td>{{ $a->title }}</td>
                                        <td>{{ $a->description }}</td>
                                        <td><a href="{{ $c->slug }}">{{ $c->title }}</a></td>
                                        <td>{{ $a->method }}</td>
                                        <td>{{ $a->parameter }}</td>
                                        <td>{{ $a->for }}</td>
                                        <td>{{ $a->status ? 'Active' : 'Deactive' }}
                                        <td><a class="btn btn-sm btn-outline-success"
                                                href="{{ url('api' . '/' . $c->slug . '/' . $a->slug) }}">Go</a>
                                        </td>
                                    </tr>
                                @endforeach
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
