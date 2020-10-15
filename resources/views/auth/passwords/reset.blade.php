@extends('layouts.auth-layout')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
                {{ __('Reset Password') }}
            </h2>

            <form class="mt-6" method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">
                <!--
                  Tailwind UI components require Tailwind CSS v1.8 and the @tailwindcss/ui plugin.
                  Read the documentation to get started: https://tailwindui.com/documentation
                -->
                <div>
                    <label for="email" class="block text-sm font-medium leading-5 text-gray-700">Email</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input id="email" name="email"
                               class="form-input block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red sm:text-sm sm:leading-5"
                               placeholder="you@example.com" aria-invalid="true" aria-describedby="email-error"
                               value="{{ $email ?? old('email') }}" required autocomplete="email"
                               autofocus>
                        @error('email')
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                        @enderror
                    </div>
                    @error('email')
                    <p class="mt-2 text-sm text-red-600" id="email-error">{{$message}}</p>
                    @enderror
                </div>


                <div>
                    <label for="password"
                           class="block text-sm font-medium leading-5 text-gray-700">{{ __('Password') }}</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="password" id="password" name="password"
                               class="form-input block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red sm:text-sm sm:leading-5"
                               aria-invalid="true" aria-describedby="password-error"
                               required autocomplete="new-password"
                               autofocus>
                        @error('password')
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                        @enderror
                    </div>
                    @error('password')
                    <p class="mt-2 text-sm text-red-600" id="email-error">{{$message}}</p>
                    @enderror

                </div>

                <div>
                    <label for="password-confirm"
                           class="block text-sm font-medium leading-5 text-gray-700">{{ __('Password') }}</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input id="password-confirm" type="password" name="password_confirmation"
                               class="form-input block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red sm:text-sm sm:leading-5"
                               aria-invalid="true" aria-describedby="password-error"
                               required autocomplete="password"
                               autofocus>
                    </div>
                </div>
                <div class="mt-6">
                    <button type="submit"
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400 transition ease-in-out duration-150"
                 fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd"
                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                    clip-rule="evenodd"/>
            </svg>
          </span>
                        {{ __('Reset Password') }}
                    </button>
                </div>

            </form>
        </div>
    </div>
    </div>
@endsection
