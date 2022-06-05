<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Illuminate\Database\Eloquent\Model;

    class Product extends Model
    {
        use HasFactory, SoftDeletes;

        protected $fillable = [
            'name',
            'description',
            'image',
            'available',
        ];

        public function getAvailableStatus()
        {
            return $this->available ? '販売中' : '休止中';
        }

        public function getAvailableColor()
        {
            return $this->available ? 'bg-green-200' : 'bg-gray-200';
        }

        public function product_variants()
        {
            return $this->hasMany(ProductVariant::class);
        }

        public function getMinPrice()
        {
            return $this->product_variants->min('price') ?? 0;
        }

        public function getMaxPrice()
        {
            return $this->product_variants->max('price') ?? 0;
        }

        public function getStock()
        {
            return $this->product_variants->max('stock');
        }

        public function getImageSrc()
        {
            if (! $this->image or $this->image == '') {
                $this->image = 'unknown.jpeg';
            }
            return $this->image;
        }

    }
