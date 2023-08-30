<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
// use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = DB::table('users')
            ->where('role', 9)
            ->where('deleted_at', null)
            ->paginate(10);

        return view('manager.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        User::create([
            'name' => $request['user_name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']), // パスワードをハッシュ化して保存
            'role' => 9
        ]);

        session()->flash('status', '登録が完了しました。');

        return to_route('users.index');
    }

    
    public function show(User $user)
    {
        // $user はユーザーインスタンスとして自動的に注入
        return view('manager.users.show', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        return view('manager.users.edit', compact('User'));
    }


    public function update(UpdateUserRequest $request, User $user)
    {
        $data = [
            'name' => $request->input('user_name'),
            'email' => $request->input('email'),
        ];

        if ($request->has('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }
        $user->update($data);

        session()->flash('status', 'ユーザー情報を更新しました。');
        return redirect()->route('users.index');
    }


    public function delete(User $user)
    {
        return view('manager.users.delete', compact('user'));
    }


    public function destroy(User $user)
    {
        // ユーザーを論理削除
        $user->delete();
        session()->flash('status', 'ユーザーを削除しました。');
        return redirect()->route('users.index');
    }
}