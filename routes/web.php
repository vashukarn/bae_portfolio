<?php

use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Web\HomeController;
use App\Livewire\CMS\BlogCreateUpdate;
use App\Livewire\CMS\BlogList;
use App\Livewire\CMS\BlogCategoryCrud;
use App\Livewire\CMS\BlogTagCrud;
use App\Livewire\CMS\CarouselCrud;
use App\Livewire\CMS\ContactFormList;
use App\Livewire\CMS\IndexPageBlog;
use App\Livewire\CMS\SubscriptionList;
use App\Livewire\CMS\TestimonialCrud;
use App\Livewire\PermissionCrud;
use App\Livewire\RoleCrud;
use App\Livewire\UserCrud;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::get('about', [HomeController::class, 'about'])->name('about');

Route::group(['middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified']], static function ($authUser) {
    $authUser->get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    $authUser->get('profile', [DashboardController::class, 'profile'])->name('profile.show');
    $authUser->get('roles', RoleCrud::class)->name('roles.index');
    $authUser->get('users', UserCrud::class)->name('users.index');
    $authUser->get('subscriptions', SubscriptionList::class)->name('subscriptions.index');
    $authUser->get('recommendations', TestimonialCrud::class)->name('recommendations.index');
    $authUser->get('carousel', CarouselCrud::class)->name('carousel.index');
    $authUser->get('contact-forms', ContactFormList::class)->name('contact_forms.index');
    $authUser->group(['prefix' => 'blogs', 'as' => 'blogs.'], static function ($authUser) {
        $authUser->get('/', BlogList::class)->name('index');
        $authUser->get('create', BlogCreateUpdate::class)->name('create');
        $authUser->get('edit/{id}', BlogCreateUpdate::class)->name('edit');
        $authUser->get('categories', BlogCategoryCrud::class)->name('categories.index');
        $authUser->get('tags', BlogTagCrud::class)->name('tags.index');
        $authUser->get('authors', BlogTagCrud::class)->name('tags.index');
        $authUser->get('index-page', IndexPageBlog::class)->name('index-page');
    });
    $authUser->get('roles/{role_id}/permissions', PermissionCrud::class)->name('permissions.edit');
});

Route::get('{slug}', [HomeController::class, 'detail'])->name('blog.detail');
Route::get('tag/{slug}', [HomeController::class, 'tag_page'])->name('tags.index');
Route::get('category/{slug}', [HomeController::class, 'category_page'])->name('category.index');
