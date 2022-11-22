<?php

declare(strict_types=1);

namespace MultiTables\Modules\Table\Primes\Controller;

use MultiTables\Utils\CommandLine\Interactor;
use MultiTables\Modules\Table\Basic\BasicTable;
use MultiTables\Modules\Table\Primes\Settings\CommandLines;
use MultiTables\Modules\Table\Primes\Input\ResultsCountInput;
use MultiTables\Modules\Table\Primes\Decorator\Primes as PrimesDecorator;

class Primes
{
	use Interactor;

	/**
	 * @brief	Action which displays primes table
	 */
	public function display()
	{
		do {
			$countInput	= Interactor::readCliLine(CommandLines::ENTER_RESULTS_COUNT);
			$isValid	= ResultsCountInput::isValid($countInput);

			if(! $isValid)
			{
				echo CommandLines::INVALID_INPUT;
				echo PHP_EOL;
			}
		}
		while(! $isValid);

		$basicTable		= new BasicTable();
		$primesTable	= new PrimesDecorator($basicTable, $countInput);

		$primesTable->display();
	}
}