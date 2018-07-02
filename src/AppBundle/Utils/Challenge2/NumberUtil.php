<?php
/**
 * Created by PhpStorm.
 * User: duytc
 * Date: 7/1/18
 * Time: 11:09 PM
 */

namespace AppBundle\Utils\Challenge2;


class NumberUtil
{
    /**
     * @param $number
     * @param $digit
     * @return float|int
     */
    function countDigitInRangeMethod1($number, $digit)
    {
        if ($number < $digit) {
            return 0;
        }

        $d = (int)log10($number);
        $a = [];
        $a[0] = 0;
        $a[1] = 1;

        for ($i = 2; $i <= $d; $i++) {
            $a[$i] = 10 * $a[$i - 1] + pow(10, $i - 1);
        }

        $p = pow(10, $d);
        $mostSignificantDigit = (int)($number / $p);

        if ($mostSignificantDigit == $digit) {
            return ($mostSignificantDigit) * $a[(int)$d] + ($number - $p * $digit + 1) + $this->countDigitInRangeMethod1(($number - $p * $digit), $digit);
        }

        if ($mostSignificantDigit > $digit) {
            return ($mostSignificantDigit) * $a[(int)$d] + $p + $this->countDigitInRangeMethod1((int)($number - $p * $mostSignificantDigit), $digit);
        }

        return $mostSignificantDigit * $a[(int)$d] + $this->countDigitInRangeMethod1((int)($number - $p * $mostSignificantDigit), $digit);
    }

    /**
     * @param $digit
     * @param $inputNumber
     * @return int
     */
    public function countDigitInRangeMethod2($inputNumber, $digit)
    {
        $concatStr = '';
        for ($i = 0; $i <= $inputNumber; $i++) {
            $concatStr = $concatStr . $i;
        }

        return substr_count($concatStr, $digit);
    }

}