<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\Major;
use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\Students\StudentStore;
use App\Http\Requests\Students\StudentUpdate;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
    public function index()
    {
        return view('students.index');
    }

    public function create()
    {
        $users = User::query()->wherePosition('student')->get();
        $majors = Major::query()->get();
        $groups = Group::query()->get();
        return view('students.create', compact('users', 'majors', 'groups'));
    }

    public function store(StudentStore $request)
    {
        // Get Data By ID
        $user = User::find($request->user_id);
        $major = Major::find($request->major_id);
        $group = Group::find($request->group_id);

        // Mapping Student
        $mappingStudent = Student::create([
            'uuid' => Str::uuid(),
            'user_id' => $user->id,
            'major_id' => $major->id,
            'group_id' => $group->id,
            'student_avatar' => $user->avatar,
            'student_nisn' => $user->nisn,
            'student_name' => $user->name,
            'student_major' => $major->name,
            'student_group' => $group->name,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'is_active' => true,
            'address' => $request->address,
        ]);

        if ($mappingStudent) {
            Alert::success('Berhasil', 'Mapping Pelajar berhasil!');
            return to_route('students.index');
        } else {
            Alert::error('Gagal!', 'Mapping Pelajar gagal di simpan!');
            return to_route('students.index');
        }
    }

    public function show(Student $student)
    {
        //
    }

    public function edit(Student $student)
    {
        $users = User::query()->wherePosition('student')->get();
        $majors = Major::query()->get();
        $groups = Group::query()->get();
        return view('students.edit', compact('student', 'users', 'majors', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentUpdate $request, Student $student)
    {
        $user = User::find($request->user_id);
        $major = Major::find($request->major_id);
        $group = Group::find($request->group_id);

        $student->update([
            'user_id' => $user->id,
            'major_id' => $major->id,
            'group_id' => $group->id,
            'student_avatar' => $user->avatar,
            'student_nisn' => $user->nisn,
            'student_name' => $user->name,
            'student_major' => $major->name,
            'student_group' => $group->name,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'is_active' => true,
            'address' => $request->address,
        ]);

        Alert::success('Berhasil!', 'Data Pelajar berhasil di update!');
        return to_route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        Alert::success('Berhasil!', 'Data Pelajar berhasil dihapus!');
        return back();
    }
}
