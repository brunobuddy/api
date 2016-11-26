<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $hidden = [
        'source_id',
        'email',
        'phone_number',
        'created_at',
        'updated_at'];
}
