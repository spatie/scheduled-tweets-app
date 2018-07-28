@extends('layouts.app')

@section('content')

    <div class="section bg-grey-lighter h-screen">
        <div class="container">
                <tweet-list
                        :accounts=@json(['fullstackantwerp'])
                ></tweet-list>

            <flash></flash>
        </div>
    </div>

@endsection
