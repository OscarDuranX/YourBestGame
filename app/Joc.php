<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 26/04/16
 * Time: 21:49
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Joc extends Model
{
    //protected $table="jocs";

    protected $fillable = ['nom','imatge','URL','categoria'];

    protected $hidden = ['created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comentari()
    {
        return $this->hasMany('App\Comentari');
    }
}