<?php

namespace Application\Hydrator\Strategy;

use Laminas\Hydrator\Strategy\DefaultStrategy;

class IdStrategy extends DefaultStrategy
{
    /**
     * Converts the given value so that it can be hydrated by the hydrator.
     *
     * @param mixed $value The original value.
     * @return mixed Returns the value that should be hydrated.
     */
    public function hydrate($value, ?array $data = null)
    {
        if (intval($value) == $value) {
            return (int) $value;
        }

        return null;
    }
}
