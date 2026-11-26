<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $helpers = app_path('Support/helpers.php');
        if (is_file($helpers)) {
            require_once $helpers;
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        \Illuminate\Support\Facades\View::composer('admin.layout', function ($view) {
            $counts = ['citas' => 0, 'mensajes' => 0, 'jobs' => 0, 'internships' => 0, 'convenios' => 0];
            try {
                $counts['citas'] = \App\Models\ContactRequest::citas()->where('status', 'new')->count();
                $counts['mensajes'] = \App\Models\ContactRequest::mensajes()->where('status', 'new')->count();
                $counts['jobs'] = \App\Models\JobApplication::where('status', 'new')->count();
                $counts['internships'] = \App\Models\InternshipRequest::where('status', 'new')->count();
                $counts['convenios'] = \App\Models\ConvenioRequest::where('status', 'new')->count();
            } catch (\Throwable $e) {
                \Illuminate\Support\Facades\Log::warning('Admin counts failed', ['error' => $e->getMessage()]);
            }
            $view->with('adminCounts', $counts);
        });
    }
}
