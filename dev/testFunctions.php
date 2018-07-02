<?php

namespace SpringOffChallenge\dev;

use AppBundle\Utils\Challenge1\ScoreProcessUtil;
use AppBundle\Utils\Challenge2\NumberUtil;
use AppKernel;
use stdClass;
use Symfony\Component\DependencyInjection\ContainerInterface;

$loader = require_once __DIR__ . '/../app/autoload.php';
require_once __DIR__ . '/../app/AppKernel.php';

$kernel = new AppKernel('dev', true);
$kernel->boot();

/** @var ContainerInterface $container */
$container = $kernel->getContainer();

$test = 1;

$inputJsonScores = '{
    "john": {
    "mario": 1,
    "megaman": 2,
    "doom": 3,
    "csgo": 4,
    "half-life": 5,
    "metro 2033": 6,
    "crysis": 7,
    "portal 2": 8,
    "farcry 3": 9,
    "dota": 10
    },
"peter": {
    "mario": 9,
    "megaman": 10,
    "doom": 1,
    "csgo": 7,
    "half-life": 2,
    "metro 2033": 6,
    "crysis": 5,
    "portal 2": 4,
    "farcry 3": 3,
    "dota": 8
    },
"matt": {
    "mario": 8,
    "megaman": 9,
    "doom": 3,
    "csgo": 2,
    "half-life": 1,
    "metro 2033": 5,
    "crysis": 6,
    "portal 2": 7,
    "farcry 3": 4,
    "dota": 10
    }
}';

try {
    $scoreProcessing = new ScoreProcessUtil($inputJsonScores);
    $scores = $scoreProcessing->getAverageScoredScores('asc');

} catch (\Exception $e) {

}


$numberUtil = new NumberUtil();
$result1 = $numberUtil->countDigitInRangeMethod2(2018, 1);
$result2 = $numberUtil->countDigitInRangeMethod1(2018, 1);

$endTest = 1;







