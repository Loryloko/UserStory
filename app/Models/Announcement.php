<?php

namespace App\Models; // 🟢 Controlla che il namespace sia corretto

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model // 🟢 Il nome deve essere identico
{
    protected $fillable = ['title', 'price', 'description', 'category_id', 'user_id'];
}
