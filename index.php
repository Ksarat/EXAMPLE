<?php

use Parser\SomeRealParser\SomeRealImportIterator;
use Parser\SomeRealParser\PaymentEkomImportProcessor;

/**
 * Iterator usage example
 *
 * Here we get some file and begin parse. Its good parse big files with specific handling of each file row.
 *
 */

try
{
	$importer = new SomeRealImportIterator($file);
}
catch (\Exception $e)
{
	/**
	 * go for some error
	 */
}

$parseResults = [];

foreach ($importer as $numString => $paymentData)
{
	if (!$paymentData)
	{
		$parseResults[] = ['error' => sprintf('', $numString)];
		continue;
	}

	$paymentImportProcessor = new PaymentEkomImportProcessor($paymentData);
	try
	{
		$parseResults[] = $paymentImportProcessor->getDataBySignificantKey($importer->getSignificantKeysPosition());
	}
	catch (\Exception $e)
	{
		/**
		 * go for some error
		 */
	}
}