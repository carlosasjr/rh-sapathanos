<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Mail\SendMailEmployeer;
use App\Models\Employee;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use ledat\contracheque\Contracheque;
use ledat\contracheque\Vencimento;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class EmployeeEmailControler extends Controller
{
    public function __invoke(Employee $employee)
    {
        $employees = $employee->whereNotNull('email')->get();

        try {
            foreach ($employees as $employee) {
                $cc = Contracheque::create('2020', '11')
                    ->setFuncionario($employee->name, $employee->id, 'Funcionário', 317110, $employee->admission)
                    ->setLeftHeader('SAPATHANOS LTDA', '45.997.418/0001-53')
                    ->addVencimento(new Vencimento(1, 'HORAS NORMAIS', $employee->hours, $employee->salary));


                $template = $cc->asHtml();

                Mail::to($employee->email)
                    ->send(new SendMailEmployeer($template));
            }
        } catch (\Exception $e) {
            $log = new Logger('Nome do log');
            $log->pushHandler(new StreamHandler('logs.log', Logger::WARNING));

            $log->warning('Warning....', [
                    'message' => $e->getMessage()
                ]
            );

        }
    }
}
