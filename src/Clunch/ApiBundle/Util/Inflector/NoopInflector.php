<?php


namespace Clunch\ApiBundle\Util\Inflector;

use FOS\RestBundle\Inflector\InflectorInterface;

/**
 * Inflector class
 *
 */
class NoopInflector implements InflectorInterface
{
    public function pluralize($word)
    {
        // Prevent pluralization
        return $word;
    }
}
