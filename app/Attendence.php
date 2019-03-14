<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
	//protected $table = 'attendance';//JODI MODEL ER NAME AND TABLE ER NAME A MIL NA THAKE TAHOLE EBABE DECLARE KORE DILEY HOBE

    protected $fillable = [
        'id', 'employee_id', 'attendence_date','attendence_year', 'attendence', 'edit_date','attendence_month',
    ];
}
