<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Task extends Model { protected $fillable=['project_id','assignee_id','title','description','priority','status','due_date']; protected $casts=['due_date'=>'date']; public function user(){return $this->belongsTo(User::class);} public function assignee(){return $this->belongsTo(User::class,'assignee_id');} }
