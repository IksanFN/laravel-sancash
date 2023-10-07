<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\Users\UserStore;
use App\Http\Requests\Users\UserUpdate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserStore $request)
    {
        // return dd($request->all());
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatar->storeAs('public/avatar', $avatar->hashName());

            User::create([
                'uuid' => Str::uuid(),
                'avatar' => $avatar->hashName(),
                'nisn' => $request->nisn,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'position' => $request->position,
                'is_active' => true,
            ]);
        } else {
            User::create([
                'uuid' => Str::uuid(),
                'nisn' => $request->nisn,
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'position' => $request->position,
                'is_active' => true,
            ]);
        }

        Alert::success('Berhasil', 'User berhasil di tambahkan!');

        return to_route('users.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UserUpdate $request, User $user)
    {
        // Cek jika ada file yang di upload
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatar->storeAs('public/avatar', $avatar->hashName());

            // Hapus file lama 
            Storage::delete('storage/public/'.$user->avatar);

            $user->update([
                'avatar' => $avatar->hashName(),
                'nisn' => $request->nisn,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'position' => $request->position,
                'is_active' => true,
            ]);
        } else {
            $user->update([
                'nisn' => $request->nisn,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'position' => $request->position,
                'is_active' => true,
            ]);
        }

        Alert::success('Berhasil', 'Data user berhasil diupdate!');

        return to_route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        Alert::success('Berhasil', 'Data user berhasil dihapus!');

        return to_route('users.index');
    }
}
