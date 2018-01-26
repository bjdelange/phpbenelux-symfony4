<?php

namespace App;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RequestContext;

class CustomRouter implements UrlGeneratorInterface
{
    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        return 'Generate';
    }

    public function setContext(RequestContext $context)
    {
        // TODO: Implement setContext() method.
    }

    public function getContext()
    {
        // TODO: Implement getContext() method.
    }
}
