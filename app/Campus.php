<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campus extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'campuses';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function careers()
    {
        return $this->hasMany('App\Career');
    }

    public function groups()
    {
        return $this->hasMany('App\Group');
    }
}
