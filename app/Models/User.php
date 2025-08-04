<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
     
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
 protected $table = 'regis'; // pastikan nama tabelnya BENAR (tanpa typo!)
    protected $primaryKey = 'id'; // ini opsional, default-nya memang 'id'

    public $timestamps = false; // jika tabel tidak punya created_at dan updated_at

    protected $fillable = ['name', 'email', 'telepon', 'name_bisnis', 'address'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
