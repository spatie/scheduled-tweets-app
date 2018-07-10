@extends('layouts.app')

@section('content')

    <div class="section bg-grey-lighter h-screen">
        <div class="container">
            <div class="row">
                <div class="col">
                    <scheduled-tweets
                        :accounts=@json(['fullstackantwerp'])
                    ></scheduled-tweets>
                </div>
            </div>
        </div>
    </div>

@endsection
