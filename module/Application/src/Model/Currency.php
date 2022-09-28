<?php

namespace Application\Model;

/**
 * Currency data entity
 */
class Currency
{
    /**
     * Currencies data
     *
     * @var array
     */
    const CURRENCY_DATA = [
        'AUD' => 'Australian Dollar',
        'BRL' => 'Brazilian Real',
        'CAD' => 'Canadian Dollar',
        'CLP' => 'Chilean Peso',
        'COP' => 'Colombian Peso',
        'CUP' => 'Cuban Peso',
        'CZK' => 'Czech Koruna',
        'DKK' => 'Danish Krone',
        'EGP' => 'Egyptian Pound',
        'ETB' => 'Ethiopian Birr',
        'EUR' => 'Euro',
        'FKP' => 'Falkland Islands Pound',
        'FJD' => 'Fijian Dollar',
        'GIP' => 'Gibraltar Pound',
        'HKD' => 'Hong Kong Dollar',
        'ISK' => 'Iceland Krona',
        'INR' => 'Indian Rupee',
        'JOD' => 'Jordanian Dinar',
        'KES' => 'Kenyan Shilling',
        'MXN' => 'Mexican Peso',
        'MAD' => 'Moroccan Dirham',
        'NZD' => 'New Zealand Dollar',
        'NOK' => 'Norwegian Krone',
        'GBP' => 'Pound Sterling',
        'RUB' => 'Russian Ruble',
        'SAR' => 'Saudi Riyal',
        'SGD' => 'Singapore Dollar',
        'ZAR' => 'South African Rand',
        'LKR' => 'Sri Lankan Rupee',
        'SEK' => 'Swedish Krona',
        'CHF' => 'Swiss Franc',
        'TZS' => 'Tanzanian Shilling',
        'THB' => 'Thai Baht',
        'TTD' => 'Trinidad and Tobago Dollar',
        'TRY' => 'Turkish Lira',
        'AED' => 'UAE Dirham',
        'UGX' => 'Uganda Shilling',
        'USD' => 'US Dollar',
        'JPY' => 'Yen',
        'CNY' => 'Yuan Renminbi',
        'ZWL' => 'Zimbabwean Dollar',
        'PLN' => 'Zloty',
    ];

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $name;

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return Currency
     */
    public function setCode(string $code): Currency
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Currency
     */
    public function setName(string $name): Currency
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Create a currency model populated with random data
     *
     * @return Currency
     */
    public static function createRandom(): Currency
    {
        $code = array_rand(self::CURRENCY_DATA);

        $currency = new Currency();
        $currency->setCode($code)
                    ->setName(self::CURRENCY_DATA[$code]);

        return $currency;
    }
}
