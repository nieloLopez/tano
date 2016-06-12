<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model {

    protected $table = 'activities';

    protected $fillable = ['name', 'price'];

    //protected $hidden = ['password', 'remember_token'];
    public function scopeSearch($query, $search)
    {
        if (!empty(trim($search)))
        {
            $query->where(\DB::raw('name'),'LIKE', "%$search%")
                ->orWhere(\DB::raw('price'),'LIKE', "%$search%");
        }
    }
}
