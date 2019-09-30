<?php
/**
 * Author: Vikash Kumar Shrivastva <vkshrivastva@gmail.com>
 * Date: 2019-09-30
 * Time: 05:31
 * @license          Proprietary
 * @copyright        All rights reserved.
 */

namespace App\Libraries;


class Fixture
{
    /**
     * Temporary array
     * @var array
     */
    private $temp = [];

    /**
     * Array to pairs rounds
     * @var Array
     */
    private $pairRounds = [];

    /**
     * Array to odds rounds
     * @var Array
     */
    private $oddRounds = [];

    /**
     * Counter or number of games
     * @var int
     */
    private $gamesCount = 0;

    /**
     * Counter of number of teams
     * @var int
     */
    private $teamsCount = 0;

    /**
     * Construct
     *
     * @param Array $teams Array with the teams names
     *
     * @return boolean
     */
    /**
     * Fixture constructor.
     *
     * @param array $teams
     */
    public function __construct(array $teams)
    {
        $this->setup($teams);
    }

    /**
     * This method will perform the initial gameCount teams count operations
     * @param array $teams
     *
     * @return bool
     */
    private function setup(array $teams): bool
    {
        if (is_array($teams)) {
            shuffle($teams);
            $this->teamsCount = count($teams);
            if ($this->teamsCount % 2 == 1) {
                $this->teamsCount++;
                $teams[] = "free round";
            }
            $this->gamesCount = floor($this->teamsCount / 2);
            for ($i = 0; $i < $this->teamsCount; $i++) {
                $this->temp[] = $teams[$i];
            }

            return true;
        } else {
            return false;
        }
    }

    /**
     * This method will create the starting round
     * @return array
     */
    private function init(): array
    {
        for ($x = 0; $x < $this->gamesCount; $x++) {
            $this->pairRounds[$x][0] = $this->temp[$x];
            $this->pairRounds[$x][1] = $this->temp[($this->teamsCount - 1) - $x];
        }

        return $this->pairRounds;
    }

    /**
     * This method will return the Full Schedule and match
     * @return array
     */
    public function getSchedule(): array
    {
        $schedule   = [];
        $schedule[] = $this->init();
        for ($i = 1; $i < $this->teamsCount - 1; $i++) {
            if ($i % 2 == 0) {
                $schedule[] = $this->getPairRound();
            } else {
                $schedule[] = $this->getOddRound();
            }
        }

        return $schedule;
    }

    /**
     * This method will create the matches for a pair round
     * @return array
     */
    private function getPairRound(): array
    {
        for ($z = 0; $z < $this->gamesCount; $z++) {
            if ($z == 0) {
                $this->pairRounds[$z][0] = $this->oddRounds[$z][0];
                $this->pairRounds[$z][1] = $this->oddRounds[$z + 1][0];
            } elseif ($z == $this->gamesCount - 1) {
                $this->pairRounds[$z][0] = $this->oddRounds[0][1];
                $this->pairRounds[$z][1] = $this->oddRounds[$z][1];
            } else {
                $this->pairRounds[$z][0] = $this->oddRounds[$z][1];
                $this->pairRounds[$z][1] = $this->oddRounds[$z + 1][0];
            }
        }

        return $this->pairRounds;
    }

    /**
     * This method will create the matches for the odd round
     * @return array
     */
    private function getOddRound(): array
    {
        for ($j = 0; $j < $this->gamesCount; $j++) {
            if ($j == 0) {
                $this->oddRounds[$j][0] = $this->pairRounds[$j][1];
                $this->oddRounds[$j][1] = $this->pairRounds[$this->gamesCount - 1][0];
            } else {
                $this->oddRounds[$j][0] = $this->pairRounds[$j][1];
                $this->oddRounds[$j][1] = $this->pairRounds[$j - 1][0];
            }
        }

        return $this->oddRounds;
    }
}