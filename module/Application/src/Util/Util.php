<?php

namespace Application\Util;

use Application\Model;

/**
 * Utility class for helper functions
 */
class Util
{
    /**
     * First names data
     *
     * @var array
     */
    const FIRST_NAME_DATA = [
        'James',
        'Robert',
        'John',
        'Michael',
        'David',
        'William',
        'Richard',
        'Joseph',
        'Thomas',
        'Charles',
        'Christopher',
        'Daniel',
        'Matthew',
        'Anthony',
        'Mark',
        'Donald',
        'Steven',
        'Paul',
        'Andrew',
        'Joshua',
        'Mary',
        'Patricia',
        'Jennifer',
        'Linda',
        'Elizabeth',
        'Barbara',
        'Susan',
        'Jessica',
        'Sarah',
        'Karen',
        'Lisa',
        'Nancy',
        'Betty',
        'Margaret',
        'Sandra',
        'Ashley',
        'Kimberly',
        'Emily',
        'Donna',
        'Michelle',
    ];

    /**
     * Surnames data
     *
     * @var array
     */
    const SURNAME_DATA = [
        'Smith',
        'Johnson',
        'Williams',
        'Brown',
        'Jones',
        'Garcia',
        'Miller',
        'Davis',
        'Rodriguez',
        'Martinez',
        'Hernandez',
        'Lopez',
        'Gonzalez',
        'Wilson',
        'Anderson',
        'Thomas',
        'Taylor',
        'Moore',
        'Jackson',
        'Martin',
        'Lee',
        'Perez',
        'Thompson',
        'White',
        'Harris',
        'Sanchez',
        'Clark',
    ];

    /**
     * Countries data
     *
     * @var array
     */
    const COUNTRY_DATA = [
        'AD' => 'Andorra',
        'AO' => 'Angola',
        'AI' => 'Anguilla',
        'AG' => 'Antigua and Barbuda',
        'AR' => 'Argentina',
        'AM' => 'Armenia',
        'AW' => 'Aruba',
        'AU' => 'Australia',
        'AT' => 'Austria',
        'AZ' => 'Azerbaijan',
        'BS' => 'Bahamas',
        'BH' => 'Bahrain',
        'BD' => 'Bangladesh',
        'BB' => 'Barbados',
        'BY' => 'Belarus',
        'BE' => 'Belgium',
        'BZ' => 'Belize',
        'BM' => 'Bermuda',
        'BO' => 'Bolivia',
        'BA' => 'Bosnia and Herzegovina',
        'BW' => 'Botswana',
        'BR' => 'Brazil',
        'BG' => 'Bulgaria',
        'BI' => 'Burundi',
        'KH' => 'Cambodia',
        'CM' => 'Cameroon',
        'CA' => 'Canada',
        'KY' => 'Cayman Islands',
        'TD' => 'Chad',
        'CL' => 'Chile',
        'CN' => 'China',
        'CO' => 'Colombia',
        'CD' => 'Congo',
        'CR' => 'Costa Rica',
        'CI' => 'Côte d\'Ivoire',
        'HR' => 'Croatia',
        'CU' => 'Cuba',
        'CY' => 'Cyprus',
        'CZ' => 'Czechia',
        'DK' => 'Denmark',
        'DJ' => 'Djibouti',
        'DM' => 'Dominica',
        'DO' => 'Dominican Republic',
        'EC' => 'Ecuador',
        'EG' => 'Egypt',
        'SV' => 'El Salvador',
        'ER' => 'Eritrea',
        'EE' => 'Estonia',
        'SZ' => 'Eswatini',
        'ET' => 'Ethiopia',
        'FJ' => 'Fiji',
        'FI' => 'Finland',
        'FR' => 'France',
        'GM' => 'Gambia',
        'GE' => 'Georgia',
        'DE' => 'Germany',
        'GH' => 'Ghana',
        'GI' => 'Gibraltar',
        'GR' => 'Greece',
        'GL' => 'Greenland',
        'GD' => 'Grenada',
        'GT' => 'Guatemala',
        'GG' => 'Guernsey',
        'GN' => 'Guinea',
        'GW' => 'Guinea-Bissau',
        'GY' => 'Guyana',
        'HT' => 'Haiti',
        'HN' => 'Honduras',
        'HK' => 'Hong Kong',
        'HU' => 'Hungary',
        'IS' => 'Iceland',
        'IN' => 'India',
        'ID' => 'Indonesia',
        'IR' => 'Iran',
        'IQ' => 'Iraq',
        'IE' => 'Ireland',
        'IL' => 'Israel',
        'IT' => 'Italy',
        'JM' => 'Jamaica',
        'JP' => 'Japan',
        'JO' => 'Jordan',
        'KZ' => 'Kazakhstan',
        'KE' => 'Kenya',
        'KW' => 'Kuwait',
        'LV' => 'Latvia',
        'LB' => 'Lebanon',
        'LS' => 'Lesotho',
        'LR' => 'Liberia',
        'LY' => 'Libya',
        'LI' => 'Liechtenstein',
        'LT' => 'Lithuania',
        'LU' => 'Luxembourg',
        'MG' => 'Madagascar',
        'MW' => 'Malawi',
        'MY' => 'Malaysia',
        'MV' => 'Maldives',
        'ML' => 'Mali',
        'MT' => 'Malta',
        'MU' => 'Mauritius',
        'MX' => 'Mexico',
        'FM' => 'Micronesia',
        'MD' => 'Moldova',
        'MC' => 'Monaco',
        'MN' => 'Mongolia',
        'ME' => 'Montenegro',
        'MS' => 'Montserrat',
        'MA' => 'Morocco',
        'MZ' => 'Mozambique',
        'MM' => 'Myanmar',
        'NA' => 'Namibia',
        'NP' => 'Nepal',
        'NL' => 'Netherlands',
        'NZ' => 'New Zealand',
        'NI' => 'Nicaragua',
        'NG' => 'Nigeria',
        'KP' => 'North Korea',
        'NO' => 'Norway',
        'OM' => 'Oman',
        'PK' => 'Pakistan',
        'PS' => 'Palestine',
        'PA' => 'Panama',
        'PY' => 'Paraguay',
        'PE' => 'Peru',
        'PH' => 'Philippines',
        'PL' => 'Poland',
        'PT' => 'Portugal',
        'PR' => 'Puerto Rico',
        'QA' => 'Qatar',
        'RO' => 'Romania',
        'RU' => 'Russian Federation',
        'RW' => 'Rwanda',
        'WS' => 'Samoa',
        'SM' => 'San Marino',
        'SA' => 'Saudi Arabia',
        'SN' => 'Senegal',
        'RS' => 'Serbia',
        'SC' => 'Seychelles',
        'SL' => 'Sierra Leone',
        'SG' => 'Singapore',
        'SK' => 'Slovakia',
        'SI' => 'Slovenia',
        'SO' => 'Somalia',
        'ZA' => 'South Africa',
        'KR' => 'South Korea',
        'SS' => 'South Sudan',
        'ES' => 'Spain',
        'LK' => 'Sri Lanka',
        'SD' => 'Sudan',
        'SR' => 'Suriname',
        'SE' => 'Sweden',
        'CH' => 'Switzerland',
        'TW' => 'Taiwan',
        'TJ' => 'Tajikistan',
        'TZ' => 'Tanzania',
        'TH' => 'Thailand',
        'TO' => 'Tonga',
        'TT' => 'Trinidad and Tobago',
        'TN' => 'Tunisia',
        'TR' => 'Turkey',
        'TM' => 'Turkmenistan',
        'UG' => 'Uganda',
        'UA' => 'Ukraine',
        'AE' => 'United Arab Emirates',
        'US' => 'United States',
        'GB' => 'United Kingdom',
        'UY' => 'Uruguay',
        'UZ' => 'Uzbekistan',
        'VE' => 'Venezuela',
        'YE' => 'Yemen',
        'ZM' => 'Zambia',
        'ZW' => 'Zimbabwe',
    ];

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
     * Get the environment name - or environment name for the next numerical value if it is exists
     *
     * @return  string|bool
     */
    public static function getEnvName(bool $nextEnv = false)
    {
        $envNumber = getenv('DMAW_ID');

        if ($nextEnv) {
            $envNumber++;

            //  If the env number if greater than the count then return false
            if ($envNumber > getenv('DMAW_COUNT')) {
                return false;
            }
        }

        return 'dmaw' . $envNumber;
    }

    /**
     * Create a customer model populated with random data
     *
     * @return Model\Customer
     */
    public static function createRandomCustomer(): Model\Customer
    {
        $account = self::createRandomAccount();

        $customer = new Model\Customer();
        $customer->setCustomerId($account->getCustomerId())
            ->setFirstName(self::FIRST_NAME_DATA[array_rand(self::FIRST_NAME_DATA)])
            ->setSurname(self::SURNAME_DATA[array_rand(self::SURNAME_DATA)])
            ->setDateOfBirth(self::createRandomDate(1950, 2000))
            ->setPassword(str_shuffle(uniqid() . uniqid()))
            ->setNationality(self::createRandomCountry())
            ->setAccount($account);

        return $customer;
    }

    /**
     * Create an account model populated with random data
     *
     * @return Model\Account
     */
    private static function createRandomAccount(): Model\Account
    {
        $transaction = self::createRandomTransaction();

        $account = new Model\Account();
        $account->setAccountId($transaction->getAccountId())
            ->setCustomerId(rand(1, 50))
            ->setOpened(self::createRandomDate(2010, 2020))
            ->setCountry(self::createRandomCountry())
            ->setTransaction($transaction);

        return $account;
    }

    /**
     * Create a transaction model populated with random data
     *
     * @return Model\Transaction
     */
    private static function createRandomTransaction(): Model\Transaction
    {
        $transaction = new Model\Transaction();
        $transaction->setTransactionId(rand(1, 50))
            ->setAccountId(rand(1, 50))
            ->setAmount(rand(100, 10000))
            ->setCurrency(self::createRandomCurrency())
            ->setWhen(self::createRandomDate(2020, 2022))
            ->setDrOrCr(rand(0, 1) ? 'dr' : 'cr');

        return $transaction;
    }

    /**
     * Create a country model populated with random data
     *
     * @return Model\Country
     */
    private static function createRandomCountry(): Model\Country
    {
        $iso2 = array_rand(self::COUNTRY_DATA);

        $country = new Model\Country();
        $country->setIso2($iso2)
            ->setName(self::COUNTRY_DATA[$iso2]);

        return $country;
    }

    /**
     * Create a currency model populated with random data
     *
     * @return Model\Currency
     */
    private static function createRandomCurrency(): Model\Currency
    {
        $code = array_rand(self::CURRENCY_DATA);

        $currency = new Model\Currency();
        $currency->setCode($code)
            ->setName(self::CURRENCY_DATA[$code]);

        return $currency;
    }

    /**
     * Create a date time string populated with a random date between two years
     *
     * @param int $minYear
     * @param int $maxYear
     * @return string
     */
    private static function createRandomDate(int $minYear, int $maxYear): string
    {
        $day = rand(1, 31);
        $month = rand(1, 12);
        $year = rand($minYear, $maxYear);

        //  Check that the day can be used with the month
        if ($day > 30 && in_array($month, [4, 6, 9, 11])) {
            $day = 30;
        } elseif ($day > 28 && $month == 2) {
            $day = 28;
        }

        return implode('/', [
           $day,
           $month,
           $year,
        ]);
    }

    /**
     * Get a small array containing some comparison data based on the contents of the models
     *
     * @param Model\AbstractModel $model1
     * @param Model\AbstractModel $model2
     * @return array
     */
    public static function getComparisonHashes(Model\AbstractModel $model1, Model\AbstractModel $model2): array
    {
        return [
            'request' => self::getComparisonHash($model1),
            'response' => self::getComparisonHash($model2),
        ];
    }

    /**
     * Get a hash representing the model data
     *
     * @param Model\AbstractModel $model
     * @return string
     */
    public static function getComparisonHash(Model\AbstractModel $model): string
    {
        return hash('md5', serialize($model));
    }
}
