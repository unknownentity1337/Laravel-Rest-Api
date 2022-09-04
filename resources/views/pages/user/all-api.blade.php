@section('title', "All Api's")
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
                                @foreach ($all as $l)
                                    <tr>
                                        <td>{{ $l->id }}</td>
                                        <td>{{ $l->title }}</td>
                                        <td>{{ $l->description }}</td>
                                        <td><a href="{{ $l->category->slug }}">{{ $l->category->title }}</a></td>
                                        <td>{{ $l->method }}</td>
                                        <td>{{ $l->parameter }}</td>
                                        <td>{{ $l->for }}</td>
                                        <td>{{ $l->status ? 'Active' : 'Deactive' }}
                                        <td><a class="btn btn-sm btn-outline-success"
                                                href="{{ url('api' . '/' . $l->category->slug . '/' . $l->slug) }}">Go</a>
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
