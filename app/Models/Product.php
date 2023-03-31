<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable=['title','slug','summary','description','photo','stock','brand_id',
                          'cat_id','child_cat_id','price','offer_price','discount','size','status',
                        'conditions','vendor_id'];

    public function brand()
    {
      return $this->BelongsTo('\App\Models\Brand');
    }                    

}

