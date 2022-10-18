<?php

namespace Application\Hydrator\Strategy;

use Application\Model\Currency;
use Application\Util\Util;
use Laminas\Hydrator\Strategy\StrategyInterface;

class CurrencyStrategy implements StrategyInterface
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
        if ($value instanceof Currency) {
            return $value->getCode();
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
        $currencyData = Util::CURRENCY_DATA;

        if (isset($currencyData[$value])) {
            $currency = new Currency();
            $currency->setName($currencyData[$value])
                        ->setCode($value);

            return $currency;
        }

        return null;
    }
}
