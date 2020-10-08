@extends('layouts.master')

@section('title','Users Contact List')

@section('stylesheets')
    <style type="text/css">
    .error{ outline: 1px solid red; }
    </style>
@endsection

@section('content')

    <div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <h1 class="text-secondary">Users Contact List</h1>
        </div>
        <div class="container-fluid">
            <div class="row">
                <h2 class="one">Contacts</h2>
                <button class="btn btn-info ml-auto" id="createNewContact">Create Contact</button>
            </div>
        </div>
        <br>
        <table id="dataTable" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th width="280px">Action</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    {{-- create/update contact modal--}}
    @include('contacts._contact-form')

@endsection

@section('scripts')

    <script type="text/javascript">
        $(function () {
            //ajax setup
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // datatable
            var table = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('contacts') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'first_name', name: 'first_name'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'email', name: 'email'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $('#contactForm input[type="text"]').blur(function(){
                if(!$(this).val()){
                    $(this).addClass("error");
                } else{
                    $(this).removeClass("error");
                }
            });

            // create new contact
            $('#createNewContact').click(function () {
                $('#saveBtn').html("Create");
                $('#contact_id').val('');
                $('#contactForm').trigger("reset");
                $('#modelHeading').html("Create New Contact");
                $('#ajaxModel').modal('show');
            });

            // create or update contact
            $('#saveBtn').click(function (e) {
                e.preventDefault();
                $(this).html('Saving...');
                $.ajax({
                    data: $('#contactForm').serialize(),
                    url: "{{ url('contacts') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#contactForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();
                        $('#saveBtn').html('Save');
                    },
                    error: function (data) {
                        console.log('Error:', data.errors);
                        $('#saveBtn').html('Save');
                    }
                });
            });

            // edit contact
            $('body').on('click', '.editContact', function () {
                var contact_id = $(this).data('id');
                $.get("{{ url('contacts') }}" + '/' + contact_id + '/edit', function (data) {
                    $('#modelHeading').html("Edit Contact");
                    $('#saveBtn').html('Update');
                    $('#ajaxModel').modal('show');
                    $('#contact_id').val(data.id);
                    $('#first_name').val(data.first_name);
                    $('#last_name').val(data.last_name);
                    $('#email').val(data.email);
                })
            });

            // delete contact
            $('body').on('click', '.deleteContact', function () {
                var contact_id = $(this).data("id");
                
                if(!confirm('Are you sure you want to delete this?')) {
                    e.preventDefault();
                }

                $.ajax({
                    type: "DELETE",
                    url: "{{ url('contacts') }}" + '/' + contact_id,
                    success: function (data) {
                        table.draw();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });

        });
    </script>

@endsection