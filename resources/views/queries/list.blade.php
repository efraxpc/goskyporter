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
                    <td class="text-center desktop mobile tablet">Email</td>
                    <td class="text-center desktop ">Phone number</td>
                    <td class="text-center desktop">Remarks</td>
                    <td class="text-center desktop">Query date</td>
                    <td class="text-center desktop mobile tablet">Handling by</td>
                    <td class="text-center desktop">Actions</td>
                </tr>
                </thead>
            </table>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalAddRemarks" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Remark</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('save_remark') }}" id="form_save_remark">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id_query" id="id_query">
                        <input type="text" class="form-control" name="remark" required/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        let $modal = $('#modalAddRemarks');

        // show the modal when delete button clicked
        $('#queries-table').on('click', '.del_' ,function(e){
            e.preventDefault();
            $modal.modal('show');
            $('#id_query').val($(this)[0].getAttribute('data-id'))

        });

        // grab the data-id value from the button that was clicked once modal is shown
        $modal.on('show.bs.modal', function (event) {
            var id = $(event.relatedTarget).data('id');
            $("#del_id").val(id);
        });

        $('#form_save_remark').submit(function() { // bind function to submit event of form
            $.ajax({
                type: $(this).attr('method'), // get type of request from 'method'
                url: $(this).attr('action'), // get url of request from 'action'
                data: $(this).serialize(), // serialize the form's data
                success: function(response) {
                    $('#modalAddRemarks').modal('toggle');
                    $('#form_save_remark')[0].reset();
                    $('.dataTable').each(function() {
                        dt = $(this).dataTable();
                        dt.fnDraw();
                    })
                }
            });
            return false; // important: prevent the form from submitting
        });

        function formatDate(date) {
            var monthNames = [
                "January", "February", "March",
                "April", "May", "June", "July",
                "August", "September", "October",
                "November", "December"
            ];

            var day = date.getDate();
            var monthIndex = date.getMonth();
            var year = date.getFullYear();

            return day + ' ' + monthNames[monthIndex] + ' ' + year;
        }

        var SITEURL = '{{URL::to('')}}';
        $('#queries-table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            index: SITEURL + "/queries/data",
            columns: [
                { data: 'id', name: 'id', "visible": true, searchable: false },
                { data: 'query_status', name: 'query_status' },
                { data: 'user_name', name: 'user_name', searchable: true },
                { data: 'email', name: 'email', searchable: true },
                { data: 'indian_number', name: 'indian_number', searchable: true },
                { data: 'remarks', name: 'remarks' },
                { data: 'query_Date', name: 'query_Date' },
                { data: 'query_Date', name: 'query_Date' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
                { data: 'first_name', name: 'first_name',"visible": false, },
                { data: 'last_name', name: 'last_name', "visible": false, },
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
                        return '<p class="text-center">'+row.email+'</p>'
                    }
                },
                {
                    "targets": 5,
                    "render": function (data, type, row, meta) {
                        str = '<div class="text-center"><ul style="list-style: none;">'
                        row.remarks.forEach(function(slide) {
                            str += '<li>'+ slide + '</li>';
                        });
                        str += '</ul></div>';
                        return str
                    }
                },
                {
                    "targets": 6,
                    "render": function (data, type, row, meta) {
                        return formatDate(new Date(row.query_date))
                    }
                },
                {
                    "targets": 7,
                    "render": function (data, type, row, meta) {
                        return '<p class="text-center">'+row.user_name+'</p>'
                    }
                },
                {
                    "targets": 8,
                    "render": function (data, type, row, meta) {
                        return row.action
                    }
                },
            ],
            order: [[0, 'desc']]
        });

    </script>

@stop
