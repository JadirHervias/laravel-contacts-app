<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $fillable = [
        'name',
        'email',
        'address',
        'phone_number'
    ];

    // Query Scopes

    public function scopeId($query, $id) {
        if ($id)
            return $query->orwhere('id', 'LIKE', "%$id%");
    }

    public function scopeName($query, $name) {
        if ($name)
            return $query->orwhere('name', 'LIKE', "%$name%");
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
}
