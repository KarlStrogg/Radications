<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Define table
     *
     * @var string
     */
    protected $table = "roles";

    /**
     * List of attributes of the table
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get the users for the role.
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
