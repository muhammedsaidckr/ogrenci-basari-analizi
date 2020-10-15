<div>
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

    @if(in_array($lesson_id, $exam_results))
        <form wire:submit.prevent="updateForm(Object.fromEntries(new FormData($event.target)))"
              class="shadow p-4 rounded-md">
            @else
                <form wire:submit.prevent="submitForm(Object.fromEntries(new FormData($event.target)))"
                      class="shadow p-4 rounded-md">
                    @endif
                    <dt class="text-lg leading-7">
                        <!-- Expand/collapse question button -->
{{--                        wire:click.prevent="$set('activeTab', {{!$activeTab}})"--}}
                        <button type="button"
                                class="text-left w-full flex justify-between items-start text-gray-400 focus:outline-none focus:text-gray-900">
                <span class="font-medium text-gray-900">
                    {{$exam_type_name}} sınav sonucu ekle
                </span>
                            <span class="ml-6 h-7 flex items-center">
                  <!--
                    Heroicon name: chevron-down

                    Open: "-rotate-180", Closed: "rotate-0"
                  -->
                  <svg class="{{$activeTab == 1 ? '-rotate-180' : 'rotate-0'}} h-6 w-6 transform" fill="none"
                       viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                  </svg>
                </span>
                        </button>
                    </dt>
                    <dd class="mt-2 pr-12 {{$activeTab == 1 ? 'block' : 'hidden'}}">


                        <div>
                            <div>
                                <div>
                                    {{--                        <h3 class="text-lg leading-6 font-medium text-gray-900"></h3>--}}
                                    {{--                        <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">--}}

                                    {{--                        </p>--}}
                                </div>

                                <div
                                    class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="student_id"
                                           class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                        Öğrenci
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
{{--                                        <div class="relative max-w-lg text-left">--}}
{{--                                            <div class="max-w-lg">--}}
{{--    <span class="max-w-lg rounded-md shadow-sm">--}}
{{--      <input--}}
{{--          type="text"--}}
{{--          class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition ease-in-out duration-150"--}}
{{--          id="options-menu" aria-haspopup="true" aria-expanded="true">--}}
{{--    </span>--}}
{{--                                            </div>--}}

{{--                                            <!----}}
{{--                                              Dropdown panel, show/hide based on dropdown state.--}}

{{--                                              Entering: "transition ease-out duration-100"--}}
{{--                                                From: "transform opacity-0 scale-95"--}}
{{--                                                To: "transform opacity-100 scale-100"--}}
{{--                                              Leaving: "transition ease-in duration-75"--}}
{{--                                                From: "transform opacity-100 scale-100"--}}
{{--                                                To: "transform opacity-0 scale-95"--}}
{{--                                            -->--}}
{{--                                            <div--}}
{{--                                                class="origin-top-right absolute right-0 mt-2 w-full rounded-md shadow-lg">--}}
{{--                                                <div class="rounded-md bg-white shadow-xs">--}}
{{--                                                    <div class="py-1" role="menu" aria-orientation="vertical"--}}
{{--                                                         aria-labelledby="options-menu">--}}
{{--                                                        <a href="#"--}}
{{--                                                           class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900"--}}
{{--                                                           role="menuitem">Account settings</a>--}}
{{--                                                        <a href="#"--}}
{{--                                                           class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900"--}}
{{--                                                           role="menuitem">Support</a>--}}
{{--                                                        <a href="#"--}}
{{--                                                           class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900"--}}
{{--                                                           role="menuitem">License</a>--}}
{{--                                                        <form method="POST" action="#">--}}
{{--                                                            <button type="submit"--}}
{{--                                                                    class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900"--}}
{{--                                                                    role="menuitem">--}}
{{--                                                                Sign out--}}
{{--                                                            </button>--}}
{{--                                                        </form>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="max-w-lg rounded-md shadow-sm">
                                            <select id="student_id" name="student_id" wire:model="student_id" autofocus
                                                    wire:change="getExamResults"
                                                    class="block form-select w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                                <option value="">Seçiniz</option>
                                                @foreach($students as $key=>$student)
                                                    <option value="{{$key}}">{{$student}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('student_id')
                                        <p class="mt-2 text-xs text-red-500">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div
                                    class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="exam_id"
                                           class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                        Sınav
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <div class="max-w-lg rounded-md shadow-sm">
                                            <select id="exam_id" name="exam_id" wire:model="exam_id"
                                                    wire:change="getExamResults"
                                                    class="block form-select w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                                <option value="">Seçiniz</option>
                                                @foreach($exams as $key=>$exam)
                                                    <option value="{{$key}}">{{$exam}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('exam_id')
                                        <p class="mt-2 text-xs text-red-500">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div
                                    class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="lesson_id"
                                           class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                        Ders
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <div class="max-w-lg rounded-md shadow-sm">
                                            <select id="lesson_id" name="lesson_id" wire:model="lesson_id"
                                                    wire:change="getExamPoints"
                                                    class="block form-select w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                                <option value="">Seçiniz</option>
                                                @foreach($lessons as $key=>$lesson)
                                                    <option value="{{$key}}">{{$lesson}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('lesson_id')
                                        <p class="mt-2 text-xs text-red-500">{{$message}}</p>
                                        @enderror

                                        <div class="flex items-center mt-2">
                                            <input id="remember_me" type="checkbox" wire:model="sub_title"
                                                   class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                            <label for="remember_me" class="ml-2 block text-xs leading-5 text-gray-900">
                                                Bu ders için alt konu başlıklarını da kaydet ?
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-6 sm:mt-5">
                                    <div
                                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label for="true"
                                               class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                            Doğru
                                        </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <div class="max-w-lg flex rounded-md shadow-sm">
                                                <input id="true" name="true" wire:model.lazy="true" type="number" autocomplete="off"
                                                       class="flex-1 form-input block w-full min-w-0 rounded-none rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                            </div>
                                            <p class="mt-2 text-xs text-gray-500">Boş bırakıldığında "sıfır doğru"
                                                olarak kayıt
                                                edilir.</p>
                                            @error('true')
                                            <p class="mt-2 text-xs text-gray-500">{{$message}}</p>
                                            @enderror

                                        </div>
                                    </div>


                                </div>
                                <div class="mt-6 sm:mt-5">
                                    <div
                                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label for="false"
                                               class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                            Yanlış
                                        </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <div class="max-w-lg flex rounded-md shadow-sm">
                                                <input id="false" name="false" wire:model.lazy="false" type="number" autocomplete="off"
                                                       class="flex-1 form-input block w-full min-w-0 rounded-none rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                            </div>
                                            <p class="mt-2 text-xs text-gray-500">Boş bırakıldığında "sıfır yanlış"
                                                olarak kayıt
                                                edilir.</p>
                                            @error('false')
                                            <p class="mt-2 text-xs text-gray-500">{{$message}}</p>
                                            @enderror

                                        </div>
                                    </div>


                                </div>
                                <div class="mt-6 sm:mt-5">
                                    <div
                                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label for="empty"
                                               class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                            Boş
                                        </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <div class="max-w-lg flex rounded-md shadow-sm">
                                                <input id="empty" name="empty" wire:model.lazy="empty" type="number" autocomplete="off"
                                                       class="flex-1 form-input block w-full min-w-0 rounded-none rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                            </div>
                                            <p class="mt-2 text-xs text-gray-500">Boş bırakıldığında "sıfır boş" olarak
                                                kayıt
                                                edilir.</p>
                                            @error('empty')
                                            <p class="mt-2 text-xs text-gray-500">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>

                        <div class="mt-8 border-t border-gray-200 pt-5 flex justify-between xl:items-center">
                            <div class="block xl:flex">
                                @foreach($lessons as $key=>$lesson)
                                    @if(count($exam_results) > 0)
                                        <span class="ml-4 text-sm bg-gray-100 p-2 rounded-md flex items-center">
                                            @if(in_array($key, $exam_results))
                                                <span class="text-green-400"><svg xmlns="http://www.w3.org/2000/svg"
                                                                                  fill="none"
                                                                                  viewBox="0 0 24 24"
                                                                                  stroke="currentColor" class="h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg></span>
                                            @else
                                                <span class="text-red-400"><svg xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none"
                                                                                class="h-4" viewBox="0 0 24 24"
                                                                                stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></span>
                                            @endif

                                            <span class="ml-2">{{$lesson}}</span>
                                        </span>
                                    @endif
                                @endforeach
                            </div>
                            <div>
                                @if(in_array($lesson_id, $exam_results))
                                    <span class="ml-3 inline-flex rounded-md shadow-sm">
        <button type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
Güncelle
        </button>
      </span>

                                @else
                                    <span class="ml-3 inline-flex rounded-md shadow-sm">
        <button type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
          Kaydet
        </button>
      </span>
                                @endif
                            </div>
                        </div>
                    </dd>

                </form>
                {{--        <livewire:sub-result :subTitle="$lesson_sub_titles" :lessons="$lessons" :lessonId="$lesson_id" :examId="$exam_result_id" :activeTab="$activeTab" />--}}
                @if($activeTab == 2)
                    <form wire:submit.prevent="saveSubResult(Object.fromEntries(new FormData($event.target)))"
                          class="{{ ($activeTab == 2) ? 'block' : 'hidden'}}">
                        <div class="mt-6 bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
                            <div class="md:grid md:grid-cols-3 md:gap-6">
                                <div class="md:col-span-1">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">{{isset($lesson_id) ? $lessons[$lesson_id] : ''}}
                                        alt konu başlıklarını seç</h3>
                                    <p class="mt-1 text-sm leading-5 text-gray-500">
                                        Sonucunu girmek istemediğiniz alt başlıkları boş bırakabilirsiniz.
                                    </p>
                                </div>
                                <div class="mt-5 md:mt-0 md:col-span-2">

                                    @foreach($lesson_sub_titles as $key=>$sub_title)
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-6 lg:col-span-4">

                                                <div class="w-full ml-4">
                                                    @if($key == 0)
                                                        <label for="city"
                                                               class="block text-sm font-medium leading-5 text-gray-700">Alt
                                                            konu
                                                            başlığı</label>
                                                    @endif
                                                    <div class="flex justify-start items-center">
                                                        @if(count($saved_sub_titles) > 0)
                                                            @if(!!$update_sub_result && $saved_sub_titles[$key] !== null)
                                                                <button type="button"
                                                                        wire:click.prevent="deleteItem({{$sub_title->id}})">
                                                                    <div class="flex items-center">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             class="h-4 w-4"
                                                                             fill="red"
                                                                             viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round"
                                                                                  stroke-linejoin="round"
                                                                                  stroke-width="2"
                                                                                  d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                                        </svg>
                                                                        <span class="text-xs">Sil</span>
                                                                    </div>
                                                                </button>
                                                            @else
                                                                <div class="h-4 w-4">

                                                                </div>
                                                            @endif
                                                        @endif
                                                        <input id="city" value="{{$sub_title->name}}" readonly
                                                               tabindex="-1"
                                                               class="ml-4 mt-1 form-input bg-gray-100 input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                                        <input type="hidden" value="{{$sub_title->id}}"
                                                               name="sub_title[{{$key}}]">
                                                        @if(count($saved_sub_titles) > 0)
                                                            <input type="hidden"
                                                                   value="{{$saved_sub_titles[$key] !== null ? $saved_sub_titles[$key]->sub_title_id : ''}}"
                                                                   name="sub_result[{{$key}}]">
                                                        @else
                                                            <input type="hidden"

                                                                   name="sub_result[{{$key}}]">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-span-6 sm:col-span-6 lg:col-span-2 flex gap-4">
                                                <div class="col-span-6 sm:col-span-3 lg:col-span-1">
                                                    @if($key == 0)
                                                        <label for="sub_true"
                                                               class="block text-sm font-medium leading-5 text-gray-700">Doğru</label>
                                                    @endif
                                                    @if(count($saved_sub_titles) > 0)
                                                        <input id="sub_true" name="sub_true[{{$key}}]"
                                                               value="{{$saved_sub_titles[$key] !== null ? $saved_sub_titles[$key]->true : ''}}"
                                                               type="number" autocomplete="off"
                                                               class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                                    @else
                                                        <input id="sub_true" name="sub_true[{{$key}}]"
                                                               type="number" autocomplete="off"
                                                               class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                                    @endif
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 lg:col-span-1">
                                                    @if($key == 0)
                                                        <label for="sub_false"
                                                               class="block text-sm font-medium leading-5 text-gray-700">Yanlış</label>
                                                    @endif
                                                    @if(count($saved_sub_titles) > 0)
                                                        <input id="sub_false" name="sub_false[{{$key}}]"
                                                               value="{{$saved_sub_titles[$key] !== null ? $saved_sub_titles[$key]->false : ''}}"
                                                               type="number"
                                                               autocomplete="off"
                                                               class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                                    @else
                                                        <input id="sub_false" name="sub_false[{{$key}}]"
                                                               type="number"
                                                               autocomplete="off"
                                                               class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                                    @endif
                                                </div>
                                                <div class="col-span-6 sm:col-span-3 lg:col-span-1">
                                                    @if($key == 0)
                                                        <label for="sub_empty"
                                                               class="block text-sm font-medium leading-5 text-gray-700">Boş</label>
                                                    @endif
                                                    @if(count($saved_sub_titles) > 0)
                                                        <input id="sub_empty" name="sub_empty[{{$key}}]"
                                                               value="{{$saved_sub_titles[$key] !== null ? $saved_sub_titles[$key]->empty : ''}}"
                                                               type="number"
                                                               autocomplete="off"
                                                               class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                                    @else
                                                        <input id="sub_empty" name="sub_empty[{{$key}}]"
                                                               type="number"
                                                               autocomplete="off"
                                                               class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="px-0 py-3 text-right sm:px-0">
                                        <span class="inline-flex rounded-md shadow-sm">
              <button type="button" wire:click.prevent="$set('activeTab', 1)"
                      class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-gray-600 hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:shadow-outline-gray active:bg-gray-700 transition duration-150 ease-in-out">
                İptal
              </button>
            </span>

                                        <span class="inline-flex rounded-md shadow-sm">
              <button type="submit"
                      class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                Kaydet
              </button>
            </span>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </form>
    @endif
</div>
