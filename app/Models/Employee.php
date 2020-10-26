<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'image',
        'cpf',
        'rg',
        'date_birth',
        'cellphone',
        'telephone',
        'partner',
        'marital_status',
        'father',
        'mother',
        'naturalness',
        'nationality',
        'office',
        'street',
        'number',
        'district',
        'complement',
        'cep',
        'city',
        'country',
        'salary',
        'admission',
        'resignation',
        'hours',
        'observation',
        'status',
        'user_id'
    ];

    public function employeeDocuments()
    {
        return $this->hasMany(EmployeeDocument::class);
    }

}
