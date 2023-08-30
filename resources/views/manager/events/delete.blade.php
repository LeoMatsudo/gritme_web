<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            アカウント削除
        </h2>
    </x-slot>
    <div class="pt-6 pb-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                <div class="max-w-2xl mx-auto mt-5">
                    <div class="text-lg font-semibold">予約枠を削除しますか？</div>


                    <div class="max-w-2xl mx-auto mt-5">
                        <x-jet-validation-errors class="mb-4" />
                        @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form method="post" action="{{ route('events.destroy', ['event' => $event->id ]) }}">
                            @csrf
                            @method('delete')
                            <div class="mt-5">
                                <x-jet-label for="event_name" value="イベント名" />
                                {{ $event->name }}
                            </div>
                            <div class="mt-4">
                                <x-jet-label for="information" value="備考" />
                                {{ $event->information }}
                            </div>
                            <div class="md:flex justify-between">
                                <div class="mt-4">
                                    <x-jet-label for="event_date" value="日付" />
                                    {{ $event->event_date }}
                                </div>

                                <div class="mt-4">
                                    <x-jet-label for="start_time" value="開始時間" />
                                    {{ $event->start_time }}
                                </div>

                                <div class="mt-4">
                                    <x-jet-label for="end_time" value="終了時間" />
                                    {{ $event->end_time }}
                                </div>
                            </div>
                            <div class="md:flex justify-between items-end mb-5">
                                <div class="mt-4">
                                    <x-jet-label for="max_people" value="定員数" />
                                    {{ $event->max_people }}
                                </div>
                            </div>
                            <div class="mt-5 mb-5 text-right"> <!-- text-rightを追加 -->
                                <button class="text-sm text-red-600 bg-white hover:bg-red-50  border border-red-600 py-2 px-6 rounded-full">
                                    削除する
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


</x-app-layout>