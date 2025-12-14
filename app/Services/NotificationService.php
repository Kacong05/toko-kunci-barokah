<?php
// ======================================== 
// 3. SERVICE - NotificationService 
// ======================================== 
// File: app/Services/NotificationService.php 

namespace App\Services; 

use App\Models\Notification; 
use App\Models\Order; 
use App\Models\Rating; 
use App\Models\Contact; 

class NotificationService 
{ 
    /** 
     * Create notification for new order 
     */ 
    public static function createOrderNotification(Order $order) 
    { 
        return Notification::create([ 
            'type' => 'order', 
            'title' => 'Pesanan Baru Masuk', 
            'message' => "Pesanan {$order->jenis_layanan} dari {$order->nama_pemesan}", 
            'data' => [ 
                'order_id' => $order->id, 
                'user_name' => $order->nama_pemesan, 
                'service' => $order->jenis_layanan, 
                'url' => route('admin.orders'), 
            ], 
        ]); 
    } 

    /** 
     * Create notification for new rating 
     */ 
    public static function createRatingNotification(Rating $rating) 
    { 
        return Notification::create([ 
            'type' => 'rating', 
            'title' => 'Rating Baru', 
            'message' => "{$rating->user->name} memberikan rating {$rating->rating} bintang", 
            'data' => [ 
                'rating_id' => $rating->id, 
                'user_name' => $rating->user->name, 
                'rating_value' => $rating->rating, 
                'url' => route('admin.ratings'), 
            ], 
        ]); 
    } 

    /** 
     * Create notification for new contact message 
     */ 
    public static function createContactNotification(Contact $contact) 
    { 
        return Notification::create([ 
            'type' => 'contact', 
            'title' => 'Pesan Kontak Baru', 
            'message' => "Pesan dari {$contact->nama}", 
            'data' => [ 
                'contact_id' => $contact->id, 
                'sender_name' => $contact->nama, 
                'sender_email' => $contact->email, 
                'url' => route('admin.contacts'), 
            ], 
        ]); 
    } 

    /** 
     * Get unread notifications count 
     */ 
    public static function getUnreadCount() 
    { 
        return Notification::unread()->count(); 
    } 

    /** 
     * Get recent notifications 
     */ 
    public static function getRecentNotifications($limit = 5) 
    { 
        return Notification::orderBy('created_at', 'desc') 
            ->limit($limit) 
            ->get(); 
    } 

    /** 
     * Mark all as read 
     */ 
    public static function markAllAsRead() 
    { 
        return Notification::unread()->update([ 
            'is_read' => true, 
            'read_at' => now(), 
        ]); 
    } 

    /** 
     * Delete old read notifications (older than 30 days) 
     */ 
    public static function cleanupOldNotifications() 
    { 
        return Notification::where('is_read', true) 
            ->where('read_at', '<', now()->subDays(30)) 
            ->delete(); 
    } 
}

