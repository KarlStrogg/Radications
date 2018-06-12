@extends('layouts.rad')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">User</h1>
    </div>
    <!-- /.col-lg-12 -->

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New
                </div>
                <div class="panel-body">
                    @include('flash::message')

                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-lg-6">
                            {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
                                <div class="form-group">
                                    {!! Form::label('name', 'Name') !!}

                                    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                                </div>


                                <div class="form-group">
                                    {!! Form::label('role_id', 'Role') !!}

                                    {!! Form::select('role_id', $roles, 0, ['class' => 'form-control']) !!}
                                </div>


                                <div class="form-group">
                                    {!! Form::label('email', 'Email') !!}

                                    {!! Form::text('email', null, ['class' => 'form-control', 'required']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('password', 'Password') !!}

                                    {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('status', 'Status') !!}

                                    {!! Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], 0, ['class' => 'form-control']) !!}
                                </div>

                                {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}

                                {!! link_to('admin/users', 'Cancel', ['class' => 'btn btn-danger']) !!}

                            {!! Form::close() !!}

                        </div>

                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
@endsection
