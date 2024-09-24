<?php

namespace App\Models;
use Illuminate\Support\Str;
use App\Observers\cartObserver;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    public $incrementing=false;
    protected $fillable = [
        'cookie_id','user_id','product_id','quantity','options',
    ];

    protected static function booted()
          {
             static::observe(cartObserver::class);   //when creat cart => 'id' auto created

              static::addGlobalScope('cookie_id',function (Builder $builder){

                  $builder->where ('cookie_id','=',cart::getCookieId());
              });
          }

    public static function getCookieId()
    {
        $cookie_id = request()->cookie('cart_id');
        if (!$cookie_id){
            $cookie_id =Str::uuid();
            $expiration = now()->addDays(30)->timestamp;
            cookie()->queue(cookie('cart_id',$cookie_id,$expiration));
        }
        return $cookie_id;
    }
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'anonymous',
        ]);
    }


        public function product()
    {
        return $this->belongsTo(product::class);
    }


}
