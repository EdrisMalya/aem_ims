<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;

class Product extends Model
{
    use HasFactory, LogsActivity, CausesActivity;

    protected $guarded = [];

    protected $casts = [
        'cost' => 'int',
        'price' => 'int',
    ];

    public function getActivitylogOptions(): LogOptions
        {
            return LogOptions::defaults()
                            ->logOnlyDirty()
                            ->logOnly(['*'])
                            ->useLogName('Product')
                            ->dontSubmitEmptyLogs()
                            ->dontLogIfAttributesChangedOnly(['updated_at'])
                            ;
        }

    public function brand(): BelongsTo{
        return $this->belongsTo(Brand::class);
    }

    public function currency(): BelongsTo{
        return $this->belongsTo(Currency::class);
    }

    public function unit(): BelongsTo{
        return $this->belongsTo(BaseUnit::class, 'product_unit_id', 'id');
    }

    public function sale_unit(): BelongsTo{
        return $this->belongsTo(BaseUnit::class, 'product_sale_unit_id', 'id');
    }

    public function purchase_unit(): BelongsTo{
        return $this->belongsTo(BaseUnit::class, 'product_purchase_unit_id', 'id');
    }

    public function category(): BelongsTo{
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function inventory(): HasMany
    {
        return $this->hasMany(Inventory::class);
    }
}
