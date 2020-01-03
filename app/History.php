<?php
namespace App;

//use Illuminate\Notifications\Notifiable;
//use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Foundation\Auth\User as Authenticatable;

class History
{
    use Notifiable;

    public $primaryKey = 'Current_order_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Order_total', 'username', 'Order_status', 'Perogies', 'BeetSoup', 'CabbageRolls', 'tracker_id'
    ];
}
