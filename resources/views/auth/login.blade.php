@extends('layouts.app')

@section('content')
    <div class="bg-grey-lighter h-screen">
        <div class="container h-full flex justify-center items-center">

            <div>
                <h1 class="font-hairline text-xl mb-6 text-center">Scheduled Tweets login</h1>

                <div class="border-teal p-8 border-t-12 bg-white mb-6 rounded-lg shadow-lg">
                    <div>
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
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

                            <div class="mb-4">
                                <label for="password" class="form-label">{{ __('Password') }}</label>

                                <div>
                                    <input class="form-input" id="password" type="password" name="password" required>

                                    @if ($errors->has('password'))
                                        <span role="alert">
                                        <div class="mt-2 font-hairline text-red text-xs italic">{{ $errors->first('password') }}</div>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="mt-8">
                                <div class="flex items-center justify-between">
                                    <button type="submit"
                                            class="bg-teal-dark hover:bg-teal text-white font-bold py-2 px-4 rounded">
                                        {{ __('Login') }}
                                    </button>

                                    <a class="pl-4 no-underline inline-block align-baseline font-hairline text-xs text-blue hover:text-blue-dark float-right"
                                       href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
