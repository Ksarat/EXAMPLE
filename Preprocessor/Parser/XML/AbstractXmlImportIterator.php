<?php

namespace Parser\XmlParser;

use Parser\AbstractParser\AbstractImportIterator;
use File\FileObject;

/**
 * Class AbstractImportIterator
 */
abstract class AbstractXmlImportIterator extends AbstractImportIterator
{
	/**
	 * AbstractXmlImportIterator constructor.
	 *
	 * @param FileObject $file
	 */
	public function __construct(FileObject $file)
	{
	}

	/**
	 * @return bool
	 */
	public function valid()
	{
		return isset($this->activeSheet[$this->rowItterator]);
	}


}
