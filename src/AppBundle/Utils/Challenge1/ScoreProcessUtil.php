<?php

namespace AppBundle\Utils\Challenge1;


use Exception;

class ScoreProcessUtil
{
    static $SUPPORTED_SORT_TYPE = ['asc', 'des'];
    /**
     * @var string
     */
    private $jsonScores;

    /**
     * ScoreProcessUtil constructor.
     * @param string $jsonScores
     * @throws Exception
     */
    public function __construct($jsonScores = '')
    {
        $this->jsonScores = json_decode($jsonScores, true);

        $error = json_last_error();
        if ($error != JSON_ERROR_NONE) {
            throw new Exception(sprintf('Invalid json input, %s', $error));
        }
    }

    /**
     * @param string $sortType
     * @return array
     * @throws Exception
     */
    public function getAverageScoredScores($sortType = 'asc')
    {
        $aveScores = [];
        foreach ($this->jsonScores as $inputScore) {
            if (!is_array($inputScore)) {
                continue;
            }
            foreach ($inputScore as $game => $score) {
                if (!array_key_exists($game, $aveScores)) {
                    $aveScores[$game] = $score / count($this->jsonScores);
                    continue;
                }

                $aveScores[$game] += $score / count($this->jsonScores);
            }
        }

        if (!in_array($sortType, self::$SUPPORTED_SORT_TYPE)) {
            throw new Exception(sprintf('Not support sorting type = %s', $sortType));
        }

        $sortType == 'asc' ? asort($aveScores) : arsort($aveScores);

        return $aveScores;
    }
}