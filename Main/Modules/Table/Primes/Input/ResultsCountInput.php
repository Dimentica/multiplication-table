<?php

namespace MultiTables\Modules\Table\Primes\Input;

/**
 * @brief	Class that validates user's input based on which the results for the primes table are retrieved
 */
class ResultsCountInput
{
	/**
	 * @brief	Checks if the input meets the required criteria
	 *
	 * @details	A valid input is considered:
	 * 			- empty input
	 * 			- a number greater than 0
	 *
	 * @param	mixed $countInput
	 *
	 * @return	boolean
	 */
	public static function isValid($countInput)
	{
		if(is_numeric($countInput) && $countInput == 0)
		{
			return false;
		}

		if(empty($countInput))
		{
			return true;
		}

		if(is_numeric($countInput) && $countInput > 0)
		{
			return true;
		}

		return false;
	}
}