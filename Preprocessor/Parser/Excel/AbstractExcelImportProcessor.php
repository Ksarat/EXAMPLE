<?php

namespace Parser\ExcelParser;

use Parser\AbstractParser\AbstractImportProcessor;

/**
 * Class AbstractExcelImportProcessor
 */
abstract class AbstractExcelImportProcessor extends AbstractImportProcessor
{
	/**
	 * @var AbstractExcelImport
	 */
	protected $import;

	/**
	 * AbstractImportProcessor constructor.
	 *
	 * @param AbstractExcelImport $import
	 */
	public function __construct(AbstractExcelImport $import)
	{
		$this->import = $import;
	}
}