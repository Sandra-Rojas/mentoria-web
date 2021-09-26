<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    //public $fillable = ['title', 'resumen', 'body'];

    //sin proteger ninguna propiedad
    //public $guarded = [];
    //proteger id
    //public $guarded = ['id'];
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //relation: hasone, hasMany, belongsTo, belongsToMany
    public function category()
    {
        //nombre clase la primera con mayuscula
        return $this->belongsTo(Category::class);
    }   

    //modifica de user a author, laravel supone que en bd el campo es author_id
    //para que no suceda esto, belong tiene como campo opcional paso de llave foranea
    //en este caso user_id 
    public function user()
    {
        //Post pertenece a un usuario
        //return $this->belongsTo(User::class);
        return $this->belongsTo(User::class, 'user_id');
    }   

}
