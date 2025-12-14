<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Services\NotificationService;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Get notifications for dropdown
     */
    public function index()
    {
        $notifications = NotificationService::getRecentNotifications(10);
        $unreadCount = NotificationService::getUnreadCount();

        return response()->json([
            'notifications' => $notifications,
            'unread_count' => $unreadCount,
        ]);
    }

    /**
     * Mark notification as read
     */
    public function markAsRead(Notification $notification)
    {
        $notification->markAsRead();

        return response()->json([
            'success' => true,
            'message' => 'Notifikasi ditandai sudah dibaca',
        ]);
    }

    /**
     * Mark all as read
     */
    public function markAllAsRead()
    {
        NotificationService::markAllAsRead();

        return back()->with('success', 'Semua notifikasi ditandai sudah dibaca');
    }

    /**
     * Delete notification
     */
    public function destroy(Notification $notification)
    {
        $notification->delete();

        return back()->with('success', 'Notifikasi berhasil dihapus');
    }

    /**
     * Get unread count (for polling)
     */
    public function getUnreadCount()
    {
        return response()->json([
            'count' => NotificationService::getUnreadCount(),
        ]);
    }
}
