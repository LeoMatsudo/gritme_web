<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            イベント詳細
        </h2>
    </x-slot>

    <div class="pt-6 pb-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                <div class="max-w-2xl mx-auto mt-5">
                    <x-jet-validation-errors class="mb-4" />
                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif


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
                    <div class="flex justify-end mt-5 mb-5">
                        <button class="border text-sm border-red-600 text-red-600 py-2 px-6 focus:outline-none hover:bg-red-50 rounded-full" onclick="window.location.href = '{{ route('events.delete', ['event' => $event->id]) }}'">削除</button>


                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="max-w-2xl py-4 mx-auto">
                    <div class="text-center py-4">予約状況</div>

                    <table class="table-auto w-full text-left whitespace-no-wrap">
                        <thead>
                            <tr>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl-lg rounded-bl-lg">予約者名</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr-lg rounded-br-lg">予約人数</th>
                            </tr>
                        </thead>
                        @if (!$users->isEmpty())
                        <tbody>
                            @foreach ($reservations as $reservation )
                            @if(is_null($reservation['canceled_date']))
                            <tr>
                                <td class="px-4 py-3">{{ $reservation['name']}}</td>
                                <td class="px-4 py-3">{{ $reservation['number_of_people']}}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>