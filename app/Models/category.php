<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;





class category extends Model
{
    use HasFactory,softDeletes;

    protected $fillable =[
        'name', 'parent_id','description','image','status','slug'
    ];

    public function products()
    {
        return $this->hasMany(product::class,'category_id','id');
    }

    public function parent()
    {
        return $this->belongsTo(category::class,'parent_id','id');
    }
    public function chidren()
    {
        return $this->hasMany(category::class,'parent_id','id');
    }


    public function scopeFilter(Builder $builder, $filters)
    {
        if ($filters['name'] ?? false)
        {
            $builder->where('name','like',"%{$filters['name']}%");
        }


        if ($filters['status'] ?? false)
        {
            $builder->where('status','=',$filters['status']);
        }
    }



    public static function rules($id=0)
    {
        return[
            'name'=>['required',
                'string',
                'min:3',
                Rule::unique('categories','name')->ignore($id),
                function ($attribute,$value,$fails) {
                    if ($value=='laravel'){
                        $fails('this name is forbidden');
                    }
                },

            ],
            'parent_id'=>[
                'nullable','int','exists:categories,id'
            ],
            'status' =>[
                'in:active,archived'
            ],
        ];


    }
}



