<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Project extends Model { protected $fillable=['owner_id','name','description','status','planned_start','planned_end','budget']; protected $casts=['planned_start'=>'date','planned_end'=>'date','budget'=>'decimal:2']; public function members(){return $this->belongsToMany(User::class)->withPivot('role');} public function tasks(){return $this->hasMany(Task::class);} public function milestones(){return $this->hasMany(Milestone::class);} public function expenses(){return $this->hasMany(Expense::class);} public function risks(){return $this->hasMany(Risk::class);} public function activities(){return $this->hasMany(ActivityLog::class);} }
