@extends('layouts.rad')

@section('headscript')
<!-- DataTables CSS -->
<link href="{{ asset('/admin/vendor/datatables-plugins/dataTables.bootstrap.css') }}" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="{{ asset('/admin/vendor/datatables-responsive/dataTables.responsive.css') }}" rel="stylesheet">

@endsection

@section('footscript')
<!-- DataTables JavaScript -->
<script src="{{ asset('/admin/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/admin/vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('/admin/vendor/datatables-responsive/dataTables.responsive.js') }}"></script>

<script>
$(document).ready(function() {
    $('#list-table').DataTable({
        responsive: true
    });
});
</script>

@endsection



@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Roles</h1>
    </div>
    <!-- /.col-lg-12 -->

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List rows
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    @include('flash::message')

                    <div class="row">
                        <div class="col-lg-6">
                            <a href="{{ route('roles.create') }}" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i> New</a>
                        </div>
                    </div><br>


                    <table width="100%" class="table table-striped table-bordered table-hover" id="list-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr class="even gradeC">
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td class="center">
                                    <a href="{{ route('roles.edit',  $role->id) }}" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}
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
@endsection
