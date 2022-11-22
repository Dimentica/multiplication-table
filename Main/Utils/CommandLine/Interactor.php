<?php

namespace MultiTables\Utils\CommandLine;

/**
 * @brief	Intended to hold common command line operations
 */
trait Interactor
{
	/**
	 * @brief	Wrapper to display a user prompt message to cli
	 */
	public static function readCliLine($message)
	{
		return readline($message);
	}
}