<?php


namespace SeptemberWerbeagentur\ContaoAssociatesBundle\ContaoManager;


use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use SeptemberWerbeagentur\ContaoAssociatesBundle\ContaoAssociatesBundle;

class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritDoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(ContaoAssociatesBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}
