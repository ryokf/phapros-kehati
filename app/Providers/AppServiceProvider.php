<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        View::composer('layouts.home-layout', function ($view) {
            $categories = Category::leftJoin('courses', 'categories.id', '=', 'courses.id_category')
                ->limit(5)
                ->select('categories.id', 'categories.name', 'categories.photo', DB::raw('COUNT(courses.id) as course_count'))
                ->groupBy('categories.id', 'categories.name', 'categories.photo')
                ->orderByDesc('course_count')
                ->get();
            $view->with('categories', $categories);
        });

        View::composer('member.lesson.index', function ($view) {
            $categories = Category::leftJoin('courses', 'categories.id', '=', 'courses.id_category')
                ->limit(5)
                ->select('categories.id', 'categories.name', 'categories.photo', DB::raw('COUNT(courses.id) as course_count'))
                ->groupBy('categories.id', 'categories.name', 'categories.photo')
                ->orderByDesc('course_count')
                ->get();
            $view->with('categories', $categories);
        });

        if(env('APP_ENV') !== 'local')
        {
            $url->forceSchema('https');
        }
    }
}
