<?php

namespace App\Exports;

use App\Models\Employ_tbl;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeeExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $department, $date_from, $date_to;
    public function __construct($department = null, $date_from = null, $date_to = null)
    {
        $this->department = $department;
        $this->date_from = $date_from;
        $this->date_to = $date_to;
    }
    public function collection()
    {
        $query = Employ_tbl::query();

        if ($this->department) {
            $query->where('department', $this->department);
        }
        if ($this->date_from) {
            $query->where('joining_date', '>=', $this->date_from);
        }
        if ($this->date_to) {
            $query->where('joining_date', '<=', $this->date_to);
        }

        $data= $query->select('name', 'email', 'department', 'salary', 'joining_date')->get();

        $totalSalary = $data->sum('salary');
        $data->push([
            '', '', 'Total', $totalSalary, ''
        ]);
        return $data;
    }

    public function headings(): array
    {
        return ['Name', 'Email', 'Department', 'Salary', 'Joining Date'];
    }
}

