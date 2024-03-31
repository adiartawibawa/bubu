<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.app_name', 'Bubu App');
        $this->migrator->add('general.app_desc', 'Starting Application by Ra.Va Studio');
        $this->migrator->add('general.app_favicon', '');
        $this->migrator->add('general.app_logo', '');
        $this->migrator->add('general.app_phone', '123-456-7890');
        $this->migrator->add('general.app_mail', 'admin@mail.test');
        $this->migrator->add('general.app_timezone', 'Asia/Makassar');
        $this->migrator->add('general.app_locale', 'id');
        $this->migrator->add('general.app_active', true);
    }
};
