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
  - [Read file](#read-file)
  - [Write file](#write-file)
  - [stdin](#stdin)
  - [stdout](#stdout)
  - [stderr](#stderr)
  - [Arguments](#arguments)
  - [Exit process](#exit-process)
  - [Environment variables](#environment-variables)
  - [Path](#path)
  - [Terminal](#terminal)
  - [Processes](#processes)


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

There is no need to call `random.seed()` as it is called for us with the OS's randomness sources.

```py
import random

# Floating-point
x = random.random() # 0.0 <= x < 1.0

# Integer
# Note: random.randint(a, b)
#                 =
#       random.randrange(a, b+1)
y = random.randint(a, b) # a <= y <= b

# Randomly select an element from:
# range(start, stop, step)
z = random.randrange(start, stop, step)
```


## Time

```py
import time

# Pause execution for the given seconds
time.sleep(1.5);

# Measuring execution time
start_time = time.time() # seconds since the Unix epoch
# some code...
end_time = time.time()   # seconds since the Unix epoch
print("Execution Time:", end_time - start_time, "sec")
```


## Date/Time

```py
import datetime

# Now
now = datetime.datetime.now() # local time
now_utc = datetime.datetime.now(datetime.UTC)

# Construct local time
print(datetime.datetime(2018, 8, 18, 10, 5, 56, 518515))

# Format
print(now.strftime("%d.%m.%Y %H:%M:%S"))
print(now_utc.isoformat(timespec='seconds'))

# Time delta (uses wall clock time semantics)
# days seconds microseconds milliseconds minutes hours weeks
print(now + datetime.timedelta(hours=1, seconds=1))

# Unix/POSIX timestamp
ts = now.timestamp()
print(ts, datetime.datetime.fromtimestamp(ts))
```


## JSON

```py
import json
json_str = '{"first_name": "John", "last_name": "Doe", "age": 30}'

# json str -> dict
user = json.loads(json_str)
print(user)

# dict -> json str
json_str2 = json.dumps(user, indent=2)
print(json_str2)
```


## I/O and processes

### Read file

By default a file is opened in read and text mode. Opening fails if the file does not exist. Open with the `encoding='utf-8'` argument to make sure utf-8 is used on all systems.

To open a file in binary mode use `'rb'`.

```py
my_file = open('my_file.txt')    # default mode is 'r'
for line in my_file:
    print(line.rstrip())         # trim trailing newline
my_file.seek(0)	                 # move to the beginning
lines1 = my_file.readlines()     # newline characters not removed
print(lines1)                    # print lines list
my_file.seek(0)	                 # move to the beginning
text = my_file.read()            # slurp file in one go
lines2 = text.splitlines()       # newline characters removed
print(lines2)                    # print lines list                    
print(my_file.name)              # file name
print(my_file.mode)              # file mode
print(my_file.closed)            # is file closed?
my_file.close()
```

### Write file

The write mode is `'w'`, and the append mode is `'a'`; for both cases the file is written in text mode and created if not existing. By default the line ending is automatically converted depending from the system. To always use a specific line ending open with the `newline='\n'` argument. Open with the `encoding='utf-8'` argument to make sure utf-8 is used on all systems.

To open a file in binary mode use `'wb'` or `'ab'`.

```py
my_file = open('my_file.txt', 'w')
my_file.write('some text\n')
print('another line', file=my_file) # print adds a newline
my_file.close()
```

### stdin

```py
import sys
for line in sys.stdin:
    do_stuff_with(line.rstrip()) # trim trailing newline
text = sys.stdin.read()          # slurp stdin in one go

# Hint: interrupt by sending EOF on its own line
#       (Ctrl-D on Linux/macOS or CTRL-Z on Windows)
```

### stdout

```py
import sys
print('Hello, stdout.')
sys.stdout.write('Hello, stdout.\n')
```

### stderr

```py
import sys
print('a logging message.', file=sys.stderr)
sys.stderr.write('a logging message.\n')
```

### Arguments

```py
import sys
for arg in sys.argv[1:]: # skip argv[0]
    print(arg)
```

### Exit process

The `sys.exit` function raises a SystemExit exception, signaling an intention to exit the interpreter.

```py
import sys
sys.exit()  # no error, same as sys.exit(0)
sys.exit(1) # error range: 1-127
```

### Environment variables

```py
import os
os.environ['VAR']                # error if VAR not defined
os.environ.get('VAR', 'default') # default if VAR not defined
```

### Path

```py
from pathlib import Path
p = Path('C:\\Windows')
p = Path()     # rel. path of current dir
p = Path.cwd() # abs. path of current dir
p.resolve()    # abs. physical path
str(p)         # convert to string

# Script dir & path join operator /
p = Path(__file__).resolve().parent / 'test.txt'

# Iterate
for i in sorted(p.iterdir(), reverse = True):
    print(i)
for i in sorted(p.glob('*.py'), reverse = True):
    print(i)

p.name
p.parent
p.parts
p.stat().st_size
p.stat().st_mtime
p.is_dir()
p.is_file()
p.unlink()
p.rename(target)
p.mkdir()
p.rmdir()

import shutil
shutil.copytree('src', 'dest') # recursive copy
shutil.rmtree('a_dir')         # recursive delete
```

### Terminal

```py
# ANSI escapes
print('\033[31mRED\033[0m')
line, col = 15, 10
print(f'\033[{line};{col}HFind Me!')

import os
term_size = os.get_terminal_size()
print(term_size.columns, term_size.lines)
```

### Processes

```py
import subprocess as sp
proc = sp.run(['ls', '-lh']) # blocks until done
if proc.returncode != 0:
    do_something_else()

# with statement closes file after nested block
with open('./foo', 'w') as foofile:
    sp.run(['ls'], stdout=foofile)
with open('foo') as foofile:
    sp.run(['tr', 'a-z', 'A-Z'], stdin=foofile)
with open('foo.log', 'w') as logfile:
    sp.run(['ls', 'foo', 'bar'], stderr=logfile)

import psutil
p = psutil.Process(pid)
p.kill()
for proc in psutil.process_iter():
    if proc.name() == 'my_proc':
        proc.kill()
```
