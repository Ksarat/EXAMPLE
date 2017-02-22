<?php

namespace Parser\SomeRealParser;

use Parser\ExcelParser\AbstractExcelImport;

/**
 * Class CertificateImport
 */
class SomeRealImport extends AbstractExcelImport
{
	const KEY_TEXT70 = 'somedata_1';
	const KEY_SUM_VAL = 'somedata_2';
	const KEY_PLAT_INN = 'somedata_3';
	const KEY_PLAT_NAME = 'somedata_4';
	const KEY_NUMBER = 'somedata_5';
	const KEY_O_DATE = 'somedata_6';

	/**
	 * @var array
	 */
	private static $significantKeys = [
		self::KEY_TEXT70 => null, self::KEY_SUM_VAL => null, self::KEY_PLAT_INN => null, self::KEY_PLAT_NAME => null,
		self::KEY_NUMBER => null, self::KEY_O_DATE => null
	];

	private static $exceptionSomeData = [
		1231231312, 123123333
	];

	/**
	 * @return array
	 */
	public static function getExceptionSomeData()
	{
		return self::$exceptionSomeData;
	}

	/**
	 * @param $dataKey
	 *
	 * @return mixed
	 */
	public function getData($dataKey)
	{
		return $this->data[$dataKey];
	}

	/**
	 * @return array
	 */
	public static function getSignificantKeys()
	{
		return self::$significantKeys;
	}

}