<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'number', 'user_id', 'status', 'payment_status',
        'discount', 'tax', 'total', 'ip', 'user_agent',
        'payment_method', 'payment_transaction_id', 'payment_data'
    ];

    public function store()
    {
        $this->belongsTo(store::class);
    }


    public function user()
    {
        $this->belongsTo(User::class, 'user_id', 'id')
            ->withDefault([
               'name'=> 'Guest Customer'
            ]);
    }

    public function addresses()
    {
        return $this->hasMany(OrderAddress::class, 'order_id', 'id');
    }


    public function billingAddress()
    {
        return $this->hasOne(OrderAddress::class, 'order_id', 'id')
            ->where('type','=','billing');
    }

    public function shippingAddress()
    {
        return $this->hasOne(OrderAddress::class, 'order_id', 'id')
            ->where('type','=','shipping');
    }


    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(
            Product::class, 'order_items', 'order_id', 'product_id','id','id')
            ->using(OrderItem::class)
            ->as('order_item')
            ->withPivot([
               'product_name','price','quantity','options',
            ]);

    }

    protected static function booted()
    {
        static::creating(function(Order $order) {
            // 202200001, 202200002
            $order->number = Order::getNextOrderNumber();
        });
    }

    public static function getNextOrderNumber()
    {
        $year = Carbon::now()->year;

        $number = Order::whereYear('created_at',$year)->max('number');
        if ($number) {
            return $number + 1;
        }
        return $year . '0001';
    }

}

