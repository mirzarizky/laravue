<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class EloquentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Search query
        Builder::macro('search', function ($fields = [], $string = null) {
            if (!$string) {
                return $this;
            }

            // Split into AND groups
            $strings = explode(" ", $string);

            /**
             * @var Builder
             */
            $query = $this;

            foreach ($strings as $string) {
                // AND
                $query = $query->where(function ($query) use ($fields, $string) {
                    foreach ($fields as $field) {
                        // OR
                        if (str_contains($field, ".")) {
                            $relation = Str::before($field, '.');
                            $field = Str::after($field, '.');

                            // nested search
                            $query = $query->with($relation)
                                        ->orWhereHas($relation, function ($query) use ($field, $string) {
                                            $query->where($field, 'LIKE', '%' . $string . '%');
                                        });
                        } else {
                            $query = $query->orWhere($field, 'like', '%'.$string.'%');
                        }
                    }
                });
            }

            return $query;
        });
    }
}
