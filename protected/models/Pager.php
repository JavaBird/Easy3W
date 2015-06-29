<?php
/**
 * Pager class file.
 * 分页类
 * @author zhangxh
 */

class Pager extends CComponent{

	const DEFAULT_PAGE_SIZE=10;

	public $pageVar='page';

	private $_pageSize=self::DEFAULT_PAGE_SIZE;

	private $_currentPage;

	private $_itemCount=0;

    public $validateCurrentPage=true;

	/**
	 * Constructor.
	 * @param integer $itemCount total number of items.
	 */
	public function __construct($itemCount=0)
	{
		$this->setItemCount($itemCount);
	}



	/**
	 * @return integer number of items in each page. Defaults to 10.
	 */
	public function getPageSize()
	{
		return $this->_pageSize;
	}

	/**
	 * @param integer $value number of items in each page
	 */
	public function setPageSize($value)
	{
		if(($this->_pageSize=$value)<=0)
			$this->_pageSize=self::DEFAULT_PAGE_SIZE;
	}

	/**
	 * @return integer number of pages
	 */
	public function getPageCount()
	{
		return (int)(($this->_itemCount+$this->_pageSize-1)/$this->_pageSize);
	}


	/**
	 * @return integer total number of items. Defaults to 0.
	 */
	public function getItemCount()
	{
		return $this->_itemCount;
	}

	/**
	 * @param integer $value total number of items.
	 */
	public function setItemCount($value)
	{
		if(($this->_itemCount=$value)<0)
			$this->_itemCount=0;
	}


	public function getCurrentPage($recalculate=true)
	{
		if($this->_currentPage===null || $recalculate)
		{
			if(isset($_GET[$this->pageVar]))
			{
				$this->_currentPage=(int)$_GET[$this->pageVar]-1;
				if($this->validateCurrentPage)
				{
					$pageCount=$this->getPageCount();
					if($this->_currentPage>=$pageCount)
						$this->_currentPage=$pageCount-1;
				}
				if($this->_currentPage<0)
					$this->_currentPage=0;
			}
			else
				$this->_currentPage=0;
		}
		return $this->_currentPage;
	}


	public function setCurrentPage($value)
	{
		$this->_currentPage=$value;
		$_GET[$this->pageVar]=$value+1;
	}

	/**
	 * Applies LIMIT and OFFSET to the specified query criteria.
	 * @param CDbCriteria $criteria the query criteria that should be applied with the limit
	 */
	public function applyLimit($criteria)
	{
		$criteria->limit=$this->getLimit();
		$criteria->offset=$this->getOffset();
	}

	/**
	 * @return integer the offset of the data. This may be used to set the
	 * OFFSET value for a SQL statement for fetching the current page of data.
	 * @since 1.1.0
	 */
	public function getOffset()
	{
		return $this->getCurrentPage()*$this->getPageSize();
	}

	/**
	 * @return integer the limit of the data. This may be used to set the
	 * LIMIT value for a SQL statement for fetching the current page of data.
	 * This returns the same value as {@link pageSize}.
	 * @since 1.1.0
	 */
	public function getLimit()
	{
		return $this->getPageSize();
	}











}	






