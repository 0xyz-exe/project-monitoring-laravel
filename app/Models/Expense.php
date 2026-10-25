<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Expense extends Model { protected $fillable=['project_id','recorded_by','description','amount','spent_at']; }
