<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typeprocess extends Model
{
    /**
     * Define table
     *
     * @var string
     */
    protected $table = "typesprocess";

    /**
     * List of attributes of the table
     *
     * @var array
     */
    protected $fillable = ['name', 'acronym', 'serial'];


    /**
     * Get the radications for the type process.
     */
    public function radications()
    {
        return $this->hasMany('App\Radication');
    }
}
