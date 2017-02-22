<?php

namespace Parser\AbstractParser;

/**
 * Class AbstractImport
 */
abstract class AbstractImport
{
	/**
	 * @var array
	 */
	protected $data;
	protected $errors = [];

	/**
	 * AbstractImport constructor.
	 *
	 * @param array $data
	 */
	public function __construct(array $data)
	{
	}

	/**
	 * @return array
	 */
	public function getErrors()
	{
		return $this->errors;
	}
}