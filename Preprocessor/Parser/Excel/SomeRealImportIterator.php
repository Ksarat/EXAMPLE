<?php

namespace Parser\SomeRealParser;

use Parser\ExcelParser\AbstractExcelImportIterator;
use File\FileObject;

/**
 * Class SomeRealImportIterator
 * @package Parser\SomeRealParser
 */
class SomeRealImportIterator extends AbstractExcelImportIterator
{
	const PARSER_START_ROW = 3;
	const PARSER_HEADER_ROW = 1;

	protected $highestColumnIndex, $significantKeysPosition = [];

	/**
	 * SomeRealImportIterator constructor.
	 *
	 * @param FileObject $file
	 */
	public function __construct(FileObject $file)
	{
		parent::__construct($file);

		$this->highestColumnIndex = \PHPExcel_Cell::columnIndexFromString($this->highestColumn);

		$this->getHeaderPositionIndex();
	}

	/**
	 * @return bool|SomeRealImport
	 */
	public function current()
	{
		$data = $this->activeSheet->rangeToArray('A' . $this->rowItterator . ':' . $this->highestColumn . $this->rowItterator, null, true, false);

		if (empty($data[0]))
		{
			return false;
		}

		return new SomeRealImport($data);
	}

	/**
	 *
	 */
	private function getHeaderPositionIndex()
	{
		$dataHeader = $this->activeSheet->rangeToArray('A' . self::PARSER_HEADER_ROW . ':' . $this->highestColumn . self::PARSER_HEADER_ROW, null, true, false);

		$significantKeysIndex = array_keys(SomeRealImport::getSignificantKeys());

		foreach ($significantKeysIndex as $significantKey)
		{
			$this->significantKeysPosition[$significantKey] = array_search($significantKey, $dataHeader[0]);
		}
	}

	/**
	 * @return array
	 */
	public function getSignificantKeysPosition()
	{
		return $this->significantKeysPosition;
	}

	/**
	 * @param \PHPExcel_Reader_IReader $objReader
	 */
	protected function prepareReader(\PHPExcel_Reader_IReader $objReader)
	{
		$objReader->setDelimiter("\t")->setInputEncoding('windows-1251');
	}


}