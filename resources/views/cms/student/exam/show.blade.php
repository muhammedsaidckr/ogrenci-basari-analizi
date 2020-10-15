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
                    <h1 class="text-xl font-bold leading-tight text-gray-900">
                        Görüntülenen Deneme: {{$exam->name}}
                    </h1>

                </div>
            </div>
        </header>
        <main class="mt-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="border-b border-gray-200 px-4 py-5 sm:px-6">
                        {{$exam->name}} İçin Kaydı Yapılmış Dersler
                    </div>
                    <div class="flex flex-col px-4 py-5 sm:p-6">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead>
                                        <tr>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                Ders Adı
                                            </th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                Doğru
                                            </th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                Yanlış
                                            </th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                Boş
                                            </th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                Alt Konu
                                            </th>
                                            <th class="px-6 py-3 bg-gray-50"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- Odd row -->
                                        @foreach($exam_results as $key=>$result)
                                            <tr class="{{$key % 2 == 0 ? 'bg-white' : 'bg-gray-50'}}">
                                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                                    {{$result->lesson->name}}
                                                </td>
                                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                                    {{$result->true}}
                                                </td>
                                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                                    {{$result->false}}
                                                </td>
                                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                                    {{$result->empty}}
                                                </td>
                                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                                    {{$result->results->count()}}
                                                </td>
                                                <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium flex justify-end">
                                                    <form action="/cms/student/lesson/{{$result->id}}"
                                                          method="POST"
                                                          onsubmit="return confirm('Silmek istediğinize emin misiniz ?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="ml-5 text-red-600 hover:text-red-900">
                                                            Sil
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white shadow overflow-hidden sm:rounded-lg mt-10">
                    <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Deneme Bilgileri
                        </h3>
                    </div>
                    <div class="px-4 py-5 sm:p-0">
                        <dl>
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                                <dt class="text-sm leading-5 font-medium text-gray-500">
                                    Öğrenci Adı
                                </dt>
                                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{$student->name}}
                                </dd>
                            </div>
                        </dl>
                        <dl>
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                                <dt class="text-sm leading-5 font-medium text-gray-500">
                                    Adı
                                </dt>
                                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{$exam->name}}
                                </dd>
                            </div>
                            <div
                                class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                                <dt class="text-sm leading-5 font-medium text-gray-500">
                                    Toplam Ders Sayısı
                                </dt>
                                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{$exam_results->count()}}
                                </dd>
                            </div>
                            <div class="sm:px-6 sm:py-5 flex justify-end">
                                <form action="/cms/student/exam/{{$student->id}}/{{$exam->id}}"
                                      method="POST"
                                      onsubmit="return confirm('Silmek istediğinize emin misiniz ?');">
                                    @csrf
                                    @method('DELETE')
                                    <span class="inline-flex rounded-md shadow-sm ml-5">
  <button type="submit"
          class="inline-flex items-center px-4 py-2 border border-red-300 text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:text-gray-50 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
    Denemeyi Sil
  </button>
</span>
                                </form>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </main>
    </div>

@endsection
