<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;

class Review extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'id_buyer', 'id_shopper','rating','comment','created_at','updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token'
    ];

    public static function reviewUser($id_user,$rating){

        Review::insert(
            ['id_buyer' => $id_user, 'rating' => $rating]
        );
    }
}
