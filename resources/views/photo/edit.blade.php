@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('layouts.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Photo #{{ $photo->photo_id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/photo') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($photo, [
                            'method' => 'PATCH',
                            'url' => ['/photo', $photo->photo_id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('photo.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
