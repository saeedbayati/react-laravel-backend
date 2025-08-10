<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * نمایش همه سفارش‌ها
     */
    public function index()
    {
        // گرفتن همه سفارش‌ها بر اساس جدیدترین تاریخ به ترتیب نزولی
        $orders = Order::latest()->get();

        // بازگرداندن ویو مربوط به لیست سفارش‌ها و ارسال داده‌ها به آن
        return view('admin.orders.index')->with([
            'orders' => $orders
        ]);
    }

    /**
     * حذف یک سفارش مشخص
     */
    public function destroy(Order $order)
    {
        // حذف سفارش از دیتابیس
        $order->delete();

        // هدایت دوباره به صفحه لیست سفارش‌ها با پیام موفقیت‌آمیز بودن عملیات
        return redirect()->route('admin.orders.index')->with([
            'success' => 'سفارش با موفقیت حذف شد.'
        ]);
    }
}
