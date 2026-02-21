<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class Ticket extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    protected $fillable = ['customer_id', 'subject', 'message', 'status', 'responded_at'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function scopeLastDay(Builder $query): Builder
    {
        return $query->where('created_at', '>=', Carbon::now()->subDay());
    }

    public function scopeLastWeek(Builder $query): Builder
    {
        return $query->where('created_at', '>=', Carbon::now()->subWeek());
    }

    public function scopeLastMonth(Builder $query): Builder
    {
        return $query->where('created_at', '>=', Carbon::now()->subMonth());
    }
}
