@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-12">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>

        <div class="col-12">
            <hr>
            <h3>Queries</h3>
            <table class="responsive nowrap table table-striped" id="queries-table" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <td>ID</td>
                    <td class="text-center desktop mobile tablet">Status</td>
                    <td class="text-center desktop">Customer</td>
                    <td class="text-center desktop">Origin</td>
                    <td class="text-center desktop">Destinaton</td>
                    <td class="text-center desktop">Handling by</td>
                    <td>Actions</td>
                </tr>
                </thead>
            </table>

        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var SITEURL = '{{URL::to('')}}';
        $('#queries-table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            index: SITEURL + "/queries/data",
            columns: [
                { data: 'id', name: 'id', "visible": false, "searchable": false },
                { data: 'query_status', name: 'query_status' },
                { data: 'user_name', name: 'user_name' },
                { data: 'origin', name: 'origin' },
                { data: 'destination', name: 'destination' },
                { data: 'first_name', name: 'first_name' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ],
            "columnDefs": [
                {
                    "targets": 1,
                    "render": function (data, type, row, meta) {
                        return row.query_status
                    }
                },
                {
                    "targets": 2,
                    "render": function (data, type, row, meta) {
                        return row.first_name + ' ' + row.last_name
                    }
                },
                {
                    "targets": 3,
                    "render": function (data, type, row, meta) {
                        return row.origin + ' - ' + row.origin_data
                    }
                },
                {
                    "targets": 4,
                    "render": function (data, type, row, meta) {
                        return row.destination + ' - ' + row.destination_data
                    }
                },
                {
                    "targets": 5,
                    "render": function (data, type, row, meta) {
                        return row.user_name
                    }
                },
            ],
            order: [[0, 'desc']]
        });
    </script>

@stop
