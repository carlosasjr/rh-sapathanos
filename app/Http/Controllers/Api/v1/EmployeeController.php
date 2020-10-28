<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    /**
     * @var Employee
     */
    private $employee;
    private $totalPage = 10;
    private $path = 'employees';

    public function __construct(Employee $employee)
    {

        $this->employee = $employee;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $employees = $this->employee->
          orderBy('id', 'desc')
        ->paginate($this->totalPage);

        return response()->json($employees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(CreateUpdateEmployeeRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $name = Str::of($request->name)->kebab();
            $extension = $request->file('image')->extension();

            $nameFile = "{$name}.{$extension}";
            $data['image'] = $nameFile;

            $upload = $request->file('image')->storeAs($this->path, $nameFile);

            if (!$upload) {
                return response()->json(['error' => 'Fail upload'], 500);
            }
        }

        $employee = $this->employee->create($data);

        //$employee->employeeDocuments->create();

        return response()->json($employee);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $employee = $this->employee->with('employeeDocuments')->findOrFail($id);

        return response()->json($employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(CreateUpdateEmployeeRequest $request, $id)
    {
        $employee = $this->employee->findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $this->deleteFileExists($employee);

            $name = Str::of($request->name)->kebab();
            $extension = $request->file('image')->extension();

            $nameFile = "{$name}.{$extension}";
            $data['image'] = $nameFile;

            $upload = $request->file('image')->storeAs($this->path, $nameFile);

            if (!$upload) {
                return response()->json(['error' => 'Fail upload'], 500);
            }
        }

        $employee->update($data);

        return response()->json($employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $employee = $this->employee->findOrFail($id);

        $employee->delete();

        return response()->json($employee);
    }


    private function deleteFileExists($employee): void
    {
        if ($employee->image) {

            $file = "$this->path/{$employee->image}";
            if (Storage::exists($file)) {

                Storage::delete($file);
            }
        }
    }
}
