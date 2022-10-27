<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        try {
            $this->authorize('update', $user);
        } catch (AuthorizationException $authorizationException) {
            $result = '对不起，你无权访问此页面！';

            return view("errors.403", compact('result'));
        }

        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, ImageUploadHandler $uploadHandler, User $user)
    {
        $this->authorize('update', $user);

        $data = $request->all();
        if ($request->file('avatar')) {
            $result = $uploadHandler->save($request->file('avatar'), 'avatars', $user['id'], 416);
            if ($result) {
                $data['avatar'] = $result['path'];
            }
        }

        $user->update($data);
        return redirect()->route('users.show', $user['id'])->with('success', '个人资料更新成功！');
    }
}
