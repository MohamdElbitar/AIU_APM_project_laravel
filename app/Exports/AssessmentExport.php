<?php

namespace App\Exports;

use App\Models\OutcomeEffort;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

// use Maatwebsite\Excel\Concerns\WithHeadings;


class AssessmentExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return OutcomeEffort::all();
    }

    public function headings(): array
    {
        // Define the column labels for the Excel sheet
        return [
        'Id',
         'OutCome Id',
        'Course offering ID',
        'Program Name',
        'Course Code',
        'Semester',
        'Year',
        'Abet code',
        'Dgree By p%',
        'Dgree By AVG',
        ];
    }
}
