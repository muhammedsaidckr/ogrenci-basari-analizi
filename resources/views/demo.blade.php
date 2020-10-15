@extends('layouts.auth-layout')


@section('content')
    <div class="relative bg-white">
        <div class="absolute inset-0">
            <div class="absolute inset-y-0 left-0 w-1/2 bg-gray-50"></div>
        </div>
        <div class="relative max-w-7xl mx-auto lg:grid lg:grid-cols-5">
            <div class="bg-gray-50 py-16 px-4 sm:px-6 lg:col-span-2 lg:px-8 lg:py-24 xl:pr-12">
                <div class="max-w-lg mx-auto">
                    <h2 class="text-2xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-3xl sm:leading-9">
                        Bizimle İletişime Geçin
                    </h2>
                    <p class="mt-3 text-lg leading-6 text-gray-500">
                        Formu doldurarak bizimle iletişime geçebilirsiniz. <br>24 saat içerisinde geri dönüş yapılacaktır.
                    </p>
                    <dl class="mt-8 text-base leading-6 text-gray-500">
                        <div class="mt-6">
                            <dt class="sr-only">Telefon numarası</dt>
                            <dd class="flex">
                                <!-- Heroicon name: phone -->
                                <svg class="flex-shrink-0 h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                <span class="ml-3">
                <a href="tel:+905059996356">+90 (505) 999-6356</a>
              </span>
                            </dd>
                        </div>
                        <div class="mt-3">
                            <dt class="sr-only">Email</dt>
                            <dd class="flex">
                                <!-- Heroicon name: mail -->
                                <svg class="flex-shrink-0 h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <span class="ml-3">
                <a href="mailto:muhammedsaidckr@gmail.com">muhammedsaidckr@gmail.com</a>
              </span>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
            <div class="bg-white py-16 px-4 sm:px-6 lg:col-span-3 lg:py-24 lg:px-8 xl:pl-12">
                <div class="max-w-lg mx-auto lg:max-w-none">
                    <form action="/demo" method="POST" class="grid grid-cols-1 gap-y-6">
                        @csrf
                        <div>
                            <label for="full_name" class="sr-only">İsminiz</label>
                            <div class="relative rounded-md shadow-sm">
                                <input id="full_name" name="name" required
                                       class="form-input block w-full py-3 px-4 placeholder-gray-500 transition ease-in-out duration-150"
                                       placeholder="İsminiz">
                            </div>
                        </div>
                        <div>
                            <label for="email" class="sr-only">Email</label>
                            <div class="relative rounded-md shadow-sm">
                                <input id="email" type="email" name="email" required
                                       class="form-input block w-full py-3 px-4 placeholder-gray-500 transition ease-in-out duration-150"
                                       placeholder="Email">
                            </div>
                        </div>
                        <div>
                            <label for="phone" class="sr-only">Telefon</label>
                            <div class="relative rounded-md shadow-sm">
                                <input id="phone" name="phone" required
                                       class="form-input block w-full py-3 px-4 placeholder-gray-500 transition ease-in-out duration-150"
                                       placeholder="Telefon">
                            </div>
                        </div>
                        <div class="">
            <span class="inline-flex rounded-md shadow-sm">
              <button type="submit"
                      class="inline-flex justify-center py-3 px-6 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                Gönder
              </button>
            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
