<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    // Table name
    protected $table = 'survey_results';

    public $primaryKey = 'survey_id';

    public $timestamps = false;
}
