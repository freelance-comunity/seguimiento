<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'questions';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'type_of_response', 'required', 'number_of_elements', 'poll_id'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function poll()
    {
        return $this->belongsTo('App\Poll');
    }
}
