@extends('layouts.rad')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Type process</h1>
    </div>
    <!-- /.col-lg-12 -->

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit
                </div>
                <div class="panel-body">
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
                            {!! Form::open(['route' => ['typesprocess.update', $typeprocess], 'method' => 'PUT']) !!}
                                <div class="form-group">
                                    {!! Form::label('name', 'Name') !!}

                                    {!! Form::text('name', $typeprocess->name, ['class' => 'form-control', 'required']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('acronym', 'Acronym') !!}

                                    {!! Form::text('acronym', $typeprocess->acronym, ['class' => 'form-control', 'disabled']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('serial', 'Serial') !!}

                                    {!! Form::text('serial', $typeprocess->serial, ['class' => 'form-control', 'disabled']) !!}
                                </div>

                                {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}

                                {!! link_to('parameters/typesprocess', 'Cancel', ['class' => 'btn btn-danger']) !!}

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
