<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            顧客新規登録
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              

                <div class="max-w-2xl py-4 mx-auto">
                    <x-jet-validation-errors class="mb-4" />

                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf

                        <div class="mt-5">
                            <x-jet-label for="user_name" value="名前" />
                            <x-jet-input id="user_name" class="block mt-1 w-full" type="text" name="user_name" :value="old('user_name')" required autofocus />
                        </div>

                        <div class="mt-5">
                            <x-jet-label for="email" value="メールアドレス" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required />
                        </div>

                        <div class="mt-5">
                            <x-jet-label for="password" value="パスワード" />
                            <x-jet-input id="password" class="block mt-1 w-full" type="text" name="password" :value="old('')" required />
                        </div>
                        <div class="mt-5 mb-5 text-right"> <!-- text-rightを追加 -->
                            <x-jet-button class="text-white bg-purple-400 hover:bg-purple-500 py-2 px-6">
                                新規登録
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>