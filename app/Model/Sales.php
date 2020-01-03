<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    // Table name
    protected $table = 'current_order';

    public $primaryKey = 'Current_order_id';

    public $timestamps = true;
}
