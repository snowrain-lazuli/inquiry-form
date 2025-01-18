<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['content'];

    public function contact()
    {
        return $this->hasMany('App\Models\Contact');
    }
}