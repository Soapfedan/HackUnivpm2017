<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
class Userrequest extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'id_buyer', 'id_order'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token'
    ];

    public static function extractRequests($id){
    	return Userrequest::where('id_order',$id )->get();
    }

    public static function createRequest($id_order,$id_buyer){
    	Userrequest::insert(['id_order'=>$id_order,'id_buyer'=>$id_buyer]);
    }

    public static function deleteAllRequests($id_ord){
        Userrequest::where('id_order',$id_ord)->delete();
    }
}
