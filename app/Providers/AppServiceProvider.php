<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Pluralizer;

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
    public function boot()
    {
        App::setLocale(env('APP_LANG', 'en'));
        $this->logQuery();
    }
    private function logQuery()
    {
        if (true) {
            $now = now()->format('Y-m-d');
            \File::delete("storage/app/query/sql-$now.sql");

            $maxSize = 2000000; // ~2Mb
            $nameFix = 'query/sql-' . date('Y-m-d');
            $name = "{$nameFix}.sql";
            $index = 0;
            while (\Storage::disk('local')->exists($name)
                && \Storage::disk('local')->size($name) >= $maxSize) {
                $index += 1;
                $name = "{$nameFix}-{$index}.sql";
            }
            \Storage::disk('local')->append($name, "\r\n Start: ");

            \DB::listen(function ($query) use ($name) {
                $binding = $query->bindings;
                $binding = array_map(function ($bd) {
                    if (is_object($bd)) return "'" . (string)$bd->format('Y-m-d H:i:s') . "'";
                    else return "'$bd'";
                }, $binding);

                $boundSql = str_replace(['%', '?'], ['%%', '%s'], $query->sql);
                $boundSql = vsprintf($boundSql, $binding);
                $sql = "-- " . date('d-m-Y H:i:s') . " Time: ({$query->time})\r\n ";
                $sql .= $boundSql;
                $sql .= ';';
                \Storage::disk('local')->append($name, $sql);
            });
        }
    }
}
