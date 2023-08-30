<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            顧客一覧
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-lg">
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-5 mx-auto">
                    <button onclick="location.href='{{ route('users.create')}}'" class="text-sm flex mb-5 ml-auto text-white bg-purple-400 border-0 py-2 px-6 focus:outline-none hover:bg-purple-500 rounded-full">新規登録</button>
                        <div class="w-full mx-auto overflow-auto">
                            <table class="table-auto w-full text-left whitespace-no-wrap">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl-lg rounded-bl-lg">id</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">名前</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr-lg rounded-br-lg">メールアドレス</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td class="px-4 py-3">{{ $user->id }}</td>
                                        <td class="text-blue-500 px-4 py-3"><a href="{{ route('users.show', ['user' => $user->id]) }}">{{ $user->name }}</a></td>
                                        <td class="px-4 py-3">{{ $user->email }}</td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                        <!-- <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
                            <button onclick="location.href='{{ route('users.create')}}'" class="flex ml-auto text-white bg-purple-400 border-0 py-2 px-6 focus:outline-none hover:bg-purple-500 rounded">新規登録</button>
                        </div> -->
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>