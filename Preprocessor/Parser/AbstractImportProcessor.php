<?php

namespace Parser\AbstractParser;

/**
 * Class AbstractImportProcessor
 */
abstract class AbstractImportProcessor
{
	/**
	 * @var AbstractImport
	 */
	protected $import;

	/**
	 * AbstractImportProcessor constructor.
	 *
	 * @param AbstractImport $import
	 */
	public function __construct(AbstractImport $import)
	{
		$this->import = $import;
	}
}