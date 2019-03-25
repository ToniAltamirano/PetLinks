<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model {
    protected $table = 'campañas';
    protected $primaryKey = 'id';
    public $incrementing = 'true';
    protected $keyType = 'int';
}
