<?php
namespace App;
//use Illuminate\Notifications\Notifiable;
//use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Foundation\Auth\User as Authenticatable;

class Issues
{
    use Notifiable;

    public $primaryKey = 'Issue_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Issue_subject', 'Issue_message', 'created_at', 'Issue_email'
    ];
}
