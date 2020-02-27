<?php

use Illuminate\Database\Seeder;

class CategoriesWithBlogAnalysisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['App\Analysis', 'App\Blog'] as $service) {
            factory(App\Category::class, 5)->create([
                                                'parent_id' => null,
                                                'service' => $service
                            ])->each(function ($category) use ($service) {
                factory(App\Category::class, 2)->create([
                                                'parent_id' => $category->id,
                                                'service' => $service
                ])->each(function ($subCategory) use ($service) {
                    factory($service, rand(5, 15))->create([
                                                        'category_id' => $subCategory->id,
                                                        'created_by' => rand(1, 10)
                    ]);
                });
            });
        }
    }
}
