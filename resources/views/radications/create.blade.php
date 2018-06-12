@extends('layouts.rad')


@section('footscript')
<script>
$("#typeproc_id").change(function(){
    $.getJSON( "/parameters/typesprocess/" + $(this).val(), function( data ) {
         $("#serial").val(data[0].serialnumber);
         $("#number_1").val(data[0].serialtext);
         $("#number").val(data[0].serialtext);

         alert($("#number").val());
    });

});

</script>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Radication</h1>
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
                            {!! Form::open(['route' => 'radications.store', 'method' => 'POST', 'files' => true]) !!}
                                <div class="form-group">
                                    {!! Form::label('typeproc_id', 'Type process') !!}
                                    {!! Form::select('typeproc_id', $typesprocess, 0, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('number_1', 'Number') !!}
                                    {!! Form::text('number_1', null, ['class' => 'form-control', 'disabled']) !!}

                                    {!! Form::hidden('number', null, ['id' => 'number']) !!}
                                    {!! Form::hidden('serial', null, ['id' => 'serial']) !!}
                                    {!! Form::hidden('user_id', Auth::user()->id) !!}
                                    {!! Form::hidden('status', 'Active') !!}

                                </div>

                                <div class="form-group">
                                    {!! Form::label('shortdescription', 'Description') !!}
                                    {!! Form::textarea('shortdescription', null, ['class' => 'form-control', 'rows' => 2, 'required']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('description', 'Comment') !!}
                                    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 4, 'required']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('file', 'Document') !!}
                                    {!! Form::file('file', ['class' => 'form-control-file']) !!}
                                </div>




                                {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}

                                {!! link_to('radications', 'Cancel', ['class' => 'btn btn-danger']) !!}

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
