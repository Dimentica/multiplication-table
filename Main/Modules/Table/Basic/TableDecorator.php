<?php

declare(strict_types=1);

namespace MultiTables\Modules\Table\Basic;

use MultiTables\Modules\Table\TableInterface;

/**
 * @brief	Table decorator used to implement changes to table
 * 			Using the decorator design pattern would allow modifications displayed to a table at run-time and more flexibility
 * 			At the same time, this would make possible to scale the application and potentionally have more than one modified
 * 			table created using a base table structure
 */
class TableDecorator implements TableInterface
{
	/**
	 * @var	\MultiTables\Modules\Table\BasicTable $decoratedTable
	 */
	public $decoratedTable;

	/**
	 * @var	\MultiTables\Modules\Table\BasicTable $table
	 */
	public function __construct(BasicTable $table)
	{
		$this->decoratedTable	= $table;
	}

	/**
	 * @copydoc	\MultiTables\Modules\Table\TableInterface::addRow()
	 */
	public function addRow($rowCells) : void
	{
		$this->decoratedTable->addRow($rowCells);
	}

	/**
	 * @copydoc	\MultiTables\Modules\Table\TableInterface::getRows()
	 */
	public function getRows() : array
	{
		return $this->decoratedTable->getRows();
	}

	/**
	 * @copydoc	\MultiTables\Modules\Table\TableInterface::display()
	 */
	public function display() : void
	{
		$this->decoratedTable->display();
	}
}