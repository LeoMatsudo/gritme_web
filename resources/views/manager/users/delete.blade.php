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
                    <div class="text-lg font-semibold">アカウントを削除しますか？</div>
                
                    

                    <x-jet-validation-errors class="mb-4" />
                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="post" action="{{ route('users.destroy', ['user' => $user->id ]) }}">
                        @csrf
                        @method('delete')

                        <div class="mt-5">
                            <x-jet-label for="user_name" value="名前" />
                            {{ $user->name }}
                        </div>
                        <div class="mt-4">
                            <x-jet-label for="email" value="メールアドレス" />
                            {{ $user->email }}
                        </div>


                        <div class="mt-5 mb-5 text-right"> <!-- text-rightを追加 -->
                            <button class="text-red-600 bg-white hover:bg-red-50  border border-red-600 py-2 px-6 rounded-full">
                                削除する
                            </button>
                        </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>