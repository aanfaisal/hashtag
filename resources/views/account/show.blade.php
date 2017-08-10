@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('layouts.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Account {{ $account->insta_id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/account/' . $account->insta_id . '/edit') }}" title="Edit Account"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr><th> Email </th><td> {{ $account->email }} </td></tr><tr><th> Password </th><td> {{ $account->password }} </td></tr><tr><th> Hashtag </th><td> {{ $account->hashtag }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
