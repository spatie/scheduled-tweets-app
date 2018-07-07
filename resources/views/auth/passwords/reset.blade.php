@extends('layouts.app')

@section('content')

    <div class="bg-grey-lighter h-screen">
        <div class="container h-full flex justify-center items-center">

            <div>
                <h1 class="font-hairline text-xl mb-6 text-center">{{ __('Reset password') }}</h1>

                <div class="border-teal p-8 border-t-12 bg-white mb-6 rounded-lg shadow-lg">
                    <div>
                        <form method="POST" action="{{ route('password.request') }}"
                              aria-label="{{ __('Reset password') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="mb-4">
                                <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>

                                <div>
                                    <input class="form-input" id="email" type="email" name="email"
                                           value="{{ $email ?? old('email') }}" required
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

                            <div class="mb-4">
                                <label for="password-confirm" class="form-label">{{ __('Confirm password') }}</label>

                                <div>
                                    <input class="form-input" id="confirm-password" type="password" name="password_confirmation" required>

                                    @if ($errors->has('password_confirmation'))
                                        <span role="alert">
                                        <div class="mt-2 font-hairline text-red text-xs italic">{{ $errors->first('password_confirmation') }}</div>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="mt-8">
                                <button type="submit"
                                        class="bg-teal-dark hover:bg-teal text-white font-bold py-2 px-4 rounded">
                                    {{ __('Reset password') }}
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
