<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvanceSalary extends Model
{
    protected $fillable = [
        'employee_id', 'month', 'year','advanced_salary',
    ];
}
