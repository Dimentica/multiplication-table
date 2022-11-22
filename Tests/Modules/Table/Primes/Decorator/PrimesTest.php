<?php

declare(strict_types=1);

namespace Tests\Unit\Modules\Table\Basic;

use MultiTables\Modules\Table\Basic\BasicTable;
use MultiTables\Modules\Table\Primes\Settings\Table;
use MultiTables\Modules\Table\Primes\Decorator\Primes;

/**
 * @brief	Unit test for the Primes Decorator class
 */
class PrimesTest extends \PHPUnit\Framework\TestCase
{
	/**
	 * @var	\MultiTables\Modules\Table\Basic\BasicTable $basicTable
	 */
	protected $basicTable;

	/**
	 * @var	int $inputPrimesCount
	 */
	protected $inputPrimesCount;

		/**
	 * @var	int $expectedRowsCount
	 */
	protected $expectedRowsCount;

	/**
	 * @var	array $expectedRows
	 */
	protected $expectedRows	= [
		[' ',	2,	3,	5,	7],
		[2,		4,	6,	10,	14],
		[3,		6,	9,	15,	21],
		[5,		10,	15,	25,	35],
		[7,		14,	21,	35,	49]
	];

	/**
	 * @brief	Tests basic empty table is modified after adding primes
	 */
	public function testPrepareDataAddsDataToEmptyTable()
	{
		$this->assertCount(0, $this->basicTable->getRows());
		$this->assertEquals($this->basicTable->getRows(), []);

		$primesDecorator	= new Primes($this->basicTable, $this->inputPrimesCount);

		$this->assertCount($this->expectedRowsCount, $this->basicTable->getRows());
		$this->assertEquals($this->basicTable->getRows(), $this->expectedRows);
	}

	/**
	 * @brief	Tests empty user input results in primes table with the default set results count
	 *
	 * @see		\MultiTables\Modules\Table\Primes\Settings\Table::DEFAULT_RESULTS_COUNT
	 */
	public function testPrepareDataWithEmptyInput()
	{
		$primesDecorator	= new Primes($this->basicTable, Table::DEFAULT_RESULTS_COUNT);

		$this->assertCount(Table::DEFAULT_RESULTS_COUNT + 1, $this->basicTable->getRows());
	}

	/**
	 * @brief	Tests not empty user input results in primes table with results count equal to user's input
	 */
	public function testPrepareDataWithNotEmptyInput()
	{
		$primesDecorator	= new Primes($this->basicTable, $this->inputPrimesCount);

		$this->assertCount($this->expectedRowsCount, $this->basicTable->getRows());
	}

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	protected function setUp() : void
	{
		$this->basicTable			= new BasicTable;
		$this->expectedRowsCount	= sizeof($this->expectedRows);
		$this->inputPrimesCount		= $this->expectedRowsCount - 1;
	}
}