# PHP Docs & Notes <!-- omit from toc -->

This document is a reference guide for PHP programming. It is a bit more than a simple cheat sheet, but it is not a learning book, you need to have some knowledge and experience with PHP programming to understand these notes.


## Table of contents <!-- omit from toc -->

- [Install](#install)
  - [CLI vs Web Server](#cli-vs-web-server)
  - [Check](#check)
  - [Linux](#linux)
  - [macOS](#macos)
  - [Windows](#windows)
- [Shebang line](#shebang-line)
- [Syntax](#syntax)
- [Variables and constants](#variables-and-constants)
  - [Introduction](#introduction)
  - [Data types](#data-types)
  - [Passing by value or reference](#passing-by-value-or-reference)
- [Operators](#operators)
- [echo, format, input](#echo-format-input)
  - [echo](#echo)
  - [Format string](#format-string)
  - [Read input line](#read-input-line)
- [Strings](#strings)
  - [Single vs Double quotes](#single-vs-double-quotes)
  - [Multi-line strings](#multi-line-strings)
  - [Common functions](#common-functions)
  - [Regular expression](#regular-expression)
- [Arrays](#arrays)
  - [Onedimensional](#onedimensional)
  - [Multidimensional](#multidimensional)
  - [Common functions](#common-functions-1)
  - [Add element](#add-element)
  - [Remove element](#remove-element)
  - [Case-sensitive search](#case-sensitive-search)
  - [In-place sort](#in-place-sort)
  - [Slice](#slice)
  - [Merge](#merge)
- [Conditions](#conditions)
  - [Truthy and Falsy](#truthy-and-falsy)
  - [Loose and Strict comparison](#loose-and-strict-comparison)
  - [if](#if)
  - [Ternary operator](#ternary-operator)
  - [switch-case](#switch-case)
  - [try-except](#try-except)
    - [Introduction](#introduction-1)
    - [Purpose of finally](#purpose-of-finally)
- [Loops](#loops)
  - [while](#while)
  - [for](#for)
  - [foreach](#foreach)
    - [Indexed array](#indexed-array)
    - [Key-value array](#key-value-array)
    - [Object properties](#object-properties)
- [Functions](#functions)
- [Classes](#classes)
  - [Basics](#basics)
  - [Inheritance](#inheritance)
  - [Interfaces](#interfaces)
- [Include PHP files](#include-php-files)
  - [include and require](#include-and-require)
  - [Useful constants and variables](#useful-constants-and-variables)
  - [Direct run check](#direct-run-check)
- [Packages](#packages)
  - [Use](#use)
  - [Manage](#manage)
  - [Examples of packages](#examples-of-packages)
- [Math](#math)
- [Random](#random)
- [Time](#time)
- [Date/Time](#datetime)
- [JSON](#json)
- [I/O and processes](#io-and-processes)
  - [Binary and text mode](#binary-and-text-mode)
  - [Read file](#read-file)
  - [Write file](#write-file)
  - [stdin stdout stderr](#stdin-stdout-stderr)
  - [File operations](#file-operations)
  - [Environment variables](#environment-variables)
  - [Arguments](#arguments)
  - [Exit process](#exit-process)
  - [Execute process](#execute-process)


## Install

### CLI vs Web Server

PHP can be run through a web server or from the command line. To run it through a web server on your local machine install a LAMP (Linux Apache MySQL PHP), MAMP (Mac Apache MySQL PHP) or a WAMP (Windows Apache MySQL PHP). To use it as command line interpreter follow the next sections.

### Check

To see whether PHP is already installed, in your terminal run:

```
php -v
```

### Linux

To install on Debian/Ubuntu:

```
sudo apt install php-cli
```

### macOS

To install using [Homebrew](https://brew.sh/):

```
brew install php
```

### Windows

For Windows [download](https://windows.php.net/download/) the Non-Thread-Safe (NTS)package and unzip it to like `C:\php`. Now add the chosen folder to your `PATH`. Copy `php.ini-development` to `php.ini`.


## Shebang line

Under Linux/macOS to be able to execute a PHP script without invoking it through `php`, make it executable and add a shebang line at the top of the file:

```bash
#!/usr/bin/env php
```


## Syntax

PHP is **case-sensitive**. A PHP block starts at `<?php` and ends with `?>` or at the end of the file. Comments start at `#` or `//` and end with the line or with the current block of PHP code, whichever comes first. Multi-line comments start with `/*` and end at the first `*/` encountered. 

PHP programmers use both **snake_case** and **camelCase**; class names should be written in **PascalCase**.

Statements are terminated by a **semicolon**.

Most PHP style guides recommend **indenting** by **four spaces** rather than using a tab.

PHP uses **zero based indexing**.


## Variables and constants

### Introduction

Variables are prefixed by a `$`, both when assigned and used. Constants are declared at compile time with `const NAME = value` or at run time through `define('NAME', value)`.

A variable is global if it is used at the top level (outside any function definition) or if it is declared inside a function with the `global` keyword. A function must use the `global` keyword to access a global variable.

### Data types

```php
null, bool, int, float, string, array, object, resource
```

There is only one value of type `null`, and that is the case-insensitive constant `null`. Arrays accessed with an undefined key, undefined variables and variables passed to `unset()`, are all regarded as `null`, but testing them raises a warning. That warning can be avoided by using `isset()`, which checks whether a variable has been declared and is not `null`.

The `int` data type is always signed, and its size depends from the platform (32-bit vs 64-bit), see the `PHP_INT_SIZE`, `PHP_INT_MAX` and `PHP_INT_MIN` constants. In PHP there is no difference between `float` and `double`, in fact `double` is an alias of `float`. There are the `PHP_FLOAT_MIN` and `PHP_FLOAT_MAX` constants.

The `resource` data type holds a reference to an external resource, such as a database connection or a file handler.

```php
$my_null = null;  // null
$my_bool = true;  // true/false
$num = 10;        // int
$num = 012;       // octal
$num = 0x0A;      // hexadecimal
$num = 0b1010;    // binary
$num = 3.1415;    // float
$num = (int)$num; // cast to int
```
- Use `var_dump()` or `print_r()` to view the variable details.

### Passing by value or reference

- *For non-object data types including arrays*: function arguments are **passed-by-value**. To **pass-by-reference** prepend an `&` to the argument name in the function definition. Variable assignments involve **value copying**. Use the reference operator to **copy-by-reference**, for example `$var2 = &$var1`. Functions do also **return-by-value**. To have a function **return-by-reference**, prepend the function declaration name with an `&` and when assigning the return value to a variable, you probably want an assignment-by-reference with another `&`.

- *For object data types*: an object variable doesn't contain the object itself as value. It only contains an object identifier which follows the rules for non-object data-types; from that it follows that **objects are passed-by-references**.


## Operators

```
Assign:           = += -= *= /= **= %=
Pre inc/dec:      ++$x --$x
Post inc/dec:     $x++ $x--
Math:             + - * / %
Exponentiation:   **
Comparison:       < <= > >= == != === !==
Boolean:          && || !
Bitwise:          ~ | & ^
Shift:            << >>
String concat:    . .=
```
- The division operator `/` performs a floating-point division, but it returns an `int` when the two operands are `int` and the result is an integer number.
- Operands of the modulo operator `%` are converted to `int` before processing.


## echo, format, input

### echo

`echo` is not a function but a language construct, it outputs one or more expressions separated by commas; no newlines or spaces are printed. 

```php
echo "Hello", "World!", "\n";
echo "Hello" . "World!" . "\n";

// Can use ANSI escape codes
echo "\033[31mRED\033[0m\n";
```

### Format string

```php
$num = 3;
$location = 'tree';
$format = "There are %d monkeys in the %s\n";
printf($format, $num, $location);
echo sprintf($format, $num, $location);
```

### Read input line

```php
$n = readline('Enter a number: ');
printf('Your number+1 is %d', (int)$n+1);
```


## Strings

### Single vs Double quotes

**Single-quoted** strings are almost not interpreted, except for `'\\'` and `'\''`. **Double-quoted** strings support escape sequences like `"\n"` and many more, and variables are evaluated. Delimit a variable name with curly braces, for example `"{$foo}bar"`.

### Multi-line strings

```php
$multiline1 = "line1
line2";
echo $multiline1 . "\n";

$multiline2 = 'line1
line2';
echo $multiline2 . "\n";
```

### Common functions

```php
$s = strtoupper($s);
$s = strtolower($s);
$len = strlen($s);
$s = trim($s);  // trim whitespaces
$s = ltrim($s); // trim left whitespaces
$s = rtrim($s); // trim right whitespaces
$pos = strpos($s, $substr);  // false if not found
$pos = strrpos($s, $substr); // false if not found
$s = substr($s, $start, $len);
$arr = explode($sep, $s);    // $sep is a string
$s = implode($sep, $arr);    // $sep is a string
$s = str_replace($search, $repl, $s); // replace all
```

### Regular expression

```php
// The PCRE regex
$pattern = '/../ims'; // use single-quotes

// Search $pattern, $matches is optional,
// returns 1 on match, otherwise 0
if (preg_match($pattern, $s, $matches))
    print_r($matches[0]);

// Split at $pattern delimiter
$arr = preg_split($pattern, $s);

// Replace all $pattern matches
$s = preg_replace($pattern, $replacement, $s);
```
- `$matches[0]` is the match.
- `$matches[1]..$matches[count($matches)-1]` are the grouping matches.
- When replacing `preg_match` with `preg_match_all`, the return value is the number of matches and `$matches` is an array of arrays.
- The `i` flag means to ignore the case.
- The `m` flag specifies a multiline match. If it is used, `^` and `$` change from matching at only the start or end of the entire string to the start or end of any line within the string. 
- The `s` flag makes the dot also match line breaks.


## Arrays

Arrays in PHP are ordered maps, where each value is associated to a unique numeric/string key. Numeric keys must be of type `int` and string keys are of type `string`. Note that string keys having a valid integer representation are converted to numeric keys. When initializing an array with duplicated keys, the later values win.

### Onedimensional

```php
// Numeric keys
$arr = array(1, 2, 3);
$arr = [1, 2, 3]; // short syntax
$arr = ['val1', 'val2'];
$arr = [0 => 'val1', 1 => 'val2'];
echo $arr[0];

// String keys
$arr = ['key1' => 'val1', 'key2' => 'val2'];
echo $arr['key1'];
```

### Multidimensional

Multidimensional arrays are simply arrays which have other arrays as elements.

```php
$arr = [
    'arr1' => [1, 2, 3],
    'arr2' => [4, 5, 6]
];
echo $arr['arr1'][0];
```

### Common functions

```php
$c = count($arr);
$vals = array_values($arr); // re-index
$keys = array_keys($arr);
$arr = array_combine($keys, $vals);
$arr = array_unique($arr);  // remove duplicates
```

### Add element

```php
// Append
// Note: keys remain untouched
$arr[] = $val;
$arr[$key] = $val;

// Prepend value
// Note: numeric keys are reset to start at 0
array_unshift($arr, $val);

// Prepend key-value
$arr = [$key => $val] + $arr;
```

### Remove element

```php
// Remove given element
// Note: keys remain untouched
unset($arr[2]);
unset($arr['key1']);

// Remove last element
// Note: keys remain untouched
$lastval = array_pop($arr);

// Remove first element
// Note: numeric keys are reset to start at 0
$firstval = array_shift($arr);
```

### Case-sensitive search

```php
$b = in_array($val, $arr);
$key = array_search($val, $arr); // false if not found
$b = array_key_exists($key, $arr);
```

### In-place sort

```php
sort($arr);   // resets keys to 0..count($arr)-1
rsort($arr);  // reverse sort()
asort($arr);  // maintains key-value association
arsort($arr); // reverse asort()
ksort($arr);  // sort by key
krsort($arr); // reverse ksort()
```

### Slice

```php
// $preserve_keys defaults to false, that will reorder 
// and reset integer keys (not string keys)
$arr = array_slice($arr, $offset, $len, $preserve_keys);
```

### Merge

```php
// Left-side key wins when duplicated
$arr = $a + $b;

// 1. For non-numeric keys the later ones win
// 2. For numeric keys the resulting array 
//    gets the keys reset and starting at 0
$arr = array_merge($a, $b);
$arr = [...$a, ...$b]; // spread operator
$arr = [...$a, 5, ...$b];
$arr = ['key' => 'val', ...$a, ...$b];
```


## Conditions

### Truthy and Falsy

The terms **truthy** and **falsy** refer to values that are not of type `bool` but, when interpreted, assume the values of `true` and `false`.

- **Falsy**: `null`, **zero** of any numeric type, **empty** arrays, **empty** strings and the string `'0'`.

- **Truthy**: all the others, including `NAN`.

### Loose and Strict comparison

- [Loose comparison](https://www.php.net/manual/types.comparisons.php#types.comparisions-loose): only the values are compared, if the variables have a different data type, then a type conversion happens before the comparison. The operators are `< <= > >= == !=`.

- [Strict comparison](https://www.php.net/manual/types.comparisons.php#type.comparisons-strict): both data type and value must match. The operators are `=== !==`.
 
### if

```php
if (condition1) {
    // condition1 is true
} elseif (condition2) {
    // condition1 is false
    // and
    // condition2 is true
} else {
    // both are false
}
```

### Ternary operator

If `condition` is `true`, `$res` is `val1`, otherwise it is `val2`:

```php
$res = condition ? val1 : val2;
```

### switch-case

As opposed to the C/C++ language, in PHP the case values are not limited to `int`, they can also be of type `string` or `float`:

```php
switch ($n) {
case val1:
    // $n == val1
    break;
case val2:
    // $n == val2
    break;
default:
    // $n is neither 
    // of the above
}
```

Note: `switch` does a loose comparison (it uses `==`).

### try-except

#### Introduction

When an exception is thrown, code following the statement will not be executed, and PHP will attempt to find the first matching `catch` block, this means that **catch order matters!**

```php
try {
    throw new Error('Bad');
} catch (Exception $e) {
    echo "$e\n";
} catch (Error $e) {
    echo "$e\n";
} finally {
    echo "Runs always\n";
}
```
Hint: the classes `Exception` and `Error` both implement the `Throwable` interface. Catch `Throwable` to catch both of them.

#### Purpose of finally

The `finally` block is often used to do clean-up work because it always runs.

The code in `finally` is also executed:

1. When an exception isn't handled by any of our `catch` blocks.
2. If another exception is thrown from within one of our `catch` blocks.

For the above two cases, after the execution of the code in `finally` has terminated, the unhandled exception or the new exception are propagated to the higher level `catch` block.


## Loops

### while

```php
$i = 0;
while ($i < 10) {
    echo $i++;
}

$i = 0;
do {
    echo $i++;
} while ($i < 10);
```

- Use `break` to break out of the loop and `continue` to jump to the start.

### for

```php
for ($i = 0; $i < 10; $i += 1) {
    echo $i;
}
```

### foreach

#### Indexed array

```php
$arr = [1, 2, 3];
foreach ($arr as $val) { 
    echo "$val\n";
}
```

#### Key-value array

```php
$arr = ["name" => "foo", 
        "age" => 30, 
        "email" => "foo@bar.com"];
foreach ($arr as $key => $val) { 
    echo "$key => $val\n";
}
```

#### Object properties

```php
class C {
    public $prop1 = 1;
    public $prop2 = 2;
    public $prop3 = 3;
}
$obj = new C;
foreach ($obj as $prop => $val) {
    echo "$prop: $val\n";
}
```


## Functions

The passed number of arguments must much the function definition, except for the default arguments which are optional:

```php
function my_calc($x, $y) {
    global $num;      // make $num global
    $num = 3;
    $z = 2 * $x + $y; // $z is local to function
    return $z;
}
echo(my_calc(1, 2));        // positional args
echo(my_calc(y: 2, x: 1));  // named args

function default_return() {
    $a = 1 + 1;
}
var_dump(default_return()); // returns null

function default_arg($name = "everybody") {
    return "Hello $name!\n";
}
echo(default_arg());
```

**Varargs** are accessed by array:

```php
// $args is a name of your choice
function my_min(...$args) {
    $result = $args[0];
    foreach ($args as $num) {
        if ($num < $result)
            $result = $num;
    }
    return $result;
}
echo(my_min(4, 5, 6, 7, 2));
```

**Anonymous functions**:

```php
// Assign to a variable
$greet = function($name) {
    echo "Hello $name\n";
};
$greet('World');

// Use as callback
$nums = [1, 2, 3, 4, 5];
$squared = array_map(function($n) {
    return $n ** 2;
}, $nums);
print_r($squared);
```

A **Closure** is a function that accesses variables from the enclosing scope, even after the outer functions are done. The used enclosing scope variables have to be listed comma separated through the `use` construct:

```php
function my_func($n) {
    return function($a) use($n) {return $a * $n;};
}

$my_doubler = my_func(2);
$my_tripler = my_func(3);
echo($my_doubler(3));
echo($my_tripler(3));
```
- Hint: prepend a `&` to the variables listed in `use` to include them *by-reference* instead of *by-value*.

**Arrow functions** are a more concise syntax for anonymous functions. The variables from the enclosing scope are automatically included *by-value*:

```php
// fn(argument_list) => expr
function my_func($n) {
    return fn($a) => $a * $n;
}

$my_doubler = my_func(2);
$my_tripler = my_func(3);
echo($my_doubler(3));
echo($my_tripler(3));
```


## Classes

### Basics

```php
class C1 {
    public $prop1 = '1';
    function __construct($prop1) {
        $this->prop1 = $prop1;
    }
    function __destruct() {
        echo "C1__destruct()\n";
    }
    function info() {
        echo "$this->prop1\n";
    }
}

$obj1 = new C1("First");
$obj1->info();
```
- `__construct()` is the constructor method, only one per class.
- `__destruct()` is the destructor method called when an object is destroyed with `unset($obj1)` or goes out of scope.
- Within a class `$this` refers to the current object.
- Properties are defined by using at least one modifier, that's the visibility or the `static` keyword.
- The visibility is set for properties and methods, the default is `public` which means accessible from everywhere.
- A `protected` visibility means accessible from within the class and by inheriting classes.
- A `private` visibility means only accessible from within the class.
- Declaring class properties / methods as `static` makes them accessible without needing an instantiation of the class. They are accessed through `ClassName::$prop / ClassName::method()` or from inside a method, with `self::$prop / self::method()`.

### Inheritance

```php
class C2 extends C1 {
    public $prop2 = '2';
    function __construct($prop1, $prop2) {
        parent::__construct($prop1);
        $this->prop2 = $prop2;
    }
    function __destruct() {
        echo "C2__destruct()\n";
        parent::__destruct();
    }
    function info() {
        echo "$this->prop1, $this->prop2\n";
    }
}

$obj2 = new C2("First", "Second");
$obj2->info();
```
- A child class inherits the parent's constructor and destructor if it does not implement them.
- The constructor and destructor in a child class must explicitly call `parent::__construct()` and `parent::__destruct()`.
- It's possible to override inherited methods by redefining them in a child class with the same name.


### Interfaces

An Interface specifies the public methods and since PHP 8.4.0 also the public properties that a class must implement. Interfaces can be inherited through the `extends` keyword.

```php
interface I {
    public $prop { get; set; }
    public function method();
}
class C implements I {
    public $prop = 3;
    public function method() {
        echo "$this->prop\n";
    }
}
$obj = new C;
$obj->method();
```


## Include PHP files

### include and require

- `include 'file.php'`: include and evaluate a file, throw a warning if it fails.
- `require 'file.php'`: include and evaluate a file, throw an error if it fails.
- `include_once 'file.php'` or `require_once 'file.php'`: include and evaluate a file **once only** and on failure behave like `include` or `require`.

There are two important distinctions to consider when providing the file:

1. **File is provided without a path**. The `include_path` directories-list, which can be checked through `get_include_path()`, is used to find the file. If a file is not found, the search continues in the calling script's own directory and the current working directory. 

2. **File is provided with a relative or an absolute path**. A relative path may be relative to the calling script's own directory, but also relative the current working directory. For this reason it's always better to provide an absolute path by using `__DIR__` or `$_SERVER['DOCUMENT_ROOT']`.

### Useful constants and variables

- `__FILE__` is the full path and filename of the file with symlinks resolved. If used inside an include, the name of the included file is returned.

- `__DIR__` is the directory of the file. If used inside an include, the directory of the included file is returned. This directory name does not have a trailing slash unless it is the root directory.

- `$_SERVER['DOCUMENT_ROOT']` returns the absolute path to the web server's document root. It can have a trailing slash or not, and it may be empty when accessed from a command line PHP script.

- `$_SERVER['SCRIPT_FILENAME']` returns the absolute path of the currently executing script.

### Direct run check

Compare `__FILE__` with `$_SERVER['SCRIPT_FILENAME']`:

```php
if (basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME']))
    echo __FILE__ . " is called directly\n";
else
    echo __FILE__ . " has been included/required\n";
```
- With `basename()` we account for possible differences in the directory separator, especially on Windows. But note that if the files have the same base name, we have to remove those `basename()` calls.

Test a constant defined in the main script:

```php
/* main.php */
define('FLAG_FROM_PARENT', 1);
include 'included.php';

/* included.php */
if (!defined('FLAG_FROM_PARENT'))
    die('No direct run allowed.');
```


## Packages

### Use

Packages are installed via **Composer**.


### Manage


### Examples of packages

- App frameworks: `nativephp/electron`
- Web frameworks: `laravel/framework`
- CLI frameworks: `symfony/console`
- Text: `michelf/php-markdown` `tecnickcom/tc-lib-pdf`
- Develop: `phpunit/phpunit` `monolog/monolog` `symfony/dotenv`
- Multimedia: `intervention/image` `php-ffmpeg/php-ffmpeg`
- Network: `guzzlehttp/guzzle` `phpmailer/phpmailer`
- Math: `markrogoyski/math-php`


## Math

For the following examples, `...` means that multiple comma-separated numbers or an array can be provided, `$num` can either be `int` or `float` and `$flt` is a `float`:

```php
$num = abs($num);
$flt = round($num);
$num = min(...);
$num = max(...);
$flt = sqrt($num);
$flt = log($num);   // base M_E
$flt = log10($num); // base 10

// 2*M_PI rad = 360°
$flt = sin($num);   // in rad
$flt = rad2deg($num);
$flt = deg2rad($num);
```

```php
// Not a number
$nan = NAN;
var_dump(is_nan($nan));
var_dump(is_finite($nan));
var_dump(INF/INF);

// Infinity
$pos_inf = INF;
$neg_inf = -INF;
var_dump(is_infinite($pos_inf));
var_dump(is_finite($neg_inf));
var_dump(PHP_FLOAT_MAX*10);
```
- `is_finite()` returns `true` if its argument is not `INF` and not `NAN`.


## Random

There is no need to seed the following functions, it's done for us by the operating system:

```php
// Floating-point
use Random\IntervalBoundary;
use Random\Randomizer;
$rnd = new Randomizer();
// 0.0 <= $x < 1.0
$x = $rnd->nextFloat();
// 0.0 <= $x <= 1.0
$x = $rnd->getFloat(0.0, 1.0, 
    IntervalBoundary::ClosedClosed);

// Integer
// $a <= $y <= $b
$y = random_int($a, $b);

// Hex string
$bytes = random_bytes(16);
var_dump(bin2hex($bytes));
```

Attention: avoid cryptographically insecure functions such as `lcg_value()`, `mt_rand()`, `rand()` (alias for `mt_rand()`) and `array_rand()`.


## Time

```php
// Pause execution for given us
usleep(1500000);

// Measuring execution time
// microtime(true) returns sec 
// since the Unix epoch as float
$start_time = microtime(true);
// some code...
$end_time = microtime(true);
printf("Execution Time: %f sec\n", 
    $end_time - $start_time);
```


## Date/Time

We use `DateTimeImmutable` which behaves the same as `DateTime` except that new objects are returned when modification methods are called. This class stores the timezone along with the date and time, this permits doing comparisons and difference calculations between objects that are in different timezones.

Set the local [timezone](https://www.php.net/manual/timezones.php) in `php.ini` and/or at the top of your PHP script:

```php
// php.ini
date.timezone = "America/Lima"

// At the top of each script or 
// for each request
date_default_timezone_set('America/Lima');

// Check timezone
var_dump(ini_get('date.timezone'));
var_dump(date_default_timezone_get());
```

The most common Data/Time operations:

```php
// Now
$now = new DateTimeImmutable(); // local time
$now_utc = new DateTimeImmutable('now', 
    new DateTimeZone('UTC'));
$now_lima = new DateTimeImmutable('now', 
    new DateTimeZone('America/Lima'));

// Convert to another timezone
$now_rome = $now_lima->setTimezone(
    new DateTimeZone('Europe/Rome'));
// point-in-time is not changed
assert($now_rome == $now_lima);

// Construct local time and UTC
$dt = new DateTimeImmutable('2018-08-18 10:05:56');
$dt_utc = new DateTimeImmutable('2018-08-18 10:05:56',
    new DateTimeZone('UTC'));

// Format
echo $now->format('d.m.Y H:i:s') . "\n";
echo $dt->format(DateTimeInterface::ATOM) . "\n";

// Time add/sub
// - Order is important
// - P is mandatory
// - T necessary if providing time elements
// P  xY  xM  xD  T  xH  xM  xS
$now_add = $now->add(new DateInterval('PT1H1S'));
$now_sub = $now->sub(new DateInterval('P2YT1M'));

// Calculate time difference
// - For negative intervals: invert = 1
// - diff() will set total number of days
var_dump($now->diff($now_add));
var_dump($now->diff($now_sub));

// Compare
if ($now < $now_add)
    echo '$now_add is later' . "\n";

// Unix/POSIX timestamp
// - In constructor provide timestamp with @
// - When constructing with a timestamp, the 
//   timezone will always be set to UTC
$now_ts = $now->getTimestamp();    // integer sec
$now_approx = new DateTimeImmutable('@' . $now_ts);
var_dump($now_approx->diff($now)); // diff in $f
```


## JSON

```php
$json_str = '{
    "first_name": "John",
    "last_name": "Doe",
    "age": 30
}';

// json string -> array
$arr = json_decode($json_str, true);
var_dump($arr);

// json string -> object
$obj = json_decode($json_str, false);
var_dump($obj);

// array or object -> json string
$json_str2 = json_encode($arr);
var_dump($json_str2);
```


## I/O and processes

### Binary and text mode

To the file modes (`'r'`, `'w'`, `'a'`) we can append a translation mode. If no translation mode is supplied, the default is the binary mode `'b'`, this mode will not translate your data. Windows offers a text mode translation flag `'t'` which will transparently translate `\n` to `\r\n` when working with the file.

### Read file

Classic file open, read and close:

```php
$file = fopen('my_file.txt', 'r');

// Read entire file
$content = fread($file, 
    filesize('my_file.txt'));
echo $content;

// Move to beginning
fseek($file, 0);

// Read lines returning also line-ending
while (($line = fgets($file)) !== false)
    echo $line;

fclose($file);
```
- `fgets()` works well with unix and windows line-ending in both binary and text mode. 

Helper functions:

```php
// Read entire file
$content = file_get_contents('my_file.txt');
echo $content;

// Read all non-empty lines into an array
$lines = file('my_file.txt', 
    FILE_IGNORE_NEW_LINES | 
    FILE_SKIP_EMPTY_LINES);
var_dump($lines);
```
- `file_get_contents()` is binary-safe, and it will return `false` on failure.
- `file()` works well with unix and windows line-ending.

### Write file

The write mode is `'w'`, and the append mode is `'a'`; for both cases the file is created if not existing:

```php
$file = fopen('my_file.txt', 'w');
fwrite($file, "Line1\nLine2\n");
fclose($file);
```

Helper function:

```php
// Overwrite
file_put_contents('my_file.txt',
    "Line1\nLine2\n");

// Append
file_put_contents('my_file.txt',
    "Line1\nLine2\n",
    FILE_APPEND);
```
- `file_put_contents()` is binary-safe, and it will return `false` on failure.

### stdin stdout stderr

```php
$count = 0;
while (($line = fgets(STDIN)) !== false)
    echo $count++ . ": $line";

fwrite(STDOUT, "Hello, stdout.\n");

fwrite(STDERR, "Hello, stderr.\n");
```
- Hint: interrupt stdin by sending an `EOF` on its own line (`Ctrl-D` on Linux/macOS or `CTRL-Z` on Windows).

### File operations

```php
// Make full path to a unique temp filename
// - On Windows the file has a .tmp extension
// - On Windows the prefix is limited to 3 chars
$path = tempnam(sys_get_temp_dir(), 'pre');

// Split path
print_r(pathinfo($path));  // all
var_dump(pathinfo($path, PATHINFO_DIRNAME));
var_dump(dirname($path));  // same as above
var_dump(pathinfo($path, PATHINFO_BASENAME));
var_dump(basename($path)); // same as above
var_dump(pathinfo($path, PATHINFO_EXTENSION));
var_dump(pathinfo($path, PATHINFO_FILENAME));

// Get the current working directory
var_dump(getcwd());

// Return the absolute pathname
var_dump(realpath($path));

// Strip trailing directory separator
$dir = rtrim($dir, '/\\'); // if mixed
$dir = rtrim($dir, DIRECTORY_SEPARATOR);

// true if it exists and it is a regular file
var_dump(is_file($path));

// true if it exists and it is a dir
var_dump(is_dir($path));

// File size in bytes
var_dump(filesize($path));

// Modification time in UTC
$ts = filemtime($path); // Unix timestamp
var_dump(new DateTimeImmutable('@' . $ts));

// Delete file
unlink($path);

// Copy file overwriting destination
copy($from, $to);

// - Rename file overwriting destination
// - Rename dir, fails if destination exists
rename($from, $to);

// Create directory recursively
// (permissions a ignored on Windows)
mkdir($dir, 0777, true);

// Remove an empty directory
rmdir($dir);
```

Iterate all files:

```php
$di = new DirectoryIterator($dir);
foreach ($di as $fi) {
    if ($fi->isFile()) {
        echo $fi->getFilename() . "\n";
        echo "  ext:      " . $fi->getExtension() . "\n";
        echo "  dir:      " . $fi->getPath() . "\n";
        echo "  path:     " . $fi->getPathname() . "\n";
        echo "  realpath: " . $fi->getRealPath() . "\n";
        echo "  size:     " . $fi->getSize() . " bytes\n";
    }
}
```

Recursively iterate all files:

```php
$rii = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator(
        $dir, 
        RecursiveDirectoryIterator::SKIP_DOTS
    )
);
foreach ($rii as $fi) {
    echo $fi->getFilename() . "\n";
    echo "  ext:      " . $fi->getExtension() . "\n";
    echo "  dir:      " . $fi->getPath() . "\n";
    echo "  path:     " . $fi->getPathname() . "\n";
    echo "  realpath: " . $fi->getRealPath() . "\n";
    echo "  size:     " . $fi->getSize() . " bytes\n";
}
```

### Environment variables

`getenv()` returns the value of the given environment variable, or `false` if the environment variable does not exist. If no name is provided, all environment variables are returned as an associative array:

```php
echo getenv('PATH') . "\n";
print_r(getenv()); // all
```
- On Windows `getenv()` is case-insensitive, while on all the other systems it is case-sensitive.

### Arguments

```php
// Skip $argv[0]
$args = array_slice($argv, 1);
foreach ($args as $arg)
    echo "$arg\n";
```

### Exit process

`exit` prints an optional message and then terminates the current script returning an exit code. There is also `die` which is an alias of `exit`:

```php
exit;          // ret code 0
exit();        // ret code 0
exit("bye\n"); // msg & ret code 0
exit(1);       // ret given code
```
- If you provide an exit code, it should be between 0 and 254. Exit code 255 is reserved by PHP.

View exit code on Linux/macOS:

```bash
php ./script.php; echo $?
```

View exit code on Windows:

```bat
php.exe script.php
echo %errorlevel%
```
- Note: because delayed expansion is disabled by default, we cannot run the above two commands in one line.

### Execute process

```php
// Execute a command and when done 
// return last output line
echo exec('whoami') . "\n";

// Execute a command and return
// all output lines in an array
$out = null;
$ret = null;
exec('dir', $out, $ret);
echo "Exit code is $ret and output:\n";
print_r($out);

// Create process with a read pipe
$h = popen('dir', 'r'); // 'r' or 'rb'
while (($line = fgets($h)) !== false)
    echo $line;
pclose($h);

// Create a process with a write pipe
$h = popen('sort', 'w'); // 'w' or 'wb'
if ($h) {
    fwrite($h, "Line2\nLine1\n");
    pclose($h);
}
```
- On Windows, `popen()` defaults to text mode which will translate between `\n` and `\r\n`. To prevent that, enforce binary mode by appending a `b`. 
- For bi-directional pipe support use `proc_open()`.
