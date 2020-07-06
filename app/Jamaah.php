<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jamaah extends Model
{
    protected $primaryKey = 'id_jamaah';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_jamaah','nama_jamaah', 'telpon_jamaah', 'gender'];
}
