<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\User;
// use App\Models\User;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'address',
        'photo_url',
        'phone_number',
        'birth_date',
        'owner_id'
    ];

    // Relations
    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    // Query Scopes
    public function scopeId($query, $id) {
        if ($id)
            return $query->orwhere('id', 'LIKE', "%$id%");
    }

    public function scopeName($query, $name) {
        if ($name)
            return $query->orwhere('name', 'LIKE', "%$name%");
    }

    public function scopeLastName($query, $lastName) {
        if ($lastName)
            return $query->orwhere('last_name', 'LIKE', "%$lastName%");
    }

    public function scopeEmail($query, $email) {
        if ($email)
            return $query->orwhere('email', 'LIKE', "%$email%");
    }

    public function scopeAddress($query, $address) {
        if ($address)
            return $query->orwhere('address', 'LIKE', "%$address%");
    }

    public function scopePhoneNumber($query, $phoneNumber) {
        if ($phoneNumber)
            return $query->orwhere('phone_number', 'LIKE', "%$phoneNumber%");
    }

    public function scopeOwnerId($query, $ownerId) {
        if ($ownerId)
            return $query->where('owner_id', 'LIKE', "%$ownerId%");
    }
}
