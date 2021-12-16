<?php


namespace Modules\Report;

use Modules\User\Models\Wallet\DepositPayment;

class ModuleProvider extends \Modules\ModuleServiceProvider
{
    public function register()
    {

        $this->app->register(RouteServiceProvider::class);
    }

    public static function getAdminMenu()
    {
        return [
            'contact'=>[
                "position"=>71,
                'url'        => 'admin/module/contact',
                'title'      => __('Contact Submissions'),
                'icon'       => 'icon ion ion-md-mail',
                'permission' => 'contact_manage',
            ],
        ];
    }
}
