@extends('layouts.rad')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Radication No. {{ $radication->number }}</h1>
    </div>
    <!-- /.col-lg-12 -->

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    View
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group">
                                <p>{!! Form::label(null, 'Type process: ') !!}
                                    {{ $radication->typeprocess->name }}</p>
                            </div>

                            <div class="form-group">
                                <p>{!! Form::label(null, 'Created: ') !!}
                                    {{ $radication->created_at }}</p>
                            </div>

                            <div class="form-group">
                                <p>{!! Form::label(null, 'Registered by: ') !!}
                                    {{ $radication->user->name }}</p>
                            </div>

                            <div class="form-group">
                                {!! Form::label(null, 'Short description: ') !!}
                                <p>{{ $radication->shortdescription }}</p>
                            </div>

                            <div class="form-group">
                                {!! Form::label(null, 'Description: ') !!}
                                <p>{{ $radication->description }}</p>
                            </div>

                            {!! link_to('radications', 'Close', ['class' => 'btn btn-success']) !!}
                        </div>

                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>

            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group">
                                {!! Form::label(null, 'Download document: ') !!}
                                <a href={{ asset($pathfilename) }} download="{{$radication->filename}}">{{ $radication->filename }}</a>
                            </div>
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
