<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDocument extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'file'];


    public function employee ()
    {
        return $this->belongsTo(Employee::class);
    }
}
