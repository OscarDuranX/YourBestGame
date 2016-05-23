<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comentari extends Model
{
    //protected $table="comentaris";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nomuser', 'comentari'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at','updated_at'
    ];

    public function joc()
    {
        return $this->belongsTo('App\Joc');
    }
}
