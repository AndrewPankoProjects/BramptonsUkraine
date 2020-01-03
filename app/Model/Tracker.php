<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracker extends Model
{
    // Table name
    protected $table = 'ingredient_tracker';

    public $primaryKey = 'ingredientTracker_id';

    public $timestamps = false;

}
