@extends('layouts.app')

@section('content')

    <div class="section bg-grey-lighter h-screen">
        <div class="container">
            <div class="row">
                <tweet-list
                        :accounts=@json(['fullstackantwerp'])
                ></tweet-list>
            </div>
        </div>
    </div>

@endsection
