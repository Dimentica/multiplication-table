<?php

declare(strict_types=1);

namespace MultiTables\Modules\Table\Basic;

use MultiTables\Modules\Table\TableInterface;

/**
 * @brief	Creates structure of a basic table
 *
 * @details	For the purpose of the project no external library is used
 * 			However, to help in displaying tabular data on a terminal, one can be applied, such as, for example,
 * 			the PEAR package Console_Table or a similar one which best meets the needs
 */
class BasicTable implements TableInterface
{
	/**
	 * @var	string NEW_LINE_DELIMITER
	 */
	const NEW_LINE_DELIMITER		= "\n";

	/**
	 * @var	string CELL_FORMAT_PATTERN
	 */
	const CELL_FORMAT_PATTERN		= "%5s |";

	/**
	 * @var	array $rows
	 */
	protected $rows					= [];

	/**
	 * @copydoc	\MultiTables\Modules\Table\TableInterface::addRow()
	 */
	public function addRow($rowCells) : void
	{
		$this->rows[]	= $rowCells;
	}

	/**
	 * @copydoc	\MultiTables\Modules\Table\TableInterface::getRows()
	 */
	public function getRows() : array
	{
		return $this->rows;
	}

	/**
	 * @copydoc	\MultiTables\Modules\Table\TableInterface::display()
	 *
	 * @details	This method expects the following format of rows arrays:
	 *
	 * Array with rows in the following format:
	 * @code{.php}
	 * [
	 * 	[
	 * 		mixed,
	 * 		mixed
	 * 	],
	 * 	[
	 * 		mixed,
	 * 		mixed
	 * 	]
	 * ];
	 * @endcode
	 */
	public function display() : void
	{
		foreach($this->rows as $row)
		{
			foreach ($row as $cell)
			{
				printf(self::CELL_FORMAT_PATTERN, $cell);
			}

			echo self::NEW_LINE_DELIMITER;
		}
	}
}