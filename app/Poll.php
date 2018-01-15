<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Poll extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'polls';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'type', 'description', 'initial_message', 'final_message'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function questions()
    {
        return $this->hasMany('App\Question');
    }
}
