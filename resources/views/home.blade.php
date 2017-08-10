@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('layouts.sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  <div class="bs-example" data-example-id="simple-jumbotron">
                    <div class="jumbotron">
                      <h1>Hello, {{ auth()->user()->name }}</h1>
                      <p>Welcome To {{ env('APP_NAME') }}.</p>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
