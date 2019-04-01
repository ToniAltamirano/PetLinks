<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patron extends Model {
    protected $table = 'macropadrins';
    protected $primaryKey = 'id';
    public $incrementing = 'true';
    protected $keyType = 'int';
    public $timestamps = false;
}
