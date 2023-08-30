<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            予約管理
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                <div class="max-w-2xl mx-auto mt-5">
                    <x-jet-validation-errors class="mb-4" />
                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('events.store') }}">
                        @csrf

                        <div class="mt-5">
                            <x-jet-label for="event_name" value="イベント名" />
                            <x-jet-input id="event_name" class="block mt-1 w-full" type="text" name="event_name" :value="old('event_name')" required autofocus  />
                        </div>
                        <div class="mt-4">
                            <x-jet-label for="information" value="備考" />
                            <x-textarea row="3" id="information" name="information" class="block mt-1 w-full">{{ old('information')}}</x-textarea>
                        </div>
                        <div class="md:flex justify-between">
                            <div class="mt-4">
                                <x-jet-label for="event_date" value="日付" />
                                <x-jet-input id="event_date" class="block mt-1 w-full" type="text" name="event_date" :value="old('event_date')" required autocomplete="current-password" />
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="start_time" value="開始時間" />
                                <x-jet-input id="start_time" class="block mt-1 w-full" type="text" name="start_time" :value="old('start_time')" required />
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="end_time" value="終了時間" />
                                <x-jet-input id="end_time" class="block mt-1 w-full" type="text" name="end_time" :value="old('end_time')" required />
                            </div>
                        </div>
                        <div class="md:flex justify-between items-end mb-5">
                            <div class="mt-4">
                                <x-jet-label for="max_people" value="定員数" />
                                <x-jet-input id="max_people" class="block mt-1 w-full" type="number" name="max_people" :value="old('max_people')" required />
                            </div>
                            <x-jet-button class="ml-4  text-white bg-purple-400 hover:bg-purple-500">
                                新規登録
                            </x-jet-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>