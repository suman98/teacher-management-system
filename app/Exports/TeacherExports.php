<?php

namespace App\Exports;

use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class TeacherExports implements FromCollection,WithHeadings
{
    public function collection()
    {
        return Teacher::select('teachers.name','teachers.gender','teachers.phone_number','teachers.email','teachers.address','nationalities.name as nations','faculties.name as faculty')->leftjoin('nationalities','nationalities.id','=','teachers.nationality')
			->leftjoin('faculties','faculties.id','=','teachers.faculty_id')
			->get();
    }
    public function headings(): array
    {
        $heading = ['Teacher Name','Gender','Phone Number','Email','Address','Nation','Faculty'];

        return $heading;
    }
}