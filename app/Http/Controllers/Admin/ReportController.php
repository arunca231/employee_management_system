<?php

namespace App\Http\Controllers\Admin;

use App\Exports\EmployeeExport;
use App\Http\Controllers\Controller;
use App\Models\Employ_tbl;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function employ_filter(Request $request){

        $department=$request->department;
        $date_from=$request->date_from;
        $date_to=$request->date_to;

        $query=Employ_tbl::query();
        if($department!=''){
            $query->where('department',$department);
        }
        if($date_from!=''){
            $query->where('joining_date', '>=',$date_from);
        }
        if($date_to!=''){
            $query->where('joining_date', '<=',$date_to);
        }
        $data=$query->get();

        return response()->json([
        'status' => true,
        'data' => $data,
        ]);
    }
    public function excel_export(Request $request){

        $department = $request->query('export_department');
        $date_from = $request->query('export_date_from');
        $date_to = $request->query('export_date_to');

        return Excel::download(new EmployeeExport($department, $date_from, $date_to), 'employees.xlsx');
    }
}
