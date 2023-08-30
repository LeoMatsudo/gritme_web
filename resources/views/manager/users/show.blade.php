<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            顧客詳細
        </h2>
    </x-slot>
    <div class="pt-6 pb-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="max-w-2xl mx-auto mt-6">
                    <x-jet-validation-errors class="mb-4" />
                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif


                    <div class="mt-5">
                        <x-jet-label for="user_name" value="名前" />
                        {{ $user->name }}
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="email" value="メールアドレス" />
                        {{ $user->email }}
                    </div>
                    <div class="flex justify-end mt-5 mb-5"> <!-- 横並びのフレックスコンテナ -->
                        <button class="border text-sm border-red-600 text-red-600 py-2 px-6 focus:outline-none hover:bg-red-50 rounded-full">
                            <a href="{{ route('users.delete', ['user' => $user->id]) }}">ユーザー削除</a>
                        </button>
                        <form method="get" action="{{ route('users.edit', ['user' => $user->id ]) }}">
                            <x-jet-button class="ml-4 text-white bg-purple-400 hover:bg-purple-500">
                                編集
                            </x-jet-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>