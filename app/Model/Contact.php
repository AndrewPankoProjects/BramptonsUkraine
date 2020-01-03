<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // Table name
    protected $table = 'contact_us_issues';

    public $primaryKey = 'Issue_id';

    public $timestamps = true;

}
