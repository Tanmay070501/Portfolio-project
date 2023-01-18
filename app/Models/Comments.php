<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = ['body','diary_id','comment_user_id'];
    public function diary(){
        return $this->belongsTo(Diary::class,'diary_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'comment_user_id','id');
    }
}
