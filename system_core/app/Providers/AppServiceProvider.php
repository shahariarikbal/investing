<?php

namespace App\Providers;

use View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composer\BlogTagsComposer;
use App\Http\View\Composer\CommentsComposer;
use App\Http\View\Composer\LatestBlogComposer;
use App\Http\View\Composer\BlogCommentComposer;
use App\Http\View\Composer\AnalysisTagsComposer;
use App\Http\View\Composer\LatestAnalysisComposer;
use App\Http\View\Composer\TopForexBroker;
use App\Http\View\Composer\TradingSessionComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::composer(['frontend.partials.analyses.*', 'frontend.partials.signals.*'], LatestAnalysisComposer::class);
        View::composer(['frontend.partials.tags.*'], AnalysisTagsComposer::class);
        View::composer(['frontend.partials.analyses.*'], CommentsComposer::class);
        View::composer(['frontend.partials.blog.*', 'frontend.partials.signals.*'], LatestBlogComposer::class);
        View::composer(['frontend.partials.tags.*'], BlogTagsComposer::class);
        View::composer(['frontend.partials.blog.*'], BlogCommentComposer::class);
        View::composer(['frontend.partials.signals.*'], TopForexBroker::class);
        View::composer(['frontend.partials.signals.*'], TradingSessionComposer::class);
    }
}
