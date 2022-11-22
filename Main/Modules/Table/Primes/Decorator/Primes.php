<?php

declare(strict_types=1);

namespace MultiTables\Modules\Table\Primes\Decorator;

use MultiTables\Modules\Table\Basic\TableDecorator;
use MultiTables\Modules\Table\Primes\Settings\Table;

/**
 * @brief	Decorator for a table which shows prime numbers
 */
class Primes extends TableDecorator
{
	/**
	 * @var	int FIRST_PRIME_NUMBER
	 */
	const FIRST_PRIME_NUMBER	= 2;

	/**
	 * @brief	int $primesCount
	 */
	private $primesCount;

	/**
	 * @var	array $primes
	 */
	private $primes				= [];

	/**
	 * @var	array $populatedRows
	 */
	private $populatedRows		= [];

	/**
	 * @param	\MultiTables\Modules\Table\Basic\BasicTable $table
	 * @param	mixed $primesCount
	 */
	public function __construct(
		\MultiTables\Modules\Table\Basic\BasicTable $table,
		$primesCount
	) {
		$this->primesCount	= is_numeric($primesCount) && $primesCount >= Table::MIN_RESULTS ? (int) $primesCount : Table::DEFAULT_RESULTS_COUNT;

		parent::__construct($table);

		$this->prepareData();
	}

	/**
	 * @copydoc	\MultiTables\Modules\Table\TableInterface::display()
	 */
	public function display() : void
	{
		parent::display();
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////////////

	/**
	 * @brief	Prepares the data to be added to each row
	 *
	 * @return	void
	 */
	private function prepareData() : void
	{
		$this->selectPrimes($this->primesCount);
		$this->prepareMultiplicationTableRowsData();

		foreach($this->populatedRows as $populatedRow)
		{
			$this->addRow($populatedRow);
		}
	}

	/**
	 * @brief	Prepares the data for the multiplication table as an array
	 *
	 * @details	To populate the multiplication table, the following algorithm is followed:
	 * 			- an array is formed with the following format:
	 * @code{.php}
	 * [
	 * 	[
	 * 		first_row_prime,
	 * 		first_row_prime
	 * 	],
	 * 	[
	 * 		second_row_prime,
	 * 		second_row_prime
	 * 	]
	 * ];
	 * @endcode
	 *			- row cells are calculated following the algorithm:
	 * 			Step 1: read number, count of multiples
	 * 			Step 2: set count = 1
	 * 			Step 3: if count <= count of multiples ? continue : stop
	 * 			Step 4: result = count * number
	 * 			Step 5: add result to populated row
	 * 			Step 6: count = count + 1
	 * 			Step 7: go to Step 3
	 *
	 * @return	void
	 */
	private function prepareMultiplicationTableRowsData() : void
	{
		$this->populatedRows[0][0]	= " ";

		// populate first row cell by cell (first cell is skipped)
		for($i = 0; $i < $this->primesCount; $i++)
		{
			$this->populatedRows[0][$i + 1]	= $this->primes[$i];
		}

		// populate the first cell of every next row (first row is skipped)
		for($i = 0; $i < $this->primesCount; $i++)
		{
			$this->populatedRows[$i + 1][0]	= $this->primes[$i];
		}

		// populate every row after the first one cell by cell
		// every cell is a calculated by multiplying the corresponding row and column cells
		for ( $i = 1; $i <= $this->primesCount; $i++)
		{
			for ( $n = 1; $n <= $this->primesCount; $n++)
			{
				$this->populatedRows[$i][$n]	= $this->populatedRows[0][$n] * $this->populatedRows[$i][0];
			}
		}
	}

	/**
	 * @brief	Selects the prime numbers to be displayed according to pre-set criteria
	 *
	 * @details	By default the first nnumber from which to start checking for prime numbers
	 * 			is 2, as 0 and 1 are not considered prime numbers
	 *
	 * @return	void
	 */
	private function selectPrimes() : void
	{
		$number	= self::FIRST_PRIME_NUMBER;

		while(count($this->primes) < $this->primesCount)
		{
			if($this->isPrime($number))
			{
				$this->primes[]	= $number;
			}

			$number += 1;
		}
	}

	/**
	 * @brief	Check if a given number is prime or not
	 *
	 * @details	Basics:
	 * 			A number ‘n’ is prime if it is not divisible by any number other than 1 and itself,
	 * 			e.g., it is not divisible by any number from 2 to n-1
	 * 			A prime number is always greater than 1 - zero and 1 are not considered prime numbers
	 *			Numbers divided by 2 which produce a whole number are not prime
	 *
	 * 			Possible approach:
	 * 			Check if a number is prime by dividing it with all natural numbers starting from 2 to N/2
	 *
	 * 			Preferred and implemented approach:
	 * 			Except from 2 and 3, every prime number can be represented into 6k ± 1 (numbers greater than or equal to 5)
	 * 			The number is checked till square root of N
	 * 			For a factor larger than square root of N, there must the a smaller factor which is already checked
	 * 			in the range of 2 to square root of N.
	 *
	 * @param	int $number
	 *
	 * @return	boolean
	 */
	private function isPrime(int $number) : bool
	{
		$n	= 0;

		// 2 and 3 are prime, although they do not meet the below requirements
		if ($number == 2 || $number == 3)
		{
			return true;
		}
		// numbers greater than or equal to 5 can be represented into 6k ± 1
		elseif ($number % 6 == 1 || $number % 6 == 5)
		{
			// number is checked till square root of N ($i)
			for($i = 2; $i*$i <= $number; $i++)
			{
				if($number % $i == 0)
				{
					$n++;

					break;
				}
			}

			return $n == 0 ? : false;
		}
		else
		{
			return false;
		}
	}
}