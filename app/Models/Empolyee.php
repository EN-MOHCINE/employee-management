<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department; // Ensure the correct namespace for the User model


class Empolyee extends Model
{
    use HasFactory;
    protected $table = 'employees';

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'department_employee', 'employee_id', 'department_id');
    }
}