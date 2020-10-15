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

    <div class="py-10">
        <header>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div
                    class="pb-5 border-b border-gray-200 space-y-3 sm:flex sm:items-center sm:justify-between sm:space-x-4 sm:space-y-0">
                    <h1 class="text-3xl font-bold leading-tight text-gray-900">
                        Denemeler
                    </h1>
                </div>
            </div>
        </header>
        <main class="mt-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                    <tr>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            No
                                        </th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Deneme Adı
                                        </th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Sınav Türü
                                        </th>
                                        <th class="px-6 py-3 bg-gray-50"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($exams as $key=>$exam)
                                        <!-- Odd row -->
                                        <tr class="{{$key % 2 == 1 ? 'bg-white' : 'bg-gray-50'}}">
                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                                {{$exam->id}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                                {{$exam->name}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                                {{$exam->type->name}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium flex justify-end">
                                                <a href="{{route('ex.edit', $exam)}}"
                                                   class="text-indigo-600 hover:text-indigo-900">Düzenle</a>
                                                <form action="{{route('ex.destroy', $exam)}}" method="POST"
                                                      onsubmit="return confirm('{{$exam->name}} isimli denemeyi ve denemeye bağlı tüm sınav sonuçlarını silmek üzeresiniz?\n\n' +
                                                       'Bu kaydı silmek istediğinize emin misiniz?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="ml-5 text-red-600 hover:text-red-900">
                                                        Sil
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <!-- More rows... -->
                                    </tbody>
                                </table>
                                {{--                            <div class="py-2 px-4 mt-5">--}}
                                {{--                                {{$exams->links()}}--}}
                                {{--                            </div>--}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
@endsection
