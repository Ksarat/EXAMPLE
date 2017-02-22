<?php

namespace Parser\ExcelParser;

use Parser\AbstractParser\AbstractImport;

/**
 * Class AbstractExcelImport
 */
abstract class AbstractExcelImport extends AbstractImport
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
		$this->data = $data[0];
		$this->checkErrors();
	}

	protected function checkErrors()
	{
	}

	/**
	 * @return array
	 */
	public function getErrors()
	{
		return $this->errors;
	}

	/**
	 * For example, if the column type in the format of the date 01.05.2016, it is represented in figures 42491
	 * 	According to the formula we try to convert use next formula UNIX_DATE = (EXCEL_DATE - 25569) * 86400
	 *
	 * @param $intDate int
	 * @return integer
	 */
	public function convertDateFromExcelFormat($intDate)
	{

	}
}