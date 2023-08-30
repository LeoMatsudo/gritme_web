<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            予約一覧
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-5 mx-auto">
                        @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                        @endif
                        <div class="flex justify-end">
                            <button onclick="location.href='{{ route('events.past') }}'" class="text-sm flex mb-5 border border-purple-400 text-purple-500  py-2 px-6 focus:outline-none hover:bg-purple-50 rounded-full">過去イベント</button>
                            <button onclick="location.href='{{ route('events.create') }}'" class="text-sm flex mb-5 text-white bg-purple-400 border-0 py-2 px-6 focus:outline-none hover:bg-purple-500 rounded-full ml-5">新規登録</button>
                        </div>

                        <div class="w-full mx-auto overflow-auto">
                            <table class="table-auto w-full text-left whitespace-no-wrap">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl-lg rounded-bl-lg">イベント名</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">開始日時</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">終了日時</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">予約枠</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">予約人数</th>
                                        <!-- <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">予約者</th> -->
                                        <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr-lg rounded-br-lg"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($events as $event)
                                    <tr>
                                        <td class="text-blue-500 px-4 py-3"><a href="{{ route('events.show', ['event' => $event->id]) }}">{{ $event->name }}</a></td>
                                        <td class="px-4 py-3">{{ $event->start_date }}</td>
                                        <td class="px-4 py-3">{{ $event->end_date }}</td>
                                        <td class="px-4 py-3">{{ $event->max_people }}</td>
                                        <td class="px-4 py-3">
                                            @if (is_null($event->number_of_people))
                                            0
                                            @else
                                            {{ $event->number_of_people }}
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $events->links() }}
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>