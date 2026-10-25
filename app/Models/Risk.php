<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Risk extends Model { protected $fillable=['project_id','reported_by','kind','title','description','severity','status']; }
