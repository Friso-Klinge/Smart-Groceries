<?php

namespace App\Services;

use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ProductRepository
{
    public function all(): Collection
    {
        return $this->query()
            ->orderBy('p.name')
            ->get()
            ->map(fn (object $product) => $this->toArray($product));
    }

    public function find(int $productId): ?array
    {
        $product = $this->query()
            ->where('p.id', $productId)
            ->first();

        return $product ? $this->toArray($product) : null;
    }

    private function query()
    {
        return DB::table('products as p')
            ->leftJoin('product_prices as cheapest', function (JoinClause $join) {
                $join->on('cheapest.product_id', '=', 'p.id')
                    ->whereRaw('cheapest.id = (
                        SELECT pp_min.id
                        FROM product_prices pp_min
                        WHERE pp_min.product_id = p.id
                        ORDER BY pp_min.price ASC, pp_min.id ASC
                        LIMIT 1
                    )');
            })
            ->leftJoin('supermarkets as s', 's.id', '=', 'cheapest.supermarket_id')
            ->select([
                'p.id',
                'p.barcode',
                'p.name',
                'p.brand',
                'p.image_url',
                'cheapest.price',
                'cheapest.supermarket_id',
                's.name as supermarket_name',
            ])
            ->selectRaw('(
                SELECT MAX(pp_max.price)
                FROM product_prices pp_max
                WHERE pp_max.product_id = p.id
            ) as highest_price');
    }

    private function toArray(object $product): array
    {
        return [
            'id' => (int) $product->id,
            'barcode' => $product->barcode,
            'name' => $product->name,
            'brand' => $product->brand ?: 'Overig',
            'image_url' => $product->image_url,
            'price' => $product->price !== null ? (float) $product->price : null,
            'highest_price' => $product->highest_price !== null ? (float) $product->highest_price : null,
            'supermarket_id' => $product->supermarket_id !== null ? (int) $product->supermarket_id : null,
            'supermarket_name' => $product->supermarket_name,
        ];
    }
}
