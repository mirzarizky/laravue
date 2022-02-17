<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\CpuLoadHealthCheck\CpuLoadCheck;
use Spatie\Health\Checks\Checks\CacheCheck;
use Spatie\Health\Checks\Checks\DatabaseCheck;
use Spatie\Health\Checks\Checks\DebugModeCheck;
use Spatie\Health\Checks\Checks\EnvironmentCheck;
use Spatie\Health\Checks\Checks\HorizonCheck;
use Spatie\Health\Checks\Checks\PingCheck;
use Spatie\Health\Checks\Checks\RedisCheck;
use Spatie\Health\Checks\Checks\ScheduleCheck;
use Spatie\Health\Checks\Checks\UsedDiskSpaceCheck;
use Spatie\Health\Facades\Health;
use VictoRD11\SslCertificationHealthCheck\SslCertificationExpiredCheck;

class LaravelHealthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        Health::checks([
            SslCertificationExpiredCheck::new()
                ->url('skinofmylife.com')
                ->warnWhenSslCertificationExpiringDay(24)
                ->failWhenSslCertificationExpiringDay(14)
                ->name('Ssl Certificatificate for Web'),
            SslCertificationExpiredCheck::new()
                ->url('api.skinofmylife.com')
                ->warnWhenSslCertificationExpiringDay(24)
                ->failWhenSslCertificationExpiringDay(14)
                ->name('Ssl Certificatificate for Api'),
            SslCertificationExpiredCheck::new()
                ->url('crm.skinofmylife.com')
                ->warnWhenSslCertificationExpiringDay(24)
                ->failWhenSslCertificationExpiringDay(14)
                ->name('Ssl Certificatificate for CRM'),
            CpuLoadCheck::new()
                ->failWhenLoadIsHigherInTheLast5Minutes(2.0)
                ->failWhenLoadIsHigherInTheLast15Minutes(1.5),
            PingCheck::new()->url('https://skinofmylife.com')
                ->timeout(5)
                ->name('Ping Web'),
            PingCheck::new()->url('https://api.skinofmylife.com')
                ->timeout(5)
                ->name('Ping Api'),
            HorizonCheck::new(),
            UsedDiskSpaceCheck::new(),
            EnvironmentCheck::new(),
            DebugModeCheck::new(),
            DatabaseCheck::new(),
            RedisCheck::new(),
            CacheCheck::new(),
            ScheduleCheck::new()
                ->useCacheStore('file')
                ->heartbeatMaxAgeInMinutes(3),
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
