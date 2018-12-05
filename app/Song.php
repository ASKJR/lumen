<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'singer_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function singer()
    {
        return $this->belongsTo('App\Singer');
    }

    public function scopeBySinger($query, $singer_id)
    {
        return $query->where('singer_id', $singer_id);
    }
}
