<?php

namespace App\Containers\Audit\Models;

use App\Ship\Parents\Providers\MainProvider;

class MainServiceProvider extends MainProvider
{

    /**
     * Container Service Providers.
     *
     * @var array
     */
    public $serviceProviders = [
        \OwenIt\Auditing\AuditingServiceProvider::class,
    ];

    /**
     * Container Aliases
     *
     * @var  array
     */
    public $aliases = [
        // ...
    ];

    /**
     * Register anything in the container.
     */
    public function register()
    {
        parent::register();
    }
}
