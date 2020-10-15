<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Öğrenci Analiz Programı</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
</head>
<body>
<nav class="bg-gray-800" x-data="{mobile: false, sub: false, sub2:false}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="-ml-2 mr-2 flex items-center md:hidden">
                    <!-- Mobile menu button -->
                    <button x-on:click="mobile = !mobile"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out"
                            aria-label="Main menu" aria-expanded="false">
                        <!-- Icon when menu is closed. -->
                        <!--
                          Heroicon name: menu

                          Menu open: "hidden", Menu closed: "block"
                        -->
                        <svg class="block h-6 w-6" fill="none" x-show="mobile == false" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <!-- Icon when menu is open. -->
                        <!--
                          Heroicon name: x

                          Menu open: "block", Menu closed: "hidden"
                        -->
                        <svg class="h-6 w-6" fill="none" x-show="mobile == true" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <div class="flex-shrink-0 flex items-center">
                    <h3 class="text-purple-500 text-lg font-bold">Öğrenci <span
                            class="text-white">Analiz Programı</span></h3>

                </div>
                <div class="hidden md:ml-6 md:flex md:items-center">
                    <div class="relative" x-data="{open: false}">
                        <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                        <button type="button" x-on:click="open = !open"
                                class="group text-gray-300 px-3 py-2 rounded-md text-sm inline-flex items-center space-x-2 leading-6 font-medium hover:text-gray-100 focus:outline-none focus:text-white focus:bg-gray-700 transition ease-in-out duration-150">
                            <span>Öğrenci İşlemleri</span>
                            <!--
                              Heroicon name: chevron-down

                              Item active: "text-gray-600", Item inactive: "text-gray-400"
                            -->
                            <svg
                                class="text-gray-400 h-5 w-5 group-hover:text-gray-500 group-focus:text-gray-500 transition ease-in-out duration-150"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </button>

                        <!--
                          Flyout menu, show/hide based on flyout menu state.

                          Entering: "transition ease-out duration-200"
                            From: "opacity-0 translate-y-1"
                            To: "opacity-100 translate-y-0"
                          Leaving: "transition ease-in duration-150"
                            From: "opacity-100 translate-y-0"
                            To: "opacity-0 translate-y-1"
                        -->
                        <div class="absolute left-1/2 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-xs sm:px-0"
                             x-show="open" x-on:click.away="open = false">
                            <div class="rounded-lg shadow-lg">
                                <div class="rounded-lg shadow-xs overflow-hidden">
                                    <div class="z-20 relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                                        <a href="/cms/student/"
                                           class="-m-3 p-3 block space-y-1 rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                            <p class="text-sm leading-6 font-medium text-gray-900">
                                                Öğrenciler
                                            </p>
                                        </a>
                                        <a href="/cms/student/create"
                                           class="-m-3 p-3 block space-y-1 rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                            <p class="text-sm leading-6 font-medium text-gray-900">
                                                Öğrenci Ekle
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative" x-data="{open: false}">
                        <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                        <button type="button" x-on:click="open = !open"
                                class="group text-gray-300 px-3 py-2 rounded-md text-sm inline-flex items-center space-x-2 leading-6 font-medium hover:text-gray-100 focus:outline-none focus:text-white focus:bg-gray-700 transition ease-in-out duration-150">
                            <span>Deneme İşlemleri</span>
                            <!--
                              Heroicon name: chevron-down

                              Item active: "text-gray-600", Item inactive: "text-gray-400"
                            -->
                            <svg
                                class="text-gray-400 h-5 w-5 group-hover:text-gray-500 group-focus:text-gray-500 transition ease-in-out duration-150"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </button>

                        <!--
                          Flyout menu, show/hide based on flyout menu state.

                          Entering: "transition ease-out duration-200"
                            From: "opacity-0 translate-y-1"
                            To: "opacity-100 translate-y-0"
                          Leaving: "transition ease-in duration-150"
                            From: "opacity-100 translate-y-0"
                            To: "opacity-0 translate-y-1"
                        -->
                        <div
                            class="absolute left-1/2 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-xs sm:px-0 z-20"
                            x-show="open" x-on:click.away="open = false">
                            <div class="rounded-lg shadow-lg">
                                <div class="rounded-lg shadow-xs overflow-hidden">
                                    <div class="z-20 relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                                        <a href="/cms/exam/"
                                           class="-m-3 p-3 block space-y-1 rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                            <p class="text-sm leading-6 font-medium text-gray-900">
                                                Denemeler
                                            </p>
                                        </a>
                                        <a href="/cms/exam/create"
                                           class="-m-3 p-3 block space-y-1 rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                            <p class="text-sm leading-6 font-medium text-gray-900">
                                                Deneme Ekle
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative" x-data="{open: false}">
                        <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                        <button type="button" x-on:click="open = !open"
                                class="group text-gray-300 px-3 py-2 rounded-md text-sm inline-flex items-center space-x-2 leading-6 font-medium hover:text-gray-100 focus:outline-none focus:text-white focus:bg-gray-700 transition ease-in-out duration-150">
                            <span>Sınav Sonucu ekle</span>
                            <!--
                              Heroicon name: chevron-down

                              Item active: "text-gray-600", Item inactive: "text-gray-400"
                            -->
                            <svg
                                class="text-gray-400 h-5 w-5 group-hover:text-gray-500 group-focus:text-gray-500 transition ease-in-out duration-150"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </button>

                        <!--
                          Flyout menu, show/hide based on flyout menu state.

                          Entering: "transition ease-out duration-200"
                            From: "opacity-0 translate-y-1"
                            To: "opacity-100 translate-y-0"
                          Leaving: "transition ease-in duration-150"
                            From: "opacity-100 translate-y-0"
                            To: "opacity-0 translate-y-1"
                        -->
                        <div
                            class="absolute left-1/2 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-xs sm:px-0 z-20"
                            x-show="open" x-on:click.away="open = false">
                            <div class="rounded-lg shadow-lg">
                                <div class="rounded-lg shadow-xs overflow-hidden">
                                    <div class="z-20 relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                                        @foreach($exam_types as $type)
                                            <a href="/cms/exam-result/{{$type->slug}}/create"
                                               class="-m-3 p-3 block space-y-1 rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                                <p class="text-sm leading-6 font-medium text-gray-900">
                                                    {{$type->name}}
                                                </p>
                                                {{--                                            <p class="text-sm leading-5 text-gray-500">--}}
                                                {{--                                                Learn about tips, product updates and company culture.--}}
                                                {{--                                            </p>--}}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative" x-data="{open: false}">
                        <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                        <button type="button" x-on:click="open = !open"
                                class="group text-gray-300 px-3 py-2 rounded-md text-sm inline-flex items-center space-x-2 leading-6 font-medium hover:text-gray-100 focus:outline-none focus:text-white focus:bg-gray-700 transition ease-in-out duration-150">
                            <span>Sonuçları görüntüle</span>
                            <!--
                              Heroicon name: chevron-down

                              Item active: "text-gray-600", Item inactive: "text-gray-400"
                            -->
                            <svg
                                class="text-gray-400 h-5 w-5 group-hover:text-gray-500 group-focus:text-gray-500 transition ease-in-out duration-150"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </button>

                        <!--
                          Flyout menu, show/hide based on flyout menu state.

                          Entering: "transition ease-out duration-200"
                            From: "opacity-0 translate-y-1"
                            To: "opacity-100 translate-y-0"
                          Leaving: "transition ease-in duration-150"
                            From: "opacity-100 translate-y-0"
                            To: "opacity-0 translate-y-1"
                        -->
                        <div
                            class="absolute left-1/2 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-xs sm:px-0 z-20"
                            x-show="open" x-on:click.away="open = false">
                            <div class="rounded-lg shadow-lg">
                                <div class="rounded-lg shadow-xs overflow-hidden">
                                    <div class="z-20 relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                                        @foreach($exam_types as $type)
                                            <a href="/sonuclar/{{$type->slug}}"
                                               class="-m-3 p-3 block space-y-1 rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                                <p class="text-sm leading-6 font-medium text-gray-900">
                                                    {{$type->name}}
                                                </p>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center">
                <div class="flex-shrink-0">
                </div>
                <div class="hidden md:ml-4 md:flex-shrink-0 md:flex md:items-center" x-data="{open: false}">
                    {{--                    <button--}}
                    {{--                        class="p-1 border-2 border-transparent text-gray-400 rounded-full hover:text-gray-300 focus:outline-none focus:text-gray-500 focus:bg-gray-100 transition duration-150 ease-in-out"--}}
                    {{--                        aria-label="Notifications">--}}
                    {{--                        <!-- Heroicon name: bell -->--}}
                    {{--                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
                    {{--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
                    {{--                                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </button>--}}
                    <a href="{{asset('/media/sss.pdf')}}" target="_blank" title="Yardım"
                       class="inline-flex items-center px-1 py-1 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:border-yellow-700 focus:shadow-outline-yellow active:bg-yellow-700 transition ease-in-out duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"  class="h-6 w-6" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </a>
                {{--                    <form action="{{route('logout')}}" method="POST" class="ml-4">--}}
                {{--                        @csrf--}}
                {{--                        <span class="inline-flex rounded-md shadow-sm">--}}
                {{--  <button--}}
                {{--      class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">--}}
                {{--    Çıkış Yap--}}
                {{--  </button>--}}
                {{--</span>--}}
                {{--                    </form>--}}

                <!-- Profile dropdown -->
                    <div class="ml-5 relative">
                        <div>
                            <button @click="open = !open"
                                    class="flex items-center text-sm text-gray-50 border-transparent focus:outline-none transition duration-150 ease-in-out"
                                    id="user-menu" aria-label="User menu" aria-haspopup="true">
                                {{auth()->user()->name}}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </div>
                        <!--
                          Profile dropdown panel, show/hide based on dropdown state.

                          Entering: "transition ease-out duration-200"
                            From: "transform opacity-0 scale-95"
                            To: "transform opacity-100 scale-100"
                          Leaving: "transition ease-in duration-75"
                            From: "transform opacity-100 scale-100"
                            To: "transform opacity-0 scale-95"
                        -->
                        <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg z-20" x-show="open" x-on:click.away="open = false">
                            <div class="py-1 rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical"
                                 aria-labelledby="user-menu">
                                <a href="{{route('user.reset')}}"
                                   class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                   role="menuitem">Şifre Değiştir</a>
                                <form action="{{route('logout')}}" method="POST" class="w-full">
                                    @csrf
                                    <button type="submit"
                                            class="w-full text-left block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                        Çıkış Yap
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--
      Mobile menu, toggle classes based on menu state.

      Menu open: "block", Menu closed: "hidden"
    -->
    <div class="md:hidden" x-show="mobile">
        <div class="px-2 pt-2 pb-3 sm:px-3">
            <a href="/cms/student"
               class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Öğrenciler</a>
            <a href="/cms/student/create"
               class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Öğrenci
                Ekle</a>
            <a href="/cms/exam/"
               class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Denemeler</a>
            <a href="/cms/exam/create"
               class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Deneme
                Ekle</a>
            <button @click="sub = !sub"
                    class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">
                Sınav Sonucu Ekle
            </button>
            <div class="mt-3 px-2 sm:px-3" x-show="sub">
                @foreach($exam_types as $type)

                    <a href="/cms/exam-result/{{$type->slug}}/create"
                       class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">
                        {{$type->name}}
                    </a>
                @endforeach
            </div>
            <button @click="sub2 = !sub2"
                    class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">
                Sonuçlar
            </button>
            <div class="mt-3 px-2 sm:px-3" x-show="sub2">
                @foreach($exam_types as $type)

                    <a href="/sonuclar/{{$type->slug}}"
                       class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">
                        {{$type->name}}
                    </a>
                @endforeach
            </div>
        </div>
        <div class="pt-4 pb-3 border-t border-gray-700">
            {{--            <div class="flex items-center px-5 sm:px-6">--}}
            {{--                <div class="flex-shrink-0">--}}
            {{--                    <img class="h-10 w-10 rounded-full"--}}
            {{--                         src="{{asset('image/fatma.jpg')}}"--}}
            {{--                         alt="">--}}
            {{--                </div>--}}
            {{--                <div class="ml-3">--}}
            {{--                    <div class="text-base font-medium leading-6 text-white">Tom Cook</div>--}}
            {{--                    <div class="text-sm font-medium leading-5 text-gray-400">tom@example.com</div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <div class="mt-3 px-2 sm:px-3">
                {{--                <a href="#"--}}
                {{--                   class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Your--}}
                {{--                    Profile</a>--}}
                {{--                <a href="#"--}}
                {{--                   class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Settings</a>--}}
                <form action="{{route('logout')}}" method="POST">
                    @csrf

                    <button type="submit"
                            class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">
                        Çıkış Yap
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10 text-center">
    <h3 class="text-lg leading-6 font-medium text-gray-900">
        Öğrenci Analiz Programı
    </h3>
    <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2">

        @foreach($exam_types as $type)

            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <dl>
                        <dd class="mt-1 text-3xl leading-9 font-semibold text-gray-900 text-center">
                            <a href="/sonuclar/{{$type->slug}}"
                               class="-m-3 p-3 block space-y-1 rounded-md transition ease-in-out duration-150">
                                {{$type->name}}
                            </a>
                        </dd>
                    </dl>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</body>
</html>
