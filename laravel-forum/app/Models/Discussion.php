<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model {
    protected $fillable = ['title', 'picture', 'description', 'is_approved', 'user_id', 'category_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}