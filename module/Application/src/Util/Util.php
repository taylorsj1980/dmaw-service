<?php

namespace Application\Util;

use DateTime;

/**
 * Utility class for helper functions
 */
class Util
{
    /**
     * Get the next environment name based on the current environment
     * If this is the last environment then return the first environment name if allowed to do so - return false if not
     *
     * @param   bool    $allowFirst
     * @return  string|bool
     */
    public static function getNextEnvName(bool $allowFirst = false)
    {
        //  Determine which is the "next" service
        $nextEnvId = getenv('DMAW_ID') + 1;
        $dmawEnvCount = getenv('DMAW_COUNT');

        //  If we're at the last env them just use the first one
        if ($nextEnvId > $dmawEnvCount) {
            if (!$allowFirst) {
                return false;
            }

            $nextEnvId = 1;
        }

        return 'dmaw' . $nextEnvId;
    }

    /**
     * Create a DateTime model populated with a random date between two years
     *
     * @param int $minYear
     * @param int $maxYear
     * @return DateTime
     */
    public static function createRandomDate(int $minYear, int $maxYear): DateTime
    {
        $year = rand($minYear, $maxYear);
        $month = rand(1, 12);
        $day = rand(1, 31);

        $date = new DateTime();
        $date->setDate($year, $month, $day);

        return $date;
    }
}
