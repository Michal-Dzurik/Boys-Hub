<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class Post extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'heading',
        'text',
        'user_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tags(){
        return $this->hasMany(Tag::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return date('j M Y, G:i',strtotime($value));
    }

    public function getTeaserAttribute(){
        return str_limit( $this->text, 100 );
    }

    public function getRichTextAttribute(){
        return e(filter_var($this->text));
    }
}
