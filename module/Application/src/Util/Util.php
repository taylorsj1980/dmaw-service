<?php

namespace Application\Util;

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
     * Create a date time string populated with a random date between two years
     *
     * @param int $minYear
     * @param int $maxYear
     * @return string
     */
    public static function createRandomDate(int $minYear, int $maxYear): string
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
}
