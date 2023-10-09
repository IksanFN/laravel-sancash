<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\FirstWeek;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\Bills\BillStore;
use App\Models\FourthWeek;
use App\Models\Group;
use App\Models\Month;
use App\Models\SecondWeek;
use App\Models\ThirdWeek;
use App\Models\Year;
use RealRashid\SweetAlert\Facades\Alert;

class BillController extends Controller
{
    public function index()
    {
        return view('bills.index');
    }
    
    public function firstWeek()
    {
        return view('bills.first-week');
    }

    public function createAll()
    {
        $years = Year::all();
        $months = Month::all();
        $groups = Student::query()->select('student_group', 'group_id')->distinct()->get();
        return view('bills.create-all', compact('groups', 'years', 'months'));
    }

    public function store(BillStore $request)
    {
        $students = Student::query()->whereGroupId($request->kelas)->get();
        $month = Month::find($request->month);
        $year = Year::find($request->year);

        if ($request->week == 'firstWeek') {

            foreach ($students as $student) {
                
                // Generate kode tagihan
                $unikCodeStudent = substr($student->student_nisn, -4);
                $firstBillCode = "01/".$month->id."/".$year->year."/".Str::upper(str_replace(' ', '', $student->student_group))."/".$unikCodeStudent;
                
                // Cek kode tagihan apakah sudah ada atau belum
                if (FirstWeek::query()->whereBillCode($firstBillCode)->exists()) {
                    Alert::error('Gagal', "Tagihan untuk Pelajar di kelas {$student->student_group} sudah ada!");
                    return to_route('bills.first_week');
                }

                // Simpan ke database
                $firstWeek = FirstWeek::create([
                    'uuid' => Str::uuid(),
                    'student_id' => $student->id,
                    'year_id' => $request->year,
                    'month_id' => $request->month,
                    'bill_code' => $firstBillCode,
                    'student_nisn' => $student->student_nisn,
                    'student_name' => $student->student_name,
                    'student_major' => $student->student_major,
                    'student_group' => $student->student_group,
                    'student_phone' => $student->phone_number,
                    'bill' => $request->bill,
                    'start_of_week' => $request->start_of_date,
                    'end_of_week' => $request->end_of_date,
                    'is_paid' => false,
                ]);

                if ($firstWeek) {
                    Alert::success('Berhasil', "Daftar Tagihan berhasil dibuat!");
                } else {
                    Alert::error("Gagal", "Terjadi kesalahan, pastikan data yang di inputkan sudah benar");
                }
            }

        } else if($request->week == 'secondWeek') {

            foreach ($students as $student) {
                
                // Generate kode tagihan
                $unikCodeStudent = substr($student->student_nisn, -4);
                $secondBillCode = "02/".$month->id."/".$year->year."/".Str::upper(str_replace(' ', '', $student->student_group))."/".$unikCodeStudent;
                
                // Cek kode tagihan apakah sudah ada atau belum
                if (SecondWeek::query()->whereBillCode($secondBillCode)->exists()) {
                    Alert::error('Gagal', "Tagihan untuk Pelajar di kelas {$student->student_group} sudah ada!");
                    return to_route('bills.first_week');
                }

                // Simpan ke database
                $secondWeek = SecondWeek::create([
                    'uuid' => Str::uuid(),
                    'student_id' => $student->id,
                    'year_id' => $request->year,
                    'month_id' => $request->month,
                    'bill_code' => $secondBillCode,
                    'student_nisn' => $student->student_nisn,
                    'student_name' => $student->student_name,
                    'student_major' => $student->student_major,
                    'student_group' => $student->student_group,
                    'student_phone' => $student->phone_number,
                    'bill' => $request->bill,
                    'start_of_week' => $request->start_of_date,
                    'end_of_week' => $request->end_of_date,
                    'is_paid' => false,
                ]);

                if ($secondWeek) {
                    Alert::success('Berhasil', "Daftar Tagihan berhasil dibuat!");
                } else {
                    Alert::error("Gagal", "Terjadi kesalahan, pastikan data yang di inputkan sudah benar");
                }
            }

        } else if($request->week == 'thirdWeek') {

            foreach ($students as $student) {
                
                // Generate kode tagihan
                $unikCodeStudent = substr($student->student_nisn, -4);
                $thirdBillCode = "03/".$month->id."/".$year->year."/".Str::upper(str_replace(' ', '', $student->student_group))."/".$unikCodeStudent;
                
                // Cek kode tagihan apakah sudah ada atau belum
                if (ThirdWeek::query()->whereBillCode($thirdBillCode)->exists()) {
                    Alert::error('Gagal', "Tagihan untuk Pelajar di kelas {$student->student_group} sudah ada!");
                    return to_route('bills.first_week');
                }

                // Simpan ke database
                $thirdWeek = ThirdWeek::create([
                    'uuid' => Str::uuid(),
                    'student_id' => $student->id,
                    'year_id' => $request->year,
                    'month_id' => $request->month,
                    'bill_code' => $thirdBillCode,
                    'student_nisn' => $student->student_nisn,
                    'student_name' => $student->student_name,
                    'student_major' => $student->student_major,
                    'student_group' => $student->student_group,
                    'student_phone' => $student->phone_number,
                    'bill' => $request->bill,
                    'start_of_week' => $request->start_of_date,
                    'end_of_week' => $request->end_of_date,
                    'is_paid' => false,
                ]);

                if ($thirdWeek) {
                    Alert::success('Berhasil', "Daftar Tagihan berhasil dibuat!");
                } else {
                    Alert::error("Gagal", "Terjadi kesalahan, pastikan data yang di inputkan sudah benar");
                }
            }

        } else {

            foreach ($students as $student) {
                
                // Generate kode tagihan
                $unikCodeStudent = substr($student->student_nisn, -4);
                $fourthBillCode = "01/".$month->id."/".$year->year."/".Str::upper(str_replace(' ', '', $student->student_group))."/".$unikCodeStudent;
                
                // Cek kode tagihan apakah sudah ada atau belum
                if (FourthWeek::query()->whereBillCode($fourthBillCode)->exists()) {
                    Alert::error('Gagal', "Tagihan untuk Pelajar di kelas {$student->student_group} sudah ada!");
                    return to_route('bills.first_week');
                }

                // Simpan ke database
                $fourthWeek = FourthWeek::create([
                    'uuid' => Str::uuid(),
                    'student_id' => $student->id,
                    'year_id' => $request->year,
                    'month_id' => $request->month,
                    'bill_code' => $fourthBillCode,
                    'student_nisn' => $student->student_nisn,
                    'student_name' => $student->student_name,
                    'student_major' => $student->student_major,
                    'student_group' => $student->student_group,
                    'student_phone' => $student->phone_number,
                    'bill' => $request->bill,
                    'start_of_week' => $request->start_of_date,
                    'end_of_week' => $request->end_of_date,
                    'is_paid' => false,
                ]);

                if ($fourthWeek) {
                    Alert::success('Berhasil', "Daftar Tagihan berhasil dibuat!");
                } else {
                    Alert::error("Gagal", "Terjadi kesalahan, pastikan data yang di inputkan sudah benar");
                }
            }

        }

        return to_route('bills.index');
    }

}
