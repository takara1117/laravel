<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Illuminate\Database\Eloquent\Model;

    class ProductVariant extends Model
    {
        use HasFactory, SoftDeletes;

        protected $fillable = [
            'product_id',
            'variant',
            'value',
            'price',
            'stock',
            'image',
            'available',
        ];

        public function product()
        {
            return $this->belongsTo(Product::class);
        }

    }
