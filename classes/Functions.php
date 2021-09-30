<?php

// static functions inside the classes, these functions are used to test the code and prepare for git repo

// this is the actuall class where we have defined the static utility methods for our ease
// in coding the soluitions, i did the same in java and created many classes that are helpful while
// building other mini projects and solutions
// solution word is used for c# programmers, when they build their solution in visual studio, that is called solution

namespace Utils;

// this class has many utility methods that we need, a type of new concept for me

use Exception;

class Functions {

    // this is not working
    // private static $nextLine = "\r\n";
    // PHP_EOL not working too

    private static $nextLine = "<br>";
    private static $lineBreak = "\n";       // this will work for only in command line
    private static $pi = PI;
    private static $dayInYear = 365;
    private static $secondsInDay = 86400;
    private static $lowerLetters = 'abcdefghiklmnopqrstuvwxyz';
    private static $upperLetters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    private static $digits = '0123456789';

    private static $charsArray = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

    public static function getCircumferance(float $radius): float {
        return 2.0 * PI * $radius;
    }

    public static function getSquare(float $length): float {
        return $length * $length;
    }

    public static function getCircleArea(float $radius): float {
        return self::getPi() * abs($radius) * abs($radius);
    }

    public static function getPi() {
        return PI;
    }

    public static function getIslamicScholerNames(): array {
        return [
            "Allama Khadim Hussain",
            "Allama Raza Saqib Mustafai",
            "Allama Saqib shami",
            "Allama Ilyas Qadri",
            "Allama Imran Attari",
            "Allama mufti taqi usmani",
            "Allama mufti abdul wahid qureshi",
            "Allama mufti naeem uddeen",
            "Allama tahir ul qadri",
            "Allama saeed ahmad Mujaddadi",
            "Allama mufti mengal",
            "Allama mufti ashraf jalali",
            "Allama mufti akmal",
            "Allama Shafeeq Ameeni",
            "Allama Ahmad Shah Bukhari",
            "Allama Saad Hussain Rizvi",
            "Allama aasim rizvi jehlum",
            "Allama Ajmal qadri rahwali"
        ];
    }

    public static function pushElementsIntoArray(array $array, ...$elements): void {
        foreach ($elements as $values) {
            $array[] = $values;
        }
    }

    // these are the demo methods for variadic functions, read "php notes for professionals"
    public static function getMaxFromParams(int ...$params): int {
        return self::getMax($params);
    }

    public static function getMax(array $array): int {
        if (empty($array) === false) {
            $tempMax = $array[0];
            foreach ($array as $value) {
                if ($value > $tempMax) {
                    $tempMax = $value;
                }
            }
            return $tempMax;
        }
        return NULL;
    }

    public static function printTable(int $tableNum): void {
        filter_var($tableNum, FILTER_SANITIZE_NUMBER_INT);      // 519
        self::checks($tableNum);
        if (is_int($tableNum)) {
            $tableLimit = 10;
            for ($i = 1; $i <= $tableLimit; $i++) {
                echo "$tableNum x $i = " . ($i * $tableNum) . self::$nextLine;
            }
            echo self::$nextLine . self::$nextLine;
        }
    }

    private static function checks(&$variable): void {
        if ($variable < 1 || $variable > 999) {
            $variable = 16;
        }
    }

    public static function countOccurences(int $target, array $array): int {
        if (empty($array) === false) {
            $counter = 0;
            foreach ($array as $value) {
                if ($target === $value) {
                    $counter++;
                }
            }
            return $counter;
        }
        return -1;
    }

    public static function printArray(...$arguments): void {
        self::printFormattedArray($arguments);
    }


    // & can be used before the ... and after the type (int string float etc) if any
    // look, we can use the & with the variadic paramters too, just after the type, if there is not type, write &...$args
    // objects are always passed by reference , we don't need to write  &..$numbers

    public static function printFormattedArray(array $array): void {
        echo self::$nextLine . "<pre>";
        print_r($array);
        echo "</pre>" . self::$nextLine;
    }

    public static function assignRandomValues(int ...$numbers): void {
        // we are picking up each values, and then assigning them the random numbers
        foreach ($numbers as &$value) {     // see the & here and in the method signature
            try {
                $value = random_int(20, 99);
            } catch (Exception $e) {
                // maybe this line is wrong
                echo $e->getMessage() . (int)($e->getCode());
            }
        }
    }

    // return the table array, if passed 5, then the array will be [5, 10, 15 ..... 50] int
    public static function getSum(int ...$numbers): int {
        // we are getting the ... $numbers as an array, REMEMBERS
        $sum = 0;
        foreach ($numbers as $value) {
            $sum += $value;
        }
        return $sum;
    }

    /**
     * gets the table of the given number, if given 2, then 2 4 6 8 ..... 20 will be returned as array of ints
     * @param int $tableNum
     * @return array the returned array filled the table values
     */
    public static function getTableArray(int $tableNum): array {
        if (is_numeric($tableNum)) {
            abs($tableNum);
            $tableArray = [];
            for ($i = 0; $i <= 10; $i++) {
                $tableArray[] = ($tableNum * ($i + 1));
            }
            return $tableArray;
        }
        return null;
    }

    /**
     * multiply all the given paramters and return the product
     * the demo of awesome variadic functions, thanks php for awesome functions
     * @param int ...$args
     * @return int
     */
    public static function getProduct(int ...$args): int {
        $product = 1;
        foreach ($args as $value) {
            $product *= $value;
        }
        return $product;
    }

    /**
     * generates a random number of given length
     * @param int $length of the number to
     * @return int the random number
     */
    public static function getRanomNumLen(int $length): int {
        if (!empty($length) && is_int($length)) {
            $min = 10 ** ($length - 1);
            $max = 10 ** $length;
            try {
                return random_int($min, $max);
            } catch (Exception $e) {
                echo $e->getMessage() . (int)($e->getCode());
            }
        }
        return -1;
    }

    /**
     * the practice of awesome variadic functions for practicing,
     *
     * @param int ...$numbers
     * @return int average of numbers given
     */
    public static function getAverage(int ...$numbers): int {
        $argumentLengh = count($numbers);
        $sum = 0;
        foreach ($numbers as $value) {
            $sum += $value;
        }
        return $sum / $argumentLengh;
    }

    /**
     * the awesome variadic functions, the parameters that are limitless, they are used and manipulated
     * @param array ...$arguments
     * @return string
     */
    public static function variadic_function(...$arguments): string {
        return json_encode($arguments, JSON_THROW_ON_ERROR);
    }

    public static function printTableToLimit(int $tableNum, int $limit): void {
        filter_var($tableNum, FILTER_SANITIZE_NUMBER_INT);
        filter_var($limit, FILTER_SANITIZE_NUMBER_INT);
        self::checks($tableNum);
        self::checks($limit);
        if (is_int($tableNum) && is_int($limit)) {
            for ($i = 1; $i <= $limit; $i++) {
                echo "$tableNum x $i = " . ($tableNum * $i) . self::$nextLine;
            }
        }
    }

    /**
     * another array for testing random numbers over array
     * @param int $arrayLength
     * @param int $lowerLimit
     * @param int $upperLimit
     * @return array filleld with random numbers
     */
    public static function getRandomArrayOfSize(int $arrayLength, int $lowerLimit, int $upperLimit): array {
        if ($arrayLength < 1 || $arrayLength > 999) {
            $arrayLength = 50;
        }
        $array = [];
        for ($i = 1; $i <= $arrayLength; $i++) {
            try {
                $array[$i] = random_int($lowerLimit, $upperLimit);
            } catch (Exception $e) {
            }
        }
        return $array;
    }

    /**
     * test array for generating and returning the array of random numbers between the given limits
     * @param int $lowerLimit
     * @param int $upperLimit
     * @return array
     */
    public static function getRandomNumArray(int $lowerLimit, int $upperLimit): array {
        filter_var($lowerLimit, FILTER_SANITIZE_NUMBER_INT);
        filter_var($upperLimit, FILTER_SANITIZE_NUMBER_INT);
        self::varCheck($lowerLimit);
        self::varCheck($upperLimit);
        if ($lowerLimit > $upperLimit) {
            self::swapValues($lowerLimit, $upperLimit);
        } else if ($upperLimit === $lowerLimit) {
            $upperLimit += 50;
        }
        $arrayLength = 100;
        $array = [];        // arrays are dynamic in php, they can't be pre-sized to a certain limit
        for ($i = 0; $i <= $arrayLength; $i++) {
            try {
                $array[$i] = random_int($lowerLimit, $upperLimit);
            } catch (Exception $e) {
            }        // we dont need to swap the values, it does automatically
        }
        return $array;
    }

    /**
     * checks the variables if in the proper limit and value
     * @param $variable
     * @return int
     */
    private static function varCheck(&$variable): int {
        if (is_numeric($variable)) {
            if ($variable < 1 || $variable > 1000) {
                return $variable = 50;
            }
        }
        return null;
    }

    /**
     * swap two values, the method get values by passed by referene
     * @param $firstValue
     * @param $secondValue
     */
    public static function swapValues(&$firstValue, &$secondValue): void {
        $temp = $firstValue;
        $firstValue = $secondValue;
        $secondValue = $temp;
    }

    /**
     * Returns the array filled with random numbers given between the range
     * @param int $lowerValue the lower limit
     * @param int $upperLimit the upper limit
     * @param int $arrayLength the size of the array
     * @return array filled with random numbers
     * @throws Exception
     */
    public static function getArrayRandom(int $lowerValue = 10, int $upperLimit = 99, int $arrayLength = 20): array {
        $filledArray = [];
        if (is_numeric($lowerValue) && is_numeric($upperLimit) && is_numeric($arrayLength)) {
            for ($i = 0; $i < $arrayLength; $i++) {
                $filledArray[$i] = random_int($lowerValue, $upperLimit);
            }
            return $filledArray;
        }
        return null;
    }

    /**
     * print the string to the number of times
     * @param string $string
     * @param int $times
     */
    public static function printTimes(string $string, int $times): void {
        for ($i = 1; $i <= $times; $i++) {
            echo $string . self::$nextLine;
        }
    }

    /**
     * makes the word plural "apple" to "apples"
     * @param string $word
     */
    public static function pluralize(string &$word): void {
        if (substr($word, -1) === 'y') {
            $word = substr($word, 0, -1) . 'ies';
        } else {
            $word .= 's';
        }
    }

    public static function getLowerRandomString(int $stringLength = 10): string {
        $masterString = "";
        for ($i = 1; $i <= $stringLength; $i++) {
            $masterString .= self::$lowerLetters[random_int(0, 26)];
        }
        return $masterString;
    }

    public static function getRandomString(int $stringLength = 10): string {
        $masterString = "";
        $charsLength = strlen(self::$charsArray);
        for ($i = 1; $i <= $stringLength; $i++) {
            $masterString .= self::$charsArray[random_int(0, $charsLength)];
        }
        return $masterString;
    }

    public static function getUltimateRandomString(int $stringLength = 10): string {
        return substr(md5(self::getRandomString($stringLength)), 0, $stringLength);
    }

    public static function getUpperRandomString(int $stringLength = 10): string {
        $masterString = "";
        for ($i = 1; $i <= $stringLength; $i++) {
            $masterString .= self::$upperLetters[random_int(0, 26)];
        }
        return $masterString;
    }

}

