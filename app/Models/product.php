<?php

namespace App\Models;

use App\Models\Scopes\storescope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Casts\Attribute;



class product extends Model
{
    use HasFactory;
    protected $fillable =[
        'name', 'category_id','store_id','description','image','status','slug'
    ];
    protected static function booted(): void
    {
        static::addGlobalScope( 'store',new StoreScope());
    }

    public function scopeActive(builder $builder)
    {
        $builder->where('status','=','active');
    }


    protected function getImageUrlAttribute(): string
    {
        return 'https://agrimart.in/uploads/vendor_banner_image/default.jpg';
    }



    public function category()
    {
       return $this->belongsTo(category::class,'category_id','id');
    }

     public function store()
     {
         return $this->belongsTo(store::class,'store_id','id');
     }


     public function scopeFilter(Builder $builder,$filters)
     {
         $options = array_merge([
            'store_id' => null,
            'category_id' => null,
             'status' => 'active',
         ],$filters);

         $builder->when($options['store_id'],function ($builder,$value){
             $builder->where('store_id',$value);
         });

         $builder->when($options['category_id'],function ($builder,$value){
             $builder->where('category_id',$value);
         });

         $builder->when($options['status'],function ($query,$status){
             return $query->where('status',$status);
         });

     }

}
