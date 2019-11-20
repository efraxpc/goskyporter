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
                    <td class="text-center desktop mobile tablet">Customer</td>
                    <td class="text-center desktop ">Phone number</td>
                    <td class="text-center desktop">Remarks</td>
                    <td class="text-center desktop mobile tablet">Handling by</td>
                    <td class="text-center desktop">Actions</td>
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
                { data: 'indian_number', name: 'indian_number' },
                { data: 'remarks', name: 'remarks' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ],
            "columnDefs": [
                {
                    "targets": 1,
                    "render": function (data, type, row, meta) {
                        return '<p class="text-center">'+row.query_status+'</p>'
                    }
                },
                {
                    "targets": 2,
                    "render": function (data, type, row, meta) {
                        return '<p class="text-center">'+row.first_name + ' ' + row.last_name+'</p>'
                    }
                },
                {
                    "targets": 3,
                    "render": function (data, type, row, meta) {
                        return '<p class="text-center">'+row.indian_number+'</p>'
                    }
                },
                {
                    "targets": 4,
                    "render": function (data, type, row, meta) {
                        var str = 'No remarks'
                        if(row.remarks[0] !== '' && row.remarks.length >= 2 )
                        {
                            str = '<div class="text-center"><ul style="list-style: none;">'

                            row.remarks.forEach(function(slide) {
                                str += '<li>'+ slide + '</li>';
                            });

                            str += '</ul></div>';
                        }

                        return str
                    }
                },
                {
                    "targets": 5,
                    "render": function (data, type, row, meta) {
                        return '<p class="text-center">'+row.user_name+'</p>'
                    }
                },
                {
                    "targets": 6,
                    "render": function (data, type, row, meta) {
                        return row.action
                    }
                },
            ],
            order: [[0, 'desc']]
        });
    </script>

@stop
