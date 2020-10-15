@extends('layouts.app')

@section('content')
    @if(Session::has('message'))
        <div x-data="{open: true}">

            <div
                class="fixed inset-0 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end"
                x-show="open">
                <!--
                  Notification panel, show/hide based on alert state.

                  Entering: "transform ease-out duration-300 transition"
                    From: "translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                    To: "translate-y-0 opacity-100 sm:translate-x-0"
                  Leaving: "transition ease-in duration-100"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto">
                    <div class="rounded-lg shadow-xs overflow-hidden">
                        <div class="p-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <!-- Heroicon name: check-circle -->
                                    <svg class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18   0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div class="ml-3 w-0 flex-1 pt-0.5">
                                    <p class="text-sm leading-5 font-medium text-gray-900">
                                        {{Session::get('message')}}
                                    </p>
                                </div>
                                <div class="ml-4 flex-shrink-0 flex">
                                    <button x-on:click="open = false"
                                            class="inline-flex text-gray-400 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150">
                                        <!-- Heroicon name: x -->
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <form class="shadow p-4 rounded-md" method="POST" action="{{route('student.update', $student)}}">
        @csrf
        @method('PATCH')
        <div>
            <div>
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Öğrenci ekle
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                        Bu öğrenci sadece sizin okulunuz tarafından görünür.
                    </p>
                </div>
                <div class="mt-6 sm:mt-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="name" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                            Öğrenci Adı
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="max-w-lg flex rounded-md shadow-sm">
                                <input id="name" name="name" value="{{$student->name}}" autocomplete="off" class="flex-1 form-input block w-full min-w-0 rounded-none rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">



                </div>
            </div>
        </div>
        <div class="mt-8 border-t border-gray-200 pt-5">
            <div class="flex justify-end">
      <span class="inline-flex rounded-md shadow-sm">
        <a href="{{route('student.show', $student)}}" class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
          İptal
        </a>
      </span>
                <span class="ml-3 inline-flex rounded-md shadow-sm">
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
          Kaydet
        </button>
      </span>
            </div>
        </div>
    </form>

@endsection
