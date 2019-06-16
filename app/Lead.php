<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'value', 'project_id', 'contact_id', 'user_id',
    ];

    /**
     * Get the project record associated with the lead.
     */
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    
    /**
     * Get the contact record associated with the lead.
     */
    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }

    
}
