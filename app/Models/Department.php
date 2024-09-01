<?php

namespace App\Models;
use App\Models\User;
use App\Models\Empolyee; // Ensure the correct namespace for the User model


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['department_name', 'manager_id'];


    public function user()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function employees()
    {
        return $this->belongsToMany(Empolyee::class, 'department_employee', 'department_id', 'employee_id');
    }
}
