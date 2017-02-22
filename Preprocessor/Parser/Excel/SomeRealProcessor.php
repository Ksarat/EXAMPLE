<?php

namespace Parser\SomeRealParser;

use  Parser\ExcelParser\AbstractExcelImportProcessor;

/**
 * Class SomeRealImportProcessor
 */
class SomeRealImportProcessor extends AbstractExcelImportProcessor
{
	/**
	 * @var $import SomeRealImport
	 */
	protected $import;

	private $errors = [];

	/**
	 * SomeRealImportProcessor constructor.
	 *
	 * @param SomeRealImport $someRealImport
	 */
	public function __construct(SomeRealImport $someRealImport)
	{
		parent::__construct($someRealImport);
	}


	/**
	 * @param $significantKeys
	 *
	 * @return array
	 */

	public function getDataBySignificantKey(array $significantKeys)
	{
		if (in_array($this->import->getData($significantKeys[SomeRealImport::KEY_PLAT_INN]), SomeRealImport::getExceptionInns()) ||
			!$this->import->getData($significantKeys[SomeRealImport::KEY_SUM_VAL])
		)
		{
			$this->errors = sprintf('Inn %s was not proceed', $this->import->getData($significantKeys[SomeRealImport::KEY_PLAT_INN]));

			return [];
		}


		$parsedRowData =
			[
				SomeRealImport::KEY_TEXT70 => $this->import->getData($significantKeys[SomeRealImport::KEY_TEXT70]),
				SomeRealImport::KEY_SUM_VAL => $this->import->getData($significantKeys[SomeRealImport::KEY_SUM_VAL]),
				SomeRealImport::KEY_PLAT_INN => $this->import->getData($significantKeys[SomeRealImport::KEY_PLAT_INN]),
				SomeRealImport::KEY_PLAT_NAME => $this->import->getData($significantKeys[SomeRealImport::KEY_PLAT_NAME]),
				SomeRealImport::KEY_NUMBER => $this->import->getData($significantKeys[SomeRealImport::KEY_NUMBER]),
				SomeRealImport::KEY_O_DATE => $this->import->getData($significantKeys[SomeRealImport::KEY_O_DATE])

			];

		return $parsedRowData;
	}

	/**
	 * @return array
	 */
	public function getErrors()
	{
		return $this->errors;
	}


}