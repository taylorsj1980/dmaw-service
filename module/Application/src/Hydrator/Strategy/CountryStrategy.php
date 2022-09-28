<?php

namespace Application\Hydrator\Strategy;

use Application\Model\Country;
use Laminas\Hydrator\Strategy\StrategyInterface;

class CountryStrategy implements StrategyInterface
{
    /**
     * Converts the given value so that it can be extracted by the hydrator.
     *
     * @param  mixed       $value The original value.
     * @param  null|object $object (optional) The original object for context.
     * @return mixed       Returns the value that should be extracted.
     */
    public function extract($value, ?object $object = null)
    {
        if ($value instanceof Country) {
            return $value->getIso2();
        }

        return null;
    }

    /**
     * Converts the given value so that it can be hydrated by the hydrator.
     *
     * @param  mixed      $value The original value.
     * @param  null|array $data The original data for context.
     * @return mixed      Returns the value that should be hydrated.
     */
    public function hydrate($value, ?array $data)
    {
        $countryData = Country::COUNTRY_DATA;

        if (isset($countryData[$value])) {
            $country = new Country();
            $country->setName($countryData[$value])
                    ->setIso2($value);

            return $country;
        }

        return null;
    }
}
