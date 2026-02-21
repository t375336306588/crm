<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    protected $fillable = ['customer_id', 'subject', 'message', 'status', 'responded_at'];

    // Связь с клиентом
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
