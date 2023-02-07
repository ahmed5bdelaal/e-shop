<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'slug' => fake()->name(),
            'cate_id' => '1',
            'brand_id' => '1',
            's_disc' => fake()->RealText(),
            'disc'=> fake()->RealText(),
            'o_price'=> '1500',
            's_price'=>'2000' ,
            'image' => '[product_1664413556.jpg]',
            'qty' => '5',
            'tax' =>'0',
            'status'=>'1',
            'trending'=>'1',
            'meta_title' =>fake()->RealText(),
            'meta_disc'=>fake()->RealText(),
            'meta_keywords'=>fake()->RealText(),
        ];
    }
}
