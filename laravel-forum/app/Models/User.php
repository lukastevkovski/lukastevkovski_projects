<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
    protected $fillable = ['name', 'email', 'username', 'password', 'role'];

    public function discussions() {
        return $this->hasMany(Discussion::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function isAdmin() {
        return $this->role === 'admin';
    }
}