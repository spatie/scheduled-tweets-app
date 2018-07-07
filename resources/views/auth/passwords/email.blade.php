@extends('layouts.app')

@section('content')
    <div class="bg-grey-lighter h-screen">
        <div class="container h-full flex justify-center items-center">

            <div>
                <h1 class="font-hairline text-xl mb-6 text-center">{{ __('Reset password') }}</h1>

                <div class="border-teal p-8 border-t-12 bg-white mb-6 rounded-lg shadow-lg">
                    <div>
                        <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset password') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>

                                <div>
                                    <input class="form-input" id="email" type="email" name="email"
                                           value="{{ old('email') }}" required
                                           autofocus>

                                    @if ($errors->has('email'))
                                        <span role="alert">
                                        <div class="mt-2 font-hairline text-red text-xs italic">{{ $errors->first('email') }}</div>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="mt-8">
                                <div class="flex items-center justify-between">
                                    <button type="submit"
                                            class="bg-teal-dark hover:bg-teal text-white font-bold py-2 px-4 rounded">
                                        {{ __('Send password link') }}
                                    </button>

                                    <a class="pl-4 no-underline inline-block align-baseline font-hairline text-xs text-blue hover:text-blue-dark float-right"
                                       href="/login">
                                        {{ __('Back to login') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
