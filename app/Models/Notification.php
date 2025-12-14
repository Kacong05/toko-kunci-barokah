<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'message',
        'data',
        'is_read',
        'read_at',
    ];

    protected $casts = [
        'data' => 'array',
        'is_read' => 'boolean',
        'read_at' => 'datetime',
    ];

    // Scope for unread notifications
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    // Scope by type
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    // Mark as read
    public function markAsRead()
    {
        $this->update([
            'is_read' => true,
            'read_at' => now(),
        ]);
    }

    // Get icon based on type
    public function getIconAttribute()
    {
        return match($this->type) {
            'order' => '📦',
            'rating' => '⭐',
            'contact' => '✉️',
            default => '🔔',
        };
    }

    // Get color based on type
    public function getColorAttribute()
    {
        return match($this->type) {
            'order' => 'blue',
            'rating' => 'yellow',
            'contact' => 'green',
            default => 'gray',
        };
    }
}
