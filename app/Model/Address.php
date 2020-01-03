<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    // Table name
    protected $table = 'address_info';

    public $primaryKey = 'Address_id';

    public $timestamps = false;

}
