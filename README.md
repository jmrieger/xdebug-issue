## System
Docker - php-fpm 7.3.3, but also works this way on a 7.1 image, as well as my Mac OSX (Mojave 10.14.4) with the same PHP version installed via Homebrew

## Command
```
docker built -t xdebug-issue . 
docker run xdebug-issue:latest
```

## Expected Result:
```
Found 193 functions in file /Users/jrieger/Projects/sebastianbergmann/phpunit-fresh/src/Framework/Assert.php
...
[Some PHPUnit output]...
...
Found 193 functions in file /Users/jrieger/Projects/sebastianbergmann/phpunit-fresh/src/Framework/Assert.php
``` 

## Actual results
```
Found 193 functions in file /opt/phpunit/src/Framework/Assert.php


PHPUnit 8.3-gd4b252c04 by Sebastian Bergmann and contributors.

Runtime:       PHP 7.3.3 with Xdebug 2.7.2
Configuration: /opt/phpunit/phpunit.xml

.......                                                             7 / 7 (100%)

Time: 2.69 seconds, Memory: 54.00 MB

OK (7 tests, 11 assertions)


Code Coverage Report:       
  2019-06-12 19:14:25       
                            
 Summary:                   
  Classes:  1.36% (2/147)   
  Methods:  1.98% (24/1212) 
  Lines:    3.17% (287/9045)

\PHPUnit\Framework::PHPUnit\Framework\Assert
  Methods:   1.83% ( 3/164)   Lines:   1.18% (  8/679)
\PHPUnit\Framework::PHPUnit\Framework\Exception
  Methods:  25.00% ( 1/ 4)   Lines:  45.45% (  5/ 11)
\PHPUnit\Framework::PHPUnit\Framework\TestCase
  Methods:   7.69% (10/130)   Lines:  17.85% (143/801)
\PHPUnit\Framework::PHPUnit\Framework\TestResult
  Methods:   0.00% ( 0/59)   Lines:   8.31% ( 29/349)
\PHPUnit\Framework\Constraint::PHPUnit\Framework\Constraint\Constraint
  Methods:  16.67% ( 1/ 6)   Lines:  29.17% (  7/ 24)
\PHPUnit\Framework\Constraint::PHPUnit\Framework\Constraint\Exception
  Methods:  50.00% ( 2/ 4)   Lines:  15.79% (  3/ 19)
\PHPUnit\Framework\Constraint::PHPUnit\Framework\Constraint\ExceptionMessage
  Methods:  25.00% ( 1/ 4)   Lines:  25.00% (  4/ 16)
\PHPUnit\Framework\Constraint::PHPUnit\Framework\Constraint\IsEqual
  Methods: 100.00% ( 2/ 2)   Lines: 100.00% (  7/  7)
\PHPUnit\Util::PHPUnit\Util\Json
  Methods: 100.00% ( 3/ 3)   Lines: 100.00% ( 19/ 19)
\PHPUnit\Util::PHPUnit\Util\Test
  Methods:   3.03% ( 1/33)   Lines:  11.97% ( 62/518)
Found 2 functions in file /opt/phpunit/src/Framework/Assert.php
```
