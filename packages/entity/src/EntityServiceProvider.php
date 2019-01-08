<?php

namespace Entity;

use Entity\Languages\LanguagesEntity;
use Entity\News\NewsEntity;
use Entity\NewsCategories\NewsCategoriesEntity;
use Entity\Resources\ResourcesEntity;
use Entity\Roles\RolesEntity;
use Entity\Transactions\TransactionsEntity;
use Entity\Users\NewsEntity;
use Entity\Validation\Languages\LanguagesCreateValidator;
use Entity\Validation\Languages\LanguagesUpdateValidator;
use Entity\Validation\News\ProductCreateValidator;
use Entity\Validation\News\ProductUpdateValidator;
use Entity\Validation\NewsCategories\NewsCategoriesUpdateValidator;
use Entity\Validation\NewsCategories\NewsCategoriesCreateValidator;
use Entity\Validation\Resources\ResourcesCreateValidator;
use Entity\Validation\Resources\ResourcesUpdateValidator;
use Entity\Validation\Roles\RolesCreateValidator;
use Entity\Validation\Roles\RolesUpdateValidator;
use Entity\Validation\Transactions\TransactionsCreateValidator;
use Entity\Validation\Transactions\TransactionsUpdateValidator;
use Entity\Validation\Users\UsersCreateValidator;
use Entity\Validation\Users\UsersUpdateValidator;
use Illuminate\Support\ServiceProvider;

class EntityServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     * @return void
     */
    public function boot()
    {
        //
    }
    /**
     * Register services.
     * @return void
     */
    public function register()
    {
        $this->app->bind('Entity\NewsCategories\NewsCategoriesEntity', function($app)
        {
            return new NewsCategoriesEntity (
                $app->make('Entity\Repository\NewsCategories\NewsCategoriesRepository'),
                new NewsCategoriesCreateValidator( $app['validator'] ),
                new NewsCategoriesUpdateValidator( $app['validator'] )
            );
        });

        //news
        $this->app->bind('Entity\NewsCategories\NewsEntity', function($app)
        {
            return new NewsEntity (
                $app->make('Entity\Repository\News\ProductRepository'),
                new ProductCreateValidator( $app['validator'] ),
                new ProductUpdateValidator( $app['validator'] )
            );
        });

        // resources
        $this->app->bind('Entity\Resources\ResourcesEntity', function($app)
        {
            return new ResourcesEntity (
                $app->make('Entity\Repository\Resources\ResourcesRepository'),
                new ResourcesCreateValidator( $app['validator'] ),
                new ResourcesUpdateValidator( $app['validator'] )
            );
        });

        //languages
        $this->app->bind('Entity\Languages\LanguagesEntity', function($app)
        {
            return new LanguagesEntity (
                $app->make('Entity\Repository\Languages\LanguagesRepository'),
                new LanguagesCreateValidator( $app['validator'] ),
                new LanguagesUpdateValidator( $app['validator'] )
            );
        });

        //users
        $this->app->bind('Entity\Users\NewsEntity', function($app)
        {
            return new NewsEntity (
                $app->make('Entity\Repository\Users\UsersRepository'),
                new UsersCreateValidator( $app['validator'] ),
                new UsersUpdateValidator( $app['validator'] )
            );
        });

        //roles
        $this->app->bind('Entity\Roles\RolesEntity', function($app)
        {
            return new RolesEntity (
                $app->make('Entity\Repository\Roles\RolesRepository'),
                new RolesCreateValidator( $app['validator'] ),
                new RolesUpdateValidator( $app['validator'] )
            );
        });

        //transactions
        //roles
        $this->app->bind('Entity\Transactions\TransactionsEntity', function($app)
        {
            return new TransactionsEntity (
                $app->make('Entity\Repository\Transactions\TransactionsRepository'),
                new TransactionsCreateValidator( $app['validator'] ),
                new TransactionsUpdateValidator( $app['validator'] )
            );
        });
    }
}
