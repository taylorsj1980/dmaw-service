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
        'AR' => 'Argentina',
        'AU' => 'Australia',
        'AT' => 'Austria',
        'BE' => 'Belgium',
        'BR' => 'Brazil',
        'BG' => 'Bulgaria',
        'CA' => 'Canada',
        'CN' => 'China',
        'CO' => 'Colombia',
        'HR' => 'Croatia',
        'CU' => 'Cuba',
        'CY' => 'Cyprus',
        'CZ' => 'Czechia',
        'DK' => 'Denmark',
        'EG' => 'Egypt',
        'EE' => 'Estonia',
        'FI' => 'Finland',
        'FR' => 'France',
        'DE' => 'Germany',
        'GR' => 'Greece',
        'HK' => 'Hong Kong',
        'HU' => 'Hungary',
        'IS' => 'Iceland',
        'IN' => 'India',
        'IE' => 'Ireland',
        'IT' => 'Italy',
        'JP' => 'Japan',
        'LI' => 'Liechtenstein',
        'MX' => 'Mexico',
        'NL' => 'Netherlands',
        'NZ' => 'New Zealand',
        'NO' => 'Norway',
        'PK' => 'Pakistan',
        'PL' => 'Poland',
        'PT' => 'Portugal',
        'SG' => 'Singapore',
        'SK' => 'Slovakia',
        'SI' => 'Slovenia',
        'ZA' => 'South Africa',
        'ES' => 'Spain',
        'SE' => 'Sweden',
        'CH' => 'Switzerland',
        'TH' => 'Thailand',
        'TR' => 'Turkey',
        'AE' => 'United Arab Emirates',
        'US' => 'United States',
        'GB' => 'United Kingdom',
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
        'DKK' => 'Danish Krone',
        'EGP' => 'Egyptian Pound',
        'EUR' => 'Euro',
        'HKD' => 'Hong Kong Dollar',
        'ISK' => 'Iceland Krona',
        'INR' => 'Indian Rupee',
        'MXN' => 'Mexican Peso',
        'NZD' => 'New Zealand Dollar',
        'NOK' => 'Norwegian Krone',
        'GBP' => 'Pound Sterling',
        'ZAR' => 'South African Rand',
        'SEK' => 'Swedish Krona',
        'CHF' => 'Swiss Franc',
        'THB' => 'Thai Baht',
        'TRY' => 'Turkish Lira',
        'AED' => 'UAE Dirham',
        'USD' => 'US Dollar',
        'JPY' => 'Yen',
        'CNY' => 'Yuan Renminbi',
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
