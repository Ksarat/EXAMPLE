<?php

namespace Parser\AbstractParser;

/**
 * Class AbstractImportIterator
 */
abstract class AbstractImportIterator implements Iterator
{
	const PARSER_START_ROW = 0;

	protected $activeSheet;

	protected $rowItterator;

	protected $data = [];


	/**
	 * @return AbstractImport
	 */
	abstract public function current();

	public function rewind()
	{
		$this->rowItterator = static::PARSER_START_ROW;
	}

	/**
	 * @return int
	 */
	public function getLineNum()
	{
		return $this->key();
	}

	/**
	 * @return int
	 */
	public function key()
	{
		return $this->rowItterator;
	}

	/**
	 *
	 */
	public function next()
	{
		$this->rowItterator++;
	}


}
