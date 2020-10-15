<div class="py-10">
    <header>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div
                class="pb-5 border-b border-gray-200 space-y-3 sm:flex sm:items-center sm:justify-between sm:space-x-4 sm:space-y-0">
                <h1 class="text-3xl font-bold leading-tight text-gray-900">
                    Öğrenciler
                </h1>
                <div>
                    <label for="search_candidate" class="sr-only">Ara</label>
                    <div class="flex rounded-md shadow-sm">
                        <div class="relative flex-grow focus-within:z-10">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <!-- Heroicon name: search -->
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <input id="search_candidate" wire:model="search"
                                   class="form-input block w-full rounded-none rounded-l-md pl-10 transition ease-in-out duration-150 sm:hidden"
                                   placeholder="Ara">
                            <input id="search_candidate" wire:model="search"
                                   class="hidden form-input w-full rounded-none rounded-l-md pl-10 transition ease-in-out duration-150 sm:block sm:text-sm sm:leading-5"
                                   placeholder="Ara">
                        </div>
                        <button
                            class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-r-md text-gray-700 bg-gray-50 hover:text-gray-500 hover:bg-white focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                            <!-- Heroicon name: sort-ascending -->
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z"/>
                            </svg>
                            <span class="ml-2">Getir</span>
                            <!-- Heroicon name: chevron-down -->
                            <svg class="ml-2.5 -mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>
                </div>
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
                                        Öğrenci
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $key=>$student)
                                    <!-- Odd row -->
                                    <tr class="{{$key % 2 == 1 ? 'bg-white' : 'bg-gray-50'}}">
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                            {{$student->id}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                            {{$student->name}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                            <a href="{{route('student.show', $student)}}" class="text-indigo-600 hover:text-indigo-900">Görüntüle</a>
                                        </td>
                                    </tr>
                                @endforeach
                                <!-- More rows... -->
                                </tbody>
                            </table>
                            <div class="py-2 px-4 mt-5">
                                {{$students->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
</div>
