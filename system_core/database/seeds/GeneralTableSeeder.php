<?php

use Illuminate\Database\Seeder;

class GeneralTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['App\Analysis', 'App\Blog'] as $service)
        {
            factory(App\Category::class, 3)->create([
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
                    ])->each(function ($each) use ($service) {
                        // factory(App\Like::class, rand(10, 15))->create([
                        //     'likeable_type' => $service,
                        //     'likeable_id' => $each->id
                        // ]);
                        // factory(App\Comment::class, rand(10, 15))->create([
                        //     'commentable_type' => $service,
                        //     'commentable_id' => $each->id
                        // ]);
                        // factory(App\Rating::class, rand(10, 15))->create([
                        //     'rateable_type' => $service,
                        //     'rateable_id' => $each->id
                        // ]);
                    });
                });
            });
        }
    }
}
