<?php

declare(strict_types=1);

namespace MultiTables\Modules\Table;

/**
 * Interface implemented when creating a table
 */
interface TableInterface
{
	/**
	 * @brief	Add a row
	 *
	 * @param	array $rowCells
	 *
	 * @return	void
	 */
	public function addRow(array $rowCells) : void;

	/**
	 * @brief	Retrieve all rows
	 *
	 * @return	array
	 */
	public function getRows() : array;

	/**
	 * @brief	Creates table view
	 *
	 * @return	void
	 */
	public function display() : void;
}