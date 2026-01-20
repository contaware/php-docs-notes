# PHP Docs & Notes <!-- omit from toc -->

This document is a reference guide for PHP programming. It is a bit more than a simple cheat sheet, but it is not a learning book, you need to have some knowledge and experience with PHP programming to understand these notes.


## Table of contents <!-- omit from toc -->

- [Install](#install)
  - [CLI vs Web Server](#cli-vs-web-server)
  - [Linux](#linux)
  - [macOS](#macos)
  - [Windows](#windows)
- [Shebang line](#shebang-line)
- [Command line options](#command-line-options)
  - [Parse and execute given file](#parse-and-execute-given-file)
  - [Show information](#show-information)
  - [Run PHP from command line argument](#run-php-from-command-line-argument)
  - [Start interactive shell](#start-interactive-shell)
  - [Syntax check (lint)](#syntax-check-lint)
  - [Start built-in web server](#start-built-in-web-server)
- [Syntax](#syntax)
- [Variables and Constants](#variables-and-constants)
  - [Introduction](#introduction)
  - [Data types](#data-types)
  - [Reference assignment](#reference-assignment)
- [Operators](#operators)
- [echo](#echo)
- [Strings](#strings)
  - [Single vs Double quotes](#single-vs-double-quotes)
  - [Multi-line strings](#multi-line-strings)
  - [Format string](#format-string)
  - [Positive and negative indices](#positive-and-negative-indices)
  - [Common functions](#common-functions)
  - [Return part of a string](#return-part-of-a-string)
  - [Search](#search)
  - [Replace all](#replace-all)
  - [UTF-8](#utf-8)
  - [Regular expression](#regular-expression)
- [Arrays](#arrays)
  - [Onedimensional](#onedimensional)
  - [Multidimensional](#multidimensional)
  - [References](#references)
  - [Common functions](#common-functions-1)
  - [Add element](#add-element)
  - [Remove element](#remove-element)
  - [Search](#search-1)
  - [Sort](#sort)
  - [Slice and Chunk](#slice-and-chunk)
  - [Merge](#merge)
  - [Destructure (or unpack)](#destructure-or-unpack)
- [Conditions](#conditions)
  - [Truthy and Falsy](#truthy-and-falsy)
  - [Loose and Strict comparison](#loose-and-strict-comparison)
  - [assert()](#assert)
  - [empty()](#empty)
  - [if](#if)
  - [Ternary operator](#ternary-operator)
  - [null coalescing operator](#null-coalescing-operator)
  - [Spaceship operator](#spaceship-operator)
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
    - [Multidimensional array](#multidimensional-array)
    - [Update elements](#update-elements)
    - [Object properties](#object-properties)
- [Alternative syntax for control structures](#alternative-syntax-for-control-structures)
- [Functions](#functions)
  - [Basic functions](#basic-functions)
  - [Varargs functions](#varargs-functions)
  - [Pass/return by reference](#passreturn-by-reference)
  - [Anonymous functions](#anonymous-functions)
  - [Closures](#closures)
  - [Arrow functions](#arrow-functions)
- [Classes](#classes)
  - [Basics](#basics)
  - [Inheritance](#inheritance)
  - [Interfaces](#interfaces)
  - [Copy and Clone](#copy-and-clone)
- [Include PHP files](#include-php-files)
  - [include and require](#include-and-require)
  - [Useful constants and variables](#useful-constants-and-variables)
  - [Direct run check](#direct-run-check)
    - [1. Compare `__FILE__` with `$_SERVER['SCRIPT_FILENAME']`](#1-compare-__file__-with-_serverscript_filename)
    - [2. Test a constant defined in the main script](#2-test-a-constant-defined-in-the-main-script)
- [Namespaces](#namespaces)
- [Packages](#packages)
  - [Install Composer](#install-composer)
    - [Linux](#linux-1)
    - [macOS](#macos-1)
    - [Windows](#windows-1)
    - [Self-update](#self-update)
  - [Use Composer](#use-composer)
    - [Add packages](#add-packages)
    - [Update packages](#update-packages)
    - [Remove packages](#remove-packages)
    - [Search packages](#search-packages)
    - [Advanced use](#advanced-use)
- [Built-in tools](#built-in-tools)
  - [Math](#math)
  - [Random](#random)
  - [Time](#time)
  - [Date/Time](#datetime)
  - [Hash](#hash)
  - [Web](#web)
    - [Superglobals](#superglobals)
    - [HTML](#html)
    - [URL](#url)
    - [Send HTTP headers](#send-http-headers)
  - [Data validation](#data-validation)
  - [Data preparation](#data-preparation)
  - [JSON](#json)
  - [CSV](#csv)
  - [Database](#database)
    - [Connect](#connect)
    - [Exec](#exec)
    - [Query](#query)
    - [Prepared statements](#prepared-statements)
  - [I/O and Processes](#io-and-processes)
    - [Binary and text mode](#binary-and-text-mode)
    - [Read file](#read-file)
    - [Write file](#write-file)
    - [Read input line](#read-input-line)
    - [stdin stdout stderr](#stdin-stdout-stderr)
    - [File operations](#file-operations)
    - [Environment variables](#environment-variables)
    - [Arguments](#arguments)
    - [Exit process](#exit-process)
    - [Execute process](#execute-process)


## Install

### CLI vs Web Server

PHP can be run through a web server or from the command line. To run it through a web server on your local machine install a LAMP (Linux Apache MySQL PHP), MAMP (Mac Apache MySQL PHP) or a WAMP (Windows Apache MySQL PHP). To use it as command line interpreter follow the next sections.

### Linux

To install on Debian/Ubuntu:

```bash
sudo apt install php-cli php-mysql php-sqlite3 php-mbstring
```

### macOS

To install using [Homebrew](https://brew.sh/):

```bash
brew install php
```

### Windows

For Windows [download](https://windows.php.net/download/) the Non-Thread-Safe (NTS) package and unzip it to like `C:\php`. Now add the chosen folder to your `PATH`. Copy `php.ini-development` to `php.ini` and make sure that:

```ini
extension=openssl
extension=mysqli
extension=pdo_mysql
extension=sqlite3
extension=pdo_sqlite
extension=mbstring
default_charset = "UTF-8"
```

## Shebang line

Under Linux/macOS to be able to execute a PHP script without invoking it through `php`, make it executable and add a shebang line at the top of the file:

```bash
#!/usr/bin/env php
```

## Command line options

### Parse and execute given file

```bash
php script.php
```
- `-f` is the option to execute the script. As it is optional, we usually do not provide it.
- With the `-c` option we can supply a specific `php.ini` file.

### Show information

```bash
# Help
php -h

# PHP version
php -v

# PHP configuration
php -i

# Installed modules/extensions
php -m
```

### Run PHP from command line argument

**Do not provide** the PHP start and end  tags (`<?php` and `?>`).

On Linux/macOS, to use double-quotes within the PHP code, supply the PHP code line in single-quotes:

```bash
php -r 'echo "Hello World!\n";'
```

On Windows, double-quotes within the PHP code must be backslash escaped:

```bat
php -r "echo \"Hello World!\n\";"
```

### Start interactive shell

```bash
php -a

# Type code and press ENTER
echo "Hi\n";
```
- Type `quit` or `exit` to return to your terminal.

### Syntax check (lint)

```bash
php -l script.php
```
- Note: it does not execute the given PHP code. 

### Start built-in web server

```bash
php -S localhost:8888 -t ./html
```
- Press `Ctrl-C` to quit.
- By default, it serves files from the current directory. The `-t` option can be provided to specify a document root.
- This web server allows only one request at the time.


## Syntax

PHP is **case-sensitive**. A PHP block starts at `<?php` and ends with `?>` or at the end of the file. Comments start at `#` or `//` and end with the line or with the current block of PHP code, whichever comes first. Multi-line comments start with `/*` and end at the first `*/` encountered. 

In PHP, **curly braces** `{}` are used to structure code, and statements must be terminated by a **semicolon**. The PHP closing tag `?>` implies a semicolon, this means that we can **omit the semicolon** preceding a PHP closing tag `?>`.

PHP programmers use both **snake_case** and **camelCase**; class names should be written in **PascalCase**. Most PHP style guides recommend **indenting** by **four spaces** rather than using a tab.

PHP uses **zero based indexing**.

PHP supports an error control operator. When prepending `@` to an expression, any diagnostic error that might be generated by that expression will be suppressed. This `@` operator should be **avoided** if possible.


## Variables and Constants

### Introduction

Variables are prefixed by a `$`, both when assigned and used. Constants are declared at compile time with `const NAME = value` or at run time through `define('NAME', value)`.

Variable names and constant identifiers are composed of alphanumeric characters or underscores and are not permitted to commence with a number. By convention, constant identifiers are written in all uppercase with underscore separators.

A **variable is global** if it is used at the top level (outside any function definition) or if it is declared inside a function with the `global` keyword.

PHP has [predefined superglobal variables](#superglobals) which are available in all scopes, no need to use the `global` keyword to access them within a function.

### Data types

In PHP you don't need to declare the data type of a variable. It is automatically assigned based on the value. The following data types are supported:

```php
null, bool, int, float, string, array, object, callable, resource
```

There is only one value of type `null`, and that is the case-insensitive constant `null`. Arrays accessed with an undefined key, undefined variables and variables passed to `unset()`, are all regarded as `null`, but testing them raises a warning. That warning can be avoided by using `isset()`, which checks whether a variable has been declared and is not `null`.

The `int` data type is always signed, and its size depends from the platform (32-bit vs 64-bit), see the `PHP_INT_SIZE`, `PHP_INT_MAX` and `PHP_INT_MIN` constants. In PHP there is no difference between `float` and `double`, in fact `double` is an alias of `float`. There are the `PHP_FLOAT_MIN` and `PHP_FLOAT_MAX` constants.

```php
$my_null = null;  // null
$my_bool = true;  // true/false
$num = 10;        // int
$num = 012;       // octal
$num = 0x0A;      // hexadecimal
$num = 0b1010;    // binary
$flt = 3.1415;    // float
$num = (int)$flt; // cast to int
$str = "Hi!\n";   // string
$arr = [1, 2, 3]; // array
```
- Use `var_dump()` or `print_r()` to view the variable details.

The `object` data type holds an instance of a [class](#classes).

The `callable` data type represents anything that can be called as a [function](#functions).

The `resource` data type holds a reference to an external resource, such as a database connection or a [file handler](#read-file).

### Reference assignment

References in PHP are a means to access the **same variable content by different names**. They are not comparable to C-style pointers/references, they behave more like hardlinks in Unix filesystems. When talking about references, we often hear the term **bind** too. This is because references that refer to the same content are bound together.

```php
// Multiple references
$ref1 = 'foo';  // see it as the first reference
$ref2 = &$ref1;
$ref3 = &$ref2; // same as: $ref3 = &$ref1
echo "$ref1, $ref2, $ref3\n";
unset($ref1);   // remove this reference
$ref3 = 'bar';
echo "$ref2, $ref3\n";

// Type-change does not unbind
$mix = 'foo';
$mix2 = &$mix;
$mix = 9;
var_dump($mix2);

// Bind before assignment
$b = &$a;
xdebug_debug_zval('a'); // see refcount
xdebug_debug_zval('b'); // see refcount
```


## Operators

```
Assign:            = += -= *= /= %= **=
Pre inc/dec:       ++$x --$x
Post inc/dec:      $x++ $x--
Math:              + - * / %
Exponentiation:    **
Loose comparison:  < <= > >= == != 
Strict comparison: === !==
Boolean:           && || !
Bitwise:           ~ | & ^
Shift:             << >>
String concat:     . .=
```
- The division operator `/` performs a floating-point division, but it returns an `int` when the two operands are `int` and the result is an integer number.
- Operands of the modulo operator `%` are converted to `int` before processing.


## echo

`echo` is not a function but a language construct, it outputs one or more expressions separated by commas; no newlines or spaces are printed:

```php
echo "Hello", "World!", "\n";
echo "Hello" . "World!" . "\n";

// Can use ANSI escape codes
echo "\033[31mRED\033[0m\n";
```

The **short echo tag** `<?=` is a shorthand for `<?php echo`:

```php
<?= $var; ?>
<?= $var ?>
<?=$var?>
<?="Hi!\n"?>
<?=phpversion(),"\n"?>
<?=PHP_VERSION."\n"?>
```


## Strings

### Single vs Double quotes

**Single-quoted** strings are almost not interpreted, except for `'\\'` and `'\''`.

**Double-quoted** strings support escape sequences and variables are evaluated:

```php
echo "backslash: \\\n";
echo "double-quote: \"\n";
echo "dollar: \$\n";
echo "hex: \x24\x0A";
$var = "It's nice!";
echo "$var\n";
```

In double-quotes, the **curly braces** syntax permits delimiting a variable name and allows the interpolation of associative array elements or object properties/methods. Important is that after the opening `{`, a `$` follows directly:

```php
$foobar = 'foobar';
$foo = 'foo';
echo "$foobar\n";
echo "{$foo}bar\n";

$arr = ['key' => 'val'];
echo "{$arr['key']}\n";
```

### Multi-line strings

```php
$multiline1 = "line1
line2";
echo $multiline1 . "\n";

$multiline2 = 'line1
line2';
echo $multiline2 . "\n";
```

### Format string

```php
$d = 10;
$x = 0x0A;
$b = 0b1010;
$f = 3.1415;
$s = "Hi!";
$fmt = "%%d=%d %%x=%02x %%b=%b %%f=%0.3f %%s=%s\n";
printf($fmt, $d, $x, $b, $f, $s);
echo sprintf($fmt, $d, $x, $b, $f, $s);
```

### Positive and negative indices

Positive indices are 0-based, while negative indices are 1-based:

```php
$s = "Hi!";
echo $s[0], "\n";  // first from left
echo $s[1], "\n";  // second from left
echo $s[-1], "\n"; // first from right
echo $s[-2], "\n"; // second from right
```

### Common functions

```php
$s = strtoupper($s);
$s = strtolower($s);
$len = strlen($s); // always counts bytes
$s = trim($s);     // trim whitespaces
$s = ltrim($s);    // trim left whitespaces
$s = rtrim($s);    // trim right whitespaces
$arr = str_split($s); // one byte per element
$arr = explode($sep, $s); // $sep is a string
$s = implode($sep, $arr); // $sep is a string
```

Loop over an ASCII string:

```php
$s = "Hi !\n";
for ($i = 0; $i < strlen($s); $i++) {
    $code = ord($s[$i]);
    if ($code < 0x20)
        echo "0x" . dechex($code) . "\n";
    else
        echo "$s[$i] (0x" . dechex($code) . ")\n";
}
```

### Return part of a string

```php
// Return string from offset
// till the end of the string
$s = substr($s, $offset);

// Return string from offset 
// with a max of $len bytes
$s = substr($s, $offset, $len);
```
- A negative `$offset` gets the string at offset bytes from the end.

### Search

Return byte position of first substring occurrence:

```php
$pos = strpos($s, $substr, $offset = 0);
$pos = stripos($s, $substr, $offset = 0);
```
- A zero or positive `$offset` begins the search at offset bytes from the start.
- A negative `$offset` begins the search at offset bytes from the end.

Return byte position of last substring occurrence:

```php
$pos = strrpos($s, $substr, $offset = 0);
$pos = strripos($s, $substr, $offset = 0);
```
- A zero or positive `$offset` begins the search from the end and searches up to offset bytes from the start.
- A negative `$offset` begins the search at offset bytes from the end and searches up to the start.

Return string starting from the first $substr occurrence till the end:

```php
$s = strstr($s, $substr);
$s = stristr($s, $substr);
```

Return string which comes before the first occurrence of $substr:

```php
$s = strstr($s, $substr, true);
$s = stristr($s, $substr, true);
```
 
Note: the functions with a **i** are case-insensitive. 

Warning: these functions may find a substring and return a position of `0` or an empty string. If no substring is found, all return `false`. To distinguish between those conditions, perform a [strict comparison](#loose-and-strict-comparison).

Here is an example to help you understand the more challenging logic of negative offsets:

```php
// Positive 0-based offsets
//    0123456789
//    ||||||||||
$s = "0xy3xy6xy9";
//    ||||||||||
//  -10987654321
// Negative 1-based offsets

// strpos does a "offset -> end" search
// with positive or negative offsets
echo strpos($s, 'xy', 4) . "\n";   // 4
echo strpos($s, 'xy', -6) . "\n";  // 4

// strrpos with positive offsets does
// a "end -> offset" search
echo strrpos($s, 'xy', 4) . "\n";  // 7

// strrpos with negative offsets does
// a "offset -> start" search
echo strrpos($s, 'xy', -5) . "\n"; // 4
echo strrpos($s, 'xy', -6) . "\n"; // 4
echo strrpos($s, 'xy', -7) . "\n"; // 1
```

### Replace all

```php
// Replace with case-sensitive search
$s = str_replace($search, $repl, $s);

// Replace with case-insensitive search
$s = str_ireplace($search, $repl, $s);

// Replace each byte in $from
// to corresponding byte in $to
$s = strtr($s, $from, $to);
```

### UTF-8

In PHP, all **common string functions work on bytes**, not on characters. If your string contains non-ASCII characters, you must use the `mb_*` functions, since two or more consecutive bytes may represent a single character. 

To make sure that the correct encoding is used, either call `mb_internal_encoding('UTF-8')` on top of every script, or invoke all `mb_*` functions with the `'UTF-8'` encoding parameter. To check the current internal encoding, issue `echo mb_internal_encoding()`.

Output Unicode code point as UTF-8:

```php
// mb_chr() function
echo mb_chr(0x1F418, 'UTF-8') . "\n";

// Unicode codepoint escape syntax
echo "\u{1F418}\n"; // outputs UTF-8
```
- Note: if your PHP source file is UTF-8 encoded, you can embed the unicode symbol directly.

Loop over an UTF-8 string:

```php
$s = "EU€ 😀\n";
foreach (mb_str_split($s, 1, 'UTF-8') as $c) {
    $code = mb_ord($c, 'UTF-8');
    if ($code < 0x20)
        echo "0x" . dechex($code) . "\n";
    else
        echo "$c (0x" . dechex($code) . ")\n";
}
```

### Regular expression

```php
// The PCRE regex
$pattern = '/../imsu'; // use single-quotes

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
- The `u` flag activates support for UTF-8.


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

No need to declare an array:

```php
$arr1[0] = 1;
$arr1[1] = 2;
$arr1[2] = 3;

$arr2['key1'] = 'val1';
$arr2['key2'] = 'val2';
```

### Multidimensional

Multidimensional arrays are simply arrays which have other arrays as elements.

```php
$arrs = [
    'arr1' => [1, 2, 3],
    'arr2' => [4, 5, 6]
];
echo $arrs['arr1'][0];
```

### References

```php
// Reference assignment
$arr = [1, 2];
$arr2 = &$arr;
$arr2[0] = 3;
$arr2[1] = 4;
print_r($arr);

// Bind array elements
$arr = [&$a, &$b];
// or
$a = &$arr[0];
$b = &$arr[1];

// Copying an array which has referenced elements
// - non-referenced elements are copied by value
// - referenced elements are copied by reference
$arr = [1, 2];
$ref = &$arr[0]; // referenced element
$arr2 = $arr;
$arr2[0] = 3;
$arr2[1] = 4;
print_r($arr); // [3, 2]
```

### Common functions

```php
$arr = range($start, $end, $step = 1);
$c = count($arr);
$key = array_key_first($arr); // null if empty
$key = array_key_last($arr);  // null if empty
$val = array_first($arr);     // null if empty
$val = array_last($arr);      // null if empty
$keys = array_keys($arr);
$vals = array_values($arr); // re-index
$arr = array_combine($keys, $vals);
$arr = array_unique($arr);  // remove duplicates
```

The `key()`, `current()`, `next()`, `prev()`, `reset()` and `end()` functions manipulate the *internal array pointer* and could be deprecated in future. If [foreach](#foreach) is not enough for your array walking needs, consider using the [ArrayIterator](https://www.php.net/manual/class.arrayiterator.php) class.

### Add element

```php
// Append
// Note: keys remain untouched
$arr[] = $val;
array_push($arr, $val);
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

### Search

```php
$b = in_array($val, $arr);
$key = array_search($val, $arr); // false if not found
$b = array_key_exists($key, $arr);
```
- Note: all of the above functions are **case-sensitive**.

### Sort

```php
sort($arr);   // resets keys to 0..count($arr)-1
rsort($arr);  // reverse sort()
asort($arr);  // maintains key-value association
arsort($arr); // reverse asort()
ksort($arr);  // sort by key
krsort($arr); // reverse ksort()
```
- Note: all of the above functions do an **in-place** sort.

### Slice and Chunk

```php
// - $len defaults to null, that will return from 
//   offset to the end of the array.
// - $preserve_keys defaults to false, that will reorder 
//   and reset integer keys (not string keys).
$arr = array_slice($arr, $offset, $len, $preserve_keys);
```

```php
// - $len is the chunk size, last chunk may be smaller.
//   To have two chunks: $len = ceil(count($arr) / 2);
// - $preserve_keys defaults to false, that will convert
//   all keys to integer keys starting at 0.
$arrs = array_chunk($arr, $len, $preserve_keys);
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
- Note: `array_merge()` supports also more than two arrays.

### Destructure (or unpack)

```php
// - $arr must start at index 0
// - $arr is same size (or bigger)
$arr = [1, 2, 3, 4];
list($a, $b, $c) = $arr;
[$a, $b, $c] = $arr; // short syntax
echo "$a, $b, $c\n";

// Ignore element(s)
[, $b, $c] = $arr;
echo "$b, $c\n";

// Swap variables
[$b, $a] = [$a, $b];
echo "$a, $b\n";

// Assign by key
$arr = ['key1' => 'val1', 
        'key2' => 'val2', 
        'key3' => 'val3'];
['key3' => $c, 'key1' => $a] = $arr;
echo "$a, $c\n";
```


## Conditions

### Truthy and Falsy

The terms **truthy** and **falsy** refer to values that are not of type `bool` but, when interpreted, assume the values of `true` and `false`.

- **Falsy**: `null`, **zero** of any numeric type, **empty** arrays, **empty** strings and the string `'0'`.

- **Truthy**: all the others, including `NAN`.

### Loose and Strict comparison

- [Loose comparison](https://www.php.net/manual/types.comparisons.php#types.comparisions-loose): only the values are compared, if the variables have a different data type, then a type conversion happens before the comparison. The operators are `< <= > >= == !=`.

- [Strict comparison](https://www.php.net/manual/types.comparisons.php#type.comparisons-strict): both data type and value must match. The operators are `=== !==`.

### assert()

`assert()` verifies whether its first argument is **truthy**, if not, it will throw an `AssertionError` exception:

```php
$num = 10;
assert(is_int($num));
assert($num < 15);
```

### empty()

The `empty()` function returns `true` if the variable passed as argument does not exist or if its argument is **falsy**:

```php
assert(empty($novar));
assert(empty(false));
assert(empty(null));
assert(empty(0));
assert(empty(0.0));
assert(empty([]));
assert(empty(''));
assert(empty('0'));
```

### if

```php
if (condition1) {
    // condition1 is true
}
elseif (condition2) {
    // condition1 is false
    // and
    // condition2 is true
}
else {
    // both are false
}
```

### Ternary operator

If `condition` is `true`, `$res` is `val1`, otherwise it is `val2`:

```php
$res = condition ? val1 : val2;
```

It is possible to leave out the middle part of the ternary operator, so that if `condition` is `true`, `$res` is `condition`, otherwise it is `val2`:

```php
$res = condition ?: val2;
```

### null coalescing operator

```php
$res = $var ?? 'default';
// is a shorthand for:
$res = isset($var) ? $var : 'default';
```

### Spaceship operator

Returns -1, 0 or 1 when first expression is respectively less than, equal to, or greater than second expression:

```php
// $res: -101
//        |||
$res = $a <=> $b;
```
Note: it does loose comparisons.

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
}
catch (Exception $e) {
    echo "$e\n";
}
catch (Error $e) {
    echo "$e\n";
}
finally {
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

#### Multidimensional array

To loop over a multidimensional array it's possible to use [array destructuring](#destructure-or-unpack):

```php
$arrs = [
    [1, 2],
    [3, 4]
];
foreach ($arrs as [$a, $b]) {
    echo "$a, $b\n";
}

$arrs = [
    ['name' => 'Leo', 'id' => 1],
    ['name' => 'Zoe', 'id' => 2]
];
foreach ($arrs as ['id' => $id, 'name' => $name]) {
    echo "$id, $name\n";
}
```

#### Update elements

```php
$arr = [1, 2, 3];
foreach ($arr as &$val) {
    $val = $val ** 2;
}
// Break reference with last element,
// otherwise $val = 0 changes $arr[2] 
unset($val);
```

To avoid the reference problem to the last element, just use:

```php
$arr = [1, 2, 3];
foreach ($arr as $key => $val) {
    $arr[$key] = $val ** 2;
}
```

Multidimensional case:

```php
$arrs = [
    [1, 2],
    [3, 4]
];
foreach ($arrs as &$arr) {
    foreach ($arr as &$val) {
        $val = $val ** 2;
    }
}
// Break references
unset($val);
unset($arr);
```

#### Object properties

```php
class C {
    public $prop1 = 1;
    public $prop2 = 2;
    public $prop3 = 3;
}
$obj = new C();
foreach ($obj as $prop => $val) {
    echo "$prop: $val\n";
}
```


## Alternative syntax for control structures

The alternative syntax is often used when printing a substantial quantity of plain HTML. To switch to the alternate syntax, follow these steps:

1. After `if`, `else`, `elseif`, `while`, `for`, `foreach`, `switch` change the opening brace `{` to a colon `:`.
2. Change the structure ending brace `}` to `endif;`, `endwhile;`, `endfor;`, `endforeach;`, `endswitch;` respectively.

```php
<?php if ($var == 1): ?>
    <h1>Title1</h1>
    <p>Paragraph1</p>
<?php elseif ($var == 2): ?>
    <h1>Title2</h1>
    <p>Paragraph2</p>
<?php else: ?>
    <h1>Title3</h1>
    <p>Paragraph3</p>
<?php endif; ?>
```

## Functions

### Basic functions

- For **non-object data types, including arrays,** function arguments are **passed-by-value** and function variables are **returned-by-value**.
- Conversely, **objects are passed and returned by reference** because the object variables are just identifiers which point to the actual objects.

```php
function my_calc($x, $y) {
    // $num is global
    global $num;
    $num++;

    // Global with local scope
    static $cnt = 0;
    $cnt++;

    // $z is local to the function
    $z = 2 * $x + $y;

    return $z;
}
$num = 0;
echo my_calc(1, 2) . "\n"; // positional args
echo my_calc(y: 2, x: 1) . "\n"; // named args

function default_return() {
    $a = 1 + 1;
}
var_dump(default_return()); // returns null

function default_arg($name = "everybody") {
    return "Hello $name!\n";
}
echo default_arg();
```
- The passed number of arguments must match the function definition, except for the default arguments which are optional.

### Varargs functions

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
echo my_min(4, 5, 6, 7, 2);
```

### Pass/return by reference

```php
// Pass by reference
function inc(&$var) {
    $var++;
}

// Return by reference
function &getcounter() {
    static $cnt = 0;
    return $cnt;
}

inc(getcounter());
echo getcounter() . "\n";

$count = &getcounter();
$count++;
echo getcounter() . "\n";
```

### Anonymous functions

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

### Closures

A **Closure** is a function that accesses variables from the enclosing scope, even after the outer functions are done. The used enclosing scope variables have to be listed comma separated through the `use` construct:

```php
function my_func($n) {
    return function($a) use($n) {return $a * $n;};
}

$my_doubler = my_func(2);
$my_tripler = my_func(3);
echo $my_doubler(3);
echo $my_tripler(3);
```
- Hint: prepend a `&` to the variables listed in `use` to include them *by-reference* instead of *by-value*.

### Arrow functions

**Arrow functions** are a more concise syntax for anonymous functions. The variables from the enclosing scope are automatically included *by-value*:

```php
// fn(argument_list) => expr
function my_func($n) {
    return fn($a) => $a * $n;
}

$my_doubler = my_func(2);
$my_tripler = my_func(3);
echo $my_doubler(3);
echo $my_tripler(3);
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
- `__destruct()` is the destructor method which gets called when all object references are removed. For the given example that's:  
  `$obj1 = null` or `unset($obj1)` or `$obj1` goes out of scope.
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
$obj = new C();
$obj->method();
```

### Copy and Clone

An object variable doesn't contain the object itself as value. It only contains an object identifier that points to the actual object. To **copy** the content of an object we have to **clone** it.

The `clone` keyword will perform a **shallow copy** of all of the object's properties. Any properties that are references to other variables will remain references. `__construct()` is never called for the new object, but once the cloning is complete, if a `__clone()` method is defined, then the newly created object's `__clone()` method will be called to allow updating the properties and make a **deep copy**. 

A child class inherits the parent's `__clone()` method if it does not implement it. The `__clone()` method in a child class must explicitly call `parent::__clone()`.

```php
$obj2 = clone $obj;

class C {
    public $prop;
    public function __clone() {
        // For properties that are objects
        $this->prop = clone $this->prop;
    }
}
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

There are two possibilities to test whether a PHP script is running directly or has been included:

#### 1. Compare `__FILE__` with `$_SERVER['SCRIPT_FILENAME']`

```php
if (basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME']))
    echo __FILE__ . " is called directly\n";
else
    echo __FILE__ . " has been included/required\n";
```
- With `basename()` we account for possible differences in the directory separator, especially on Windows. But note that if the files have the same base name, we have to remove those `basename()` calls.

#### 2. Test a constant defined in the main script

```php
/* main.php */
define('FLAG_FROM_PARENT', 1);
include 'included.php';

/* included.php */
if (!defined('FLAG_FROM_PARENT'))
    die('No direct run allowed.');
```


## Namespaces

To avoid naming conflicts, a namespace allows **encapsulating classes, functions and constants**. A namespace must be **declared at the top of a file** (except for the `declare` keyword which comes before the `namespace` keyword). A **backslash** is used to separate namespace **hierarchy levels**. Without any namespace definition, the namespace defaults to the global space.

The `use` keyword permits referring to a fully qualified name with an **alias**.

Namespace declarations and the `use` keyword only **apply to their own file**, no effects from or into included files. The same namespace may be declared in multiple files, allowing splitting a namespace's content.

Here a file that will be included, usually a library file:

```php
// No leading backslash for the name
// (by definition it is fully qualified)
namespace NameA\NameB;

class MyClass {
    function __construct() {echo "MyClass()\n";}
}
function myFunc() {echo "myFunc()\n";}
const MYCONST = "Const value";
```

Here a file that includes the above file:

```php
namespace NameA;
require "lib.php"; // the above file

// Fully qualified names start with a backslash
$c = new \NameA\NameB\MyClass();
\NameA\NameB\myFunc();
echo \NameA\NameB\MYCONST . "\n";

// Qualified names do not start with a backslash,
// they are relative to the current namespace
$c = new NameB\MyClass();
NameB\myFunc();
echo NameB\MYCONST . "\n";

// 'use' does not need a backslash in the name
// (by definition it is fully qualified)
// Shorthand: 'as' not needed with same name.
use NameA\NameB\MyClass as MyClass;
use function NameA\NameB\myFunc as myFuncAlias;
use const NameA\NameB\MYCONST; // leaving out 'as'
$c = new MyClass();
myFuncAlias();
echo MYCONST . "\n";
```

If an unqualified name (name without backslashes) is not found in the current namespace, functions and constants fallback to the global namespace, while classes throw an error:

```php
namespace NameC;

// Functions and Constants
print_r(explode(':', "Hello:World"));
echo PHP_VERSION . "\n";

// Classes
use DateTimeImmutable;
var_dump(new DateTimeImmutable());
var_dump(new \DateTime());
```

The `define()` function is special with regard to namespaces, it defines the given constant in global namespace even if called from within a namespace. To target a specific namespace, provide the fully qualified name, but without a leading backslash:

```php
define("NameA\\NameB\\MYDEF", "Def value");
```


## Packages

[Composer](https://getcomposer.org/) is a per-project dependency manager for PHP, it does not install anything globally. It allows you to declare the libraries your project depends on and it will manage (install/update) them for you.

### Install Composer

#### Linux

Download the [composer installer](https://getcomposer.org/installer) file, rename it to `composer-setup.php` and install with:

```bash
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
```

#### macOS

To install using [Homebrew](https://brew.sh/):

```bash
brew install composer
```

#### Windows

Download and run [Composer-Setup.exe](https://getcomposer.org/Composer-Setup.exe). Select the option *"Install for all users (recommended)"* and do not check *"Developer mode"*. The installer will add `C:\ProgramData\ComposerSetup\bin` to your `PATH`.

#### Self-update

You can update composer with (for Linux prepend with `sudo`):

```bash
composer self-update
```

### Use Composer

Always enter your project directory before issuing any Composer command.

The `composer.json` file lists the packages and `composer.lock` lists the currently installed versions of the packages. The actual packages are stored under the `vendor` directory.

Composer can autoload all include files, no need to call `require()` or `include()`, just add the following line at the top of your scripts:

```php
require __DIR__ . '/vendor/autoload.php'
```

#### Add packages

```bash
# Add with version
composer require "vendor/package:version"

# Add listed ones
composer require vendor/package vendor2/package2
```
- Note: this command will update/create `composer.json`, install packages to `vendor` and update/create `composer.lock`.
- The optional `version` can be the exact version like `1.5.0`, a version range `1.5 - 2.0` or it can contain a wildcard like `1.2.*` or `1.*`. The `^` operator is recommended as it will only allow non-breaking updates, for example `^1.2.3`.

#### Update packages

```bash
# Update all
composer update

# Updated listed ones
composer update vendor/package vendor2/package2
```
- Note: this command will read `composer.json`, install new packages to `vendor` and update `composer.lock`.
- Hint: call `composer outdated` to list the available updates.

#### Remove packages

```bash
composer remove vendor/package vendor2/package2
```
- Hint: call `composer show` to list the installed packages.

#### Search packages

Use [Packagist](https://packagist.org/) to search packages or issue:

```bash
composer search search_term
```

Check available versions:

```bash
composer show vendor/package --all
```

Here a selection of common packages:

- App frameworks: `nativephp/electron`
- Web frameworks: `laravel/framework`
- CLI frameworks: `symfony/console`
- Text: `michelf/php-markdown` `tecnickcom/tc-lib-pdf`
- Develop: `phpunit/phpunit` `monolog/monolog`
- Multimedia: `intervention/image` `php-ffmpeg/php-ffmpeg`
- Network: `guzzlehttp/guzzle` `phpmailer/phpmailer`
- Math: `markrogoyski/math-php`

#### Advanced use

In addition to your script files, also `composer.json` and `composer.lock` should be in your version control system, while the `vendor` directory is excluded.

After cloning a project, call `composer install` which reads the `composer.lock` file and installs the exact versions of the packages listed there. Avoid calling `composer update` because you risk breaking the project with new packages.

## Built-in tools

### Math

For the following examples, `...` means that multiple comma-separated numbers or an array can be provided, `$num` can either be `int` or `float` and `$flt` is a `float`:

```php
$num = abs($num);
$flt = floor($num);
$flt = ceil($num);
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

### Random

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

### Time

```php
// Pause execution for given us
usleep(1500000);

// Measuring execution time
// microtime(true) returns sec 
// since the Unix epoch as float
$start_time = microtime(true);
// some code
$end_time = microtime(true);
printf("Execution Time: %f sec\n", 
    $end_time - $start_time);
```

### Date/Time

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

### Hash

Secure functions for hashing passwords:

```php
$pw = '1234';
$hash = password_hash($pw, PASSWORD_DEFAULT);

// Safely store $hash in your database

// Check if it's the correct password
var_dump(password_verify($pw, $hash));
```
- `password_hash()` already salts the passwords for you.
- The used algorithm, cost and salt are returned as part of the hash. This allows `password_verify()` to automatically choose the correct algorithm.
- Right now `PASSWORD_DEFAULT` uses the bcrypt algorithm which truncates passwords longer than 72 bytes and generates a 60 bytes long hash.
- Stronger algorithms will become available over time, so storing the hash in a database column that can expand to 255 bytes is a good choice.

Common hash functions:

```php
// MD5 as lowercase hex string
$data = 'Hello, World!';
var_dump(md5($data));

// SHA-256 as lowercase hex string
var_dump(hash('sha256', $data));
```

### Web

#### Superglobals

- `$_GET` contains query parameters passed in via a **GET request**. The values in `$_GET` are already url-decoded, no need to call `urldecode()`.
- `$_POST` contains post parameters passed in via a **POST request**. The values in `$_POST` are already decoded according to the Content-Type. The supported Content-Type are: `application/x-www-form-urlencoded` and `multipart/form-data`.
- `$_SESSION` contains session variables which persist across multiple pages for the duration of the user's session. Call `session_start()` on every page you wish to use `$_SESSION`.
- `$_SERVER['REQUEST_METHOD']` returns the HTTP method as a string: "GET", "POST", "PUT", "DELETE".
- `$_SERVER['SERVER_PROTOCOL']` returns the protocol name and revision via which the page was requested: "HTTP/1.0", "HTTP/1.1".
- `$_SERVER['REQUEST_URI']` returns exactly what is entered in the URL (without scheme, host and port). The query values are still url-encoded.
- `$_SERVER['PATH_INFO']` contains any client-provided path information trailing the actual script name but preceding the QUERY_STRING.
- `$_SERVER['QUERY_STRING']` contains `name=value` pairs separated by `&`. The query values are still url-encoded.
- `$_SERVER['SCRIPT_NAME']` returns the path of the currently executing script, relative to the document root. It is without trailing PATH_INFO and without trailing QUERY_STRING.
- `$_SERVER['PHP_SELF']` behaves similarly to `$_SERVER['SCRIPT_NAME']`, except that it also returns the trailing PATH_INFO.
- `$_SERVER` variables that return an absolute path are [covered here](#useful-constants-and-variables).

#### HTML

1. In a tag content (between the opening and the closing tags) we must entity encode `& < >`.
2. An attribute value can remain unquoted if it doesn't contain ASCII whitespaces or any of ``" ' ` = < >``. Otherwise, it has to be quoted using either single-quotes or double-quotes. The value, along with the `=` character, can be omitted altogether if the value is the empty string. Within a double-quoted attribute value, it's necessary to entity encode `"` and within a single-quoted attribute value, it's necessary to entity encode `'`.
3. If we entity encode more than necessary, it's not a problem. Thus for tag content and quoted attribute values, we always entity encode `& " ' < >`.
4. The tag content of `<script>` and `<style>` is an exception: entity encoding is not supported there.

PHP has a function which performs entity encoding; it must be called with the following arguments to be effective:

```php
$comment = $_POST['comment'];
$comment = htmlspecialchars($comment, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
echo "<p>$comment</p>\n";

$name = $_POST['name'];
$name = htmlspecialchars($name, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
echo "<input type=\"text\" value=\"$name\">\n";
```
- `htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')` entity encodes `& " ' < >` to `&amp; &quot; &#039; &lt; &gt;`.

Handy function to insert a `<br>` before each newline:

```php
echo nl2br("Hi\r\nHTML document.\n", false);
```
- For the `\r\n` pair, only a single `<br>` is inserted.
- The newlines are not removed from the returned string.

#### URL

```php
// Split url in all parts
$url = 'https://username:password@localhost:80/dir/script.php/path/info?foo1=bar%201&foo2=bar%202#anchor';
print_r(parse_url($url));
// or the single parts with PHP_URL_* 
var_dump(parse_url($url, PHP_URL_PORT));

// Split query string
parse_str(parse_url($url, PHP_URL_QUERY), $params);
print_r($params);

// Prepare a query string
$foo = 'data +';
$query = 'foo=' . urlencode($foo);
echo '<a href="script.php?', $query, '">click</a>', "\n";
```
- `parse_str()` always decodes URL-encoded values.
- `urlencode()` encodes a string by replacing special characters with their hexadecimal representation preceded by a `%`. This function is used to prepare query string values. Note that the browser performs the same encoding for posted form data when the `enctype` attribute is set to `application/x-www-form-urlencoded`.

#### Send HTTP headers

`header($header, $replace = true, $response_code = 0)` must be called before any actual output is sent, whether from HTML tags, blank lines in a file, or a PHP file. The optional `replace` parameter indicates whether the header should replace a previous similar header, or add another header of the same type. When the passed header starts with `HTTP/`, the response code is derived from it. When using the `Location` header, the default response code is 302, but other response codes can be provided. 

```php
// Page not found
header($_SERVER['SERVER_PROTOCOL'] . " 404 Not Found");

// Redirect with 302 Found (moved temporarily)
header("Location: /script.php");
exit;

// Redirect with 301 Moved Permanently
header("Location: /script.php", true, 301);
exit;

// Prevent any form of caching
// Compatible with HTTP/1.1:
header("Cache-Control: no-store");
// Compatible with HTTP/1.0:
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
```

### Data validation

Data validation is applied to user input data to ensure that it is valid. If it is not valid, it must be discarded. Never make any changes to the data itself, this is the role of [Data preparation](#data-preparation).

The [PHP filter_* functions](https://www.php.net/filter) can be used to validate data, but also a simple [regex](#regular-expression) can do the job.

### Data preparation

It's a common misconception that we should filter, sanitize or escape our data right after getting it. The only thing we must do, is to format the data according to the rules of the place we are going to use it. Our output function does not have to trust that it is being given safe data; it simply assumes that everything is unsafe and thus acts accordingly.

The [PHP filter_* functions](https://www.php.net/filter) are not necessary, we have specialized output functions for each case: when creating an URL we use `urlencode()`, when rendering data in HTML we employ `htmlspecialchars()`, if we need JSON data we call `json_encode()` and finally to store any data to a database we have the [prepared statements](#prepared-statements) which do all the escapes for us.

### JSON

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

### CSV

```php
$in = fopen('in.csv', 'r');
$out = fopen('out.csv', 'w');
while (($arr = fgetcsv($in, null, ",", "\"", "")) !== false) {
    print_r($arr);
    fputcsv($out, $arr, ",", "\"", "", "\n");
}
fclose($out);
fclose($in);
```
- To be CSV compliant we use the empty string `""` as **escape** character. In future PHP releases that parameter will change its default to the empty string or removed altogether.

### Database

PDO (PHP Data Objects) provides a consistent interface for a wide variety of database types.

#### Connect

```php
try {
    // Create connection
    $conn = new PDO($dsn, $user, $pass);

    // Print server version
    echo "Server version: {$conn->getAttribute(PDO::ATTR_SERVER_VERSION)}\n";

    // Close connection
    $conn = null;
}
catch (Throwable $e) {
    die("PDO failed: {$e->getMessage()}\n");
}
```
- For **MySQL** use `$dsn = "mysql:host=localhost;port=3306;dbname=db_name;charset=utf8mb4"`
- For **MSSQL** use `$dsn = "sqlsrv:Server=localhost,1433;Database=db_name;TrustServerCertificate=true"`
- For **SQLite** use `$dsn = "sqlite:/path/to/database.db"` with no credentials.

#### Exec

Execute the given SQL query returning the number of affected rows:

```php
$conn->exec("DROP TABLE IF EXISTS tbl");
$sql = "CREATE TABLE tbl (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        num INT,
        flt FLOAT,
        active BOOLEAN
)";
$conn->exec($sql);

$sql = "INSERT INTO tbl (name, num, flt, active) 
        VALUES ('val1', 1, 3.1415, TRUE), 
               ('val2', 2, 1.5, FALSE)";
$count = $conn->exec($sql);
var_dump($count);

$sql = "UPDATE tbl SET num = 10 
        WHERE num = 1";
$count = $conn->exec($sql);
var_dump($count);

$sql = "DELETE FROM tbl 
        WHERE id = 2";
$count = $conn->exec($sql);
var_dump($count);
```

#### Query

Execute the given SQL query, the returned `PDOStatement` object is used to loop over the result set:

```php
$res = $conn->query("SELECT * FROM tbl");

// Get the number of columns in the result set
$colcount = $res->columnCount();
var_dump($colcount);

// Fetch the next row
while (($data = $res->fetch(PDO::FETCH_ASSOC)) !== false)
    var_dump($data);

// Return a single column from the next row
// - Pass the 0-indexed number of the column
// - Should not be used to retrieve boolean columns
while (($data = $res->fetchColumn(1)) !== false)
    var_dump($data);

// Fetch array of array
$data = $res->fetchAll(PDO::FETCH_ASSOC);
var_dump($data);

// Count the number of rows in a table
$count = $conn->query("SELECT count(*) FROM tbl")->fetchColumn();
var_dump($count);
```
- Attention: if you do not fetch all the data from the result set, call `PDOStatement::closeCursor()` to release the database resources.
- Warning: for most databases, `PDOStatement::rowCount()` does not return the number of rows affected by a `SELECT` statement.

#### Prepared statements

To automatically escape your data, instead of using `query()`, call `prepare()` and then `execute()`:

```php
$sql = "SELECT * FROM tbl 
        WHERE id < ? OR name = ? 
        LIMIT ?";
$res = $conn->prepare($sql);
$res->bindValue(1, 5, PDO::PARAM_INT);
$res->bindValue(2, 'val2');
$res->bindValue(3, 2, PDO::PARAM_INT);
$res->execute();
var_dump($res->fetchAll(PDO::FETCH_ASSOC));

$sql = "INSERT INTO tbl (name, num, flt, active)
        VALUES (?, ?, ?, ?)";
$res = $conn->prepare($sql);
$res->bindValue(1, null, PDO::PARAM_NULL);
$res->bindValue(2, 12, PDO::PARAM_INT);
$res->bindValue(3, 3.1415);
$res->bindValue(4, false, PDO::PARAM_BOOL);
$res->execute();
```
- The first parameter of `bindValue()` is the 1-indexed position of the `?` placeholder.
- The `PDO::PARAM_STR` data type is the default.
- The `PDO::PARAM_FLOAT` [does not exist yet](https://wiki.php.net/rfc/pdo_float_type), `PDO::PARAM_STR` is used.

In order to debug the sent SQL query during development, the following code can be placed after `execute()`:

```php
echo "<pre>";
$res->debugDumpParams();
echo "</pre>";
```

### I/O and Processes

#### Binary and text mode

To the file modes (`'r'`, `'w'`, `'a'`) we can append a translation mode. If no translation mode is supplied, the default is the binary mode `'b'`, this mode will not translate your data. Windows offers a text mode translation flag `'t'` which will transparently translate `\n` to `\r\n` when working with the file.

#### Read file

Classic file open, read and close:

```php
$handle = fopen('my_file.txt', 'r');

// Read entire file
$content = fread($handle, 
    filesize('my_file.txt'));
echo $content;

// Move to beginning
fseek($handle, 0);

// Read lines returning also line-ending
while (($line = fgets($handle)) !== false)
    echo $line;

fclose($handle);
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

Wrappers:

```php
$url = 'https://www.example.com/';
echo file_get_contents($url);
var_dump(http_get_last_response_headers());

// Timeout and self-signed certificates
$ctx = stream_context_create([
    'http' => [
        'timeout' => 10, // seconds
    ],
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true,
    ],
]);
echo file_get_contents($url, false, $ctx);
```
- `http://` and `https://` only support read access. 
- `https://` needs the openssl extension to be enabled.
- The `http` context options are for both `http://` and `https://`.

#### Write file

The write mode is `'w'`, and the append mode is `'a'`; for both cases the file is created if not existing:

```php
$handle = fopen('my_file.txt', 'w');
fwrite($handle, "Line1\nLine2\n");
fclose($handle);
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

#### Read input line

```php
$n = readline('Enter a number: ');
printf('Your number+1 is %d', (int)$n+1);
```

#### stdin stdout stderr

```php
$count = 0;
while (($line = fgets(STDIN)) !== false)
    echo $count++ . ": $line";

fwrite(STDOUT, "Hello, stdout.\n");

fwrite(STDERR, "Hello, stderr.\n");
```
- Hint: interrupt stdin by sending an `EOF` on its own line (`Ctrl-D` on Linux/macOS or `CTRL-Z` on Windows).

#### File operations

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

// Clear cache for the status functions:
// is_file(), is_dir(), filesize(), ...
clearstatcache();

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

#### Environment variables

There are three ways to access the environment variables:

1. `$_SERVER` is always populated with the environment variables, it is thread-safe, but as the array keys are case-sensitive, it is also case-sensitive on Windows where the environment variable are case-insensitive.

2. `getenv()` is not thread-safe, but it is case-insensitive on Windows.

3. `$_ENV` should be avoided because it may not be populated with the environment variables. That's because the `E` in `variables_order` is often missing; find this configuration directive in your `php.ini` file.

```php
// Works in all systems,
// but is NOT thread-safe!
echo getenv('PATH') . "\n";

// Linux and macOS
echo $_SERVER['PATH'] . "\n";

// Windows
echo $_SERVER['Path'] . "\n";
```

We can load the `.env` file content as environment variables:

```php
require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad(); // no exception if .env missing
// use your vars through $_SERVER
```
- Install with `composer require vlucas/phpdotenv`.

#### Arguments

```php
// Skip $argv[0]
$args = array_slice($argv, 1);
foreach ($args as $arg)
    echo "$arg\n";
```

#### Exit process

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

#### Execute process

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
