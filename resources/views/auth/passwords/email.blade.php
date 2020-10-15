@extends('layouts.auth-layout')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
                {{ __('Reset Password') }}
            </h2>

            <!--
              Tailwind UI components require Tailwind CSS v1.8 and the @tailwindcss/ui plugin.
              Read the documentation to get started: https://tailwindui.com/documentation
            -->
            @if (session('status'))
                <div class="rounded-md bg-green-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <!-- Heroicon name: check-circle -->
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm leading-5 font-medium text-green-800">
                                {{ session('status') }}
                            </p>
                        </div>
                        <div class="ml-auto pl-3">
                            <div class="-mx-1.5 -my-1.5">
                                <button
                                    class="inline-flex rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:bg-green-100 transition ease-in-out duration-150"
                                    aria-label="Dismiss">
                                    <!-- Heroicon name: x -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                         fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <form class="mt-6" method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="rounded-md shadow-sm">
                    <div>
                        <input aria-label="Email address" name="email" type="email" required
                               class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5"
                               placeholder="Email" value="{{old('email')}}">
                    </div>
                    {{--                    <label for="email"--}}
                    {{--                           class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                    {{--                    <div class="col-md-6">--}}
                    {{--                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"--}}
                    {{--                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

                    @error('email')
                    <p class="text-red-500 text-xs mt-1">
                        <strong>{{ $message }}</strong>
                    </p>
                    @enderror
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
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>

            </form>
        </div>
    </div>

@endsection
