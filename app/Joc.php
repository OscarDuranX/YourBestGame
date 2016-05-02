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
    protected $table='jocs';

    protected $fillable = ['user_id','nom','imatge','URL','categoria'];

    protected $hidden = ['updated_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}