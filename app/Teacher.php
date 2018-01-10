<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'teachers';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'last_name', 'email', 'username', 'password', 'campus_id', 'status_id', 'user_id'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

}
