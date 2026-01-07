<?php

namespace App\Http\Controllers\Admin;

use App\Exports\EnrollmentsExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function enrollments()
    {
        $filename = 'matriculas_' . now()->format('Ymd_His') . '.xlsx';
        return Excel::download(new EnrollmentsExport, $filename);
    }
}
