<?php

namespace App\View\Composers;

use App\Settings\GeneralSettings;
use Illuminate\View\View;

class MainLayoutComposer
{
    private $main;

    public function __construct(GeneralSettings $settings)
    {
        $this->main = $settings;
    }

    public function compose(View $view)
    {
        $meta = [
            'app_name' => $this->main->app_name,
            'app_desc' => $this->main->app_desc,
            'app_timezone' => $this->main->app_timezone,
            'app_locale' => $this->main->app_locale,
            'app_phone' => $this->main->app_phone,
            'app_mail' => $this->main->app_mail,
            'app_favicon' => $this->main->app_favicon,
            'app_logo' => $this->main->app_logo,
        ];

        $view->with('meta', $meta);
    }
}
