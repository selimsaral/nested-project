<?php

namespace App\Observers;

use App\Jobs\LogJob;
use App\Models\Product;

class ProductObserver
{
    const NAME = "App/Product";

    /**
     * Handle the Product "created" event.
     *
     * @param \App\Models\Product $product
     * @return void
     */
    public function created(Product $product)
    {
        LogJob::dispatch([
            'model'       => self::NAME,
            'action'      => 'CREATED',
            'old_version' => collect($product->getRawOriginal())->toJson(),
            'new_version' => $product
        ]);
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param \App\Models\Product $product
     * @return void
     */
    public function updated(Product $product)
    {
        LogJob::dispatch([
            'model'       => self::NAME,
            'action'      => 'UPDATED',
            'old_version' => collect($product->getRawOriginal())->toJson(),
            'new_version' => $product
        ]);
    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param \App\Models\Product $product
     * @return void
     */
    public function deleted(Product $product)
    {
        LogJob::dispatch([
            'model'       => self::NAME,
            'action'      => 'DELETED',
            'old_version' => collect($product->getRawOriginal())->toJson(),
            'new_version' => $product
        ]);
    }

    /**
     * Handle the Product "restored" event.
     *
     * @param \App\Models\Product $product
     * @return void
     */
    public function restored(Product $product)
    {
        LogJob::dispatch([
            'model'       => self::NAME,
            'action'      => 'RESTORED',
            'old_version' => collect($product->getRawOriginal())->toJson(),
            'new_version' => $product
        ]);
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @param \App\Models\Product $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        LogJob::dispatch([
            'model'       => self::NAME,
            'action'      => 'FORCE_DELETED',
            'old_version' => collect($product->getRawOriginal())->toJson(),
            'new_version' => $product
        ]);
    }
}
