<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Radication extends Model
{
    /**
     * Define table
     *
     * @var string
     */
    protected $table = "radications";

    /**
     * List of attributes of the table
     *
     * @var array
     */
    protected $fillable = ['typeproc_id', 'user_id', 'number', 'shortdescription', 'description', 'filename', 'status'];


    /**
     * Get the type process that owns the radication.
     */

    public function typeprocess()
    {
        return $this->belongsTo('App\Typeprocess', 'typeproc_id');
    }


    /*
     * Get the user that owns the radication.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
