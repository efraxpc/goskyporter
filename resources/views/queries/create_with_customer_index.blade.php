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
            <h3>Existing customers</h3>
            <table class="responsive nowrap table table-striped" id="queries-table" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <td>ID</td>
                    <td class="text-center desktop mobile tablet">Name</td>
                    <td class="text-center desktop mobile tablet">Indian Phone</td>
                    <td class="text-center desktop mobile tablet">American Phone</td>
                    <td class="text-center desktop mobile tablet">Email</td>
                    <td class="text-center desktop mobile tablet">Handling by</td>
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
                { data: 'first_name', name: 'first_name' },
                { data: 'indian_number', name: 'indian_number' },
                { data: 'us_phone_number', name: 'us_phone_number' },
                { data: 'email', name: 'email' },
                { data: 'handled_by', name: 'handled_by' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ],
            "columnDefs": [
                {
                    "targets": 1,
                    "render": function (data, type, row, meta) {
                        return row.first_name + ' ' + row.last_name
                    }
                },
                {
                    "targets": 2,
                    "render": function (data, type, row, meta) {
                        return row.indian_number
                    }
                },
                {
                    "targets": 3,
                    "render": function (data, type, row, meta) {
                        return row.us_phone_number
                    }
                },
                {
                    "targets": 4,
                    "render": function (data, type, row, meta) {
                        return row.email
                    }
                },
                {
                    "targets": 5,
                    "render": function (data, type, row, meta) {
                        return row.handled_by
                    }
                },
            ],
            order: [[0, 'desc']]
        });
    </script>

@stop
