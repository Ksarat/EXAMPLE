<?php

namespace Parser\XmlParser;

use Parser\AbstractParser\AbstractImportProcessor;

/**
 * Class AbstractImportProcessor
 */
abstract class AbstractXmlImportProcessor extends AbstractImportProcessor
{
	/**
	 * @var AbstractImport
	 */
	protected $import;

	/**
	 * AbstractXmlImportProcessor constructor.
	 *
	 * @param AbstractXmlImport $import
	 */
	public function __construct(AbstractXmlImport $import)
	{
		parent::__construct($import);
	}
}