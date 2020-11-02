<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Employee;

use PDF;

class EmployeeFileController extends Controller
{

    public function __invoke(Employee $employee)
    {

       $pdf = PDF::loadView('employee/employeeFile', compact('employee'));

        return $pdf->download($employee->name . '.pdf');
    }

}
