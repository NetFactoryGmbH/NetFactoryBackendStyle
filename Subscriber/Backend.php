<?php

namespace NetFactoryBackendStyle\Subscriber;

use Enlight\Event\SubscriberInterface;
use Enlight_Event_EventArgs;
use Shopware\Components\DependencyInjection\Container;

class Backend implements SubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PostDispatchSecure_Backend' => 'onBackend',
        ];
    }

    private $dic;
    private $config;

    public function __construct(Container $dic)
    {
        $this->dic = $dic;
        $this->config = $this->dic->get('shopware.plugin.config_reader')->getByPluginName('NetFactoryBackendStyle');
    }

    public function onBackend(Enlight_Event_EventArgs $args)
    {
        $view = $args->getSubject()->View();
        $view->addTemplateDir($this->dic->get('kernel')->getPlugins()['NetFactoryBackendStyle']->getPath() . '/Resources/views/');
        $view->extendsTemplate('backend/backendstyle/styling.tpl');

        $backgroundImage = $this->config['BackendStyleBackgroundMedia'];
        $backgroundSize = $this->config['BackendStyleBackgroundSize'];
        $backgroundTransparency = $this->config['BackendStyleBackgroundTransparency'];
        $backgroundGrayScale = $this->config['BackendStyleBackgroundGrayscale'];
        $hideMenuLogo = $this->config['BackendStyleShowMenuLogo'];

        $view->assign([
            'backgroundImage' => $backgroundImage,
            'backgroundSize' => $backgroundSize,
            'backgroundTransparency' => $backgroundTransparency,
            'backgroundGrayScale' => $backgroundGrayScale,
            'hideMenuLogo' => $hideMenuLogo
        ]);
    }
}