<?php

namespace Parser\ExcelParser;

use Parser\AbstractParser\AbstractImportIterator;

/**
 * Class AbstractExcelImportIterator
 */
abstract class AbstractExcelImportIterator extends AbstractImportIterator
{
	const PARSER_START_ROW = 0;

	protected $highestRow, $highestColumn;
	/* @var $activeSheet PHPExcel_Worksheet */
	protected $activeSheet;

	protected $rowItterator;

	protected $data = [];

	/**
	 * AbstractExcelImportIterator constructor.
	 *
	 * @param FileObject $file
	 */
	public function __construct(FileObject $file)
	{
		$filePath = $file->getPathname();
		$objReader = \PHPExcel_IOFactory::createReaderForFile($filePath);

		$this->prepareReader($objReader);

		/* @var $phpExcel PHPExcel */
		$phpExcel = $objReader->load($filePath);

		$this->activeSheet = $phpExcel->getSheet(0);

		$this->highestRow = $this->activeSheet->getHighestRow() + 1;
		$this->highestColumn = $this->activeSheet->getHighestColumn();
	}

	/**
	 * @return bool
	 */
	public function valid()
	{
		return ($this->key() < $this->highestRow);
	}

	/**
	 * @param PHPExcel_Reader_IReader $objReader
	 */
	protected function prepareReader(\PHPExcel_Reader_IReader $objReader)
	{
	}

}
