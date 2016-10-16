<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
  use SoftDeletes;

  /**
  * The table associated with the model.
  *
  * @var string
  */
  protected $table = 'todo_list';

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = ['todo'];

  /**
  * The attributes that should be mutated to dates.
  *
  * @var array
  */
  protected $dates = ['deleted_at'];

  /**
  * Get the user that owns the todo.
  */
  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
