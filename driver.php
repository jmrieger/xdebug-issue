<?php declare(strict_types=1);

use Jrieger\Xdebug\SampleClass;
use Jrieger\Xdebug\SampleStaticClass;

require_once 'SampleStaticClass.php';
require_once 'SampleClass.php';

$resultPrinter = static function (array $results, int $run): void {
    foreach ($results as $file => $result) {
        if (\strpos($file, 'SampleStaticClass.php') === false && \strpos($file, 'SampleClass.php') === false) {
            continue;
        }

        $expected = 8;
        if (\strpos($file, 'SampleClass.php')) {
            $expected = 4;
        }

        \printf(
            'Run %2d: Found %d functions in file %s, expected %d',
            $run,
            \count($result['functions']),
            $file,
            $expected
        );

        print PHP_EOL;
    }

    print PHP_EOL;
};

\xdebug_start_code_coverage(XDEBUG_CC_UNUSED | XDEBUG_CC_DEAD_CODE | XDEBUG_CC_BRANCH_CHECK);
$object1 = new SampleClass();
assert(SampleStaticClass::getField0() === '0');
assert(SampleStaticClass::getField1() === '1');
assert(SampleStaticClass::getField2() === '2');
assert($object1->getField0NonStatic() === '0');
assert($object1->getField1NonStatic() === '1');
assert($object1->getField2NonStatic() === '2');
$results = \xdebug_get_code_coverage();
$resultPrinter($results, 0);
\xdebug_stop_code_coverage(1);

\xdebug_start_code_coverage(XDEBUG_CC_UNUSED | XDEBUG_CC_DEAD_CODE | XDEBUG_CC_BRANCH_CHECK);
assert(SampleStaticClass::getField1() === '1');
assert($object1->getField1NonStatic() === '1');
$results = \xdebug_get_code_coverage();
$resultPrinter($results, 1);
\xdebug_stop_code_coverage(1);
