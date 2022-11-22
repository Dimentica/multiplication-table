
# Task

Write a program that prints out a multiplication table of the first 10 prime numbers.\
The program must run from the command line and print one table to STDOUT.\
The first row and column of the table should have the 10 primes, with each cell containing the product of the primes for the corresponding row and column.


## Technologies Used

* PHP 7.4
* PHPUnit 9.2
* Composer 2.2.5


## Architecture

The project uses Decorator Design Pattern to implement creation of tables.\
This approach was selected with the idea to provide more flexibility if project is scaled and changes should be applied dynamically to existing tables, as well as if new tables should be designed.

Other possible patterns which can also be considered for the project, but are not currently used, are the Factory Method or Abstract Factory Design Patterns, depending on the future needs of the project.

## Instructions

Installation

```bash
  composer install
  composer dump-autoload
```
    
## Usage

From the CLI navigate to the folder in which the project is installed.\
Run the script with the bellow command:

```bash
  php index.php
```

The following prompt message is displayed:

```bash
  Please, enter a number of primes to be displayed or press Enter to show the first 10 primes: 
```

**Possible cases:**

**1.** User hits Enter, then the default multiplication table with 10 primes should be displayed

```bash
      |    2 |    3 |    5 |    7 |   11 |   13 |   17 |   19 |   23 |   29 |
    2 |    4 |    6 |   10 |   14 |   22 |   26 |   34 |   38 |   46 |   58 |
    3 |    6 |    9 |   15 |   21 |   33 |   39 |   51 |   57 |   69 |   87 |
    5 |   10 |   15 |   25 |   35 |   55 |   65 |   85 |   95 |  115 |  145 |
    7 |   14 |   21 |   35 |   49 |   77 |   91 |  119 |  133 |  161 |  203 |
   11 |   22 |   33 |   55 |   77 |  121 |  143 |  187 |  209 |  253 |  319 |
   13 |   26 |   39 |   65 |   91 |  143 |  169 |  221 |  247 |  299 |  377 |
   17 |   34 |   51 |   85 |  119 |  187 |  221 |  289 |  323 |  391 |  493 |
   19 |   38 |   57 |   95 |  133 |  209 |  247 |  323 |  361 |  437 |  551 |
   23 |   46 |   69 |  115 |  161 |  253 |  299 |  391 |  437 |  529 |  667 |
   29 |   58 |   87 |  145 |  203 |  319 |  377 |  493 |  551 |  667 |  841 |
```

**2.** User enters a number N, then a multiplication table of N primes should be displayed

```bash
Please, enter a number of primes to be displayed or press Enter to show the first 10 primes: 5
      |    2 |    3 |    5 |    7 |   11 |
    2 |    4 |    6 |   10 |   14 |   22 |
    3 |    6 |    9 |   15 |   21 |   33 |
    5 |   10 |   15 |   25 |   35 |   55 |
    7 |   14 |   21 |   35 |   49 |   77 |
   11 |   22 |   33 |   55 |   77 |  121 |

```

**3.** User enters invalid input (0 or a string), then an error message is displayed and the user is again asked to enter valid input

```bash
Please, enter a number of primes to be displayed or press Enter to show the first 10 primes: 0
The input provided input is not valid.
Please, enter a number of primes to be displayed or press Enter to show the first 10 primes:   
```
## Architecture

The project uses Decorator Design Pattern to implement creation of tables.\
This approach was selected with the idea to provide more flexibility if project is scaled and changes should be applied dynamically to existing tables, as well as if new tables should be designed.

Other possible patterns which can also be considered for the project, but are not currently used, are the Factory Method or Abstract Factory Design Patterns, depending on the future needs of the project.

## Running Tests

To run tests, run the following command in the root folder:

```bash
  phpunit
```

