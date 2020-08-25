<?php
namespace Sasedev\PhpSpreadsheetBundle;

use Sasedev\PhpSpreadsheetBundle\DependencyInjection\SasedevPhpSpreadsheetExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 *
 * Sasedev\PhpSpreadsheetBundle\SasedevPhpSpreadsheetBundle
 *
 *
 * @author sasedev <sinus@sasedev.net>
 *         Created on: 23 mai 2020 @ 20:23:33
 */
class SasedevPhpSpreadsheetBundle extends Bundle
{

    /**
     *
     * {@inheritdoc}
     * @see \Symfony\Component\HttpKernel\Bundle\Bundle::getContainerExtension()
     */
    public function getContainerExtension()
    {

        return new SasedevPhpSpreadsheetExtension();

    }

}

