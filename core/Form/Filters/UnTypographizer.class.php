<?php
/***************************************************************************
 *   Copyright (C) 2007 by Konstantin V. Arkhipov                          *
 *                                                                         *
 *   This program is free software; you can redistribute it and/or modify  *
 *   it under the terms of the GNU General Public License as published by  *
 *   the Free Software Foundation; either version 2 of the License, or     *
 *   (at your option) any later version.                                   *
 *                                                                         *
 ***************************************************************************/
/* $Id$ */

	/**
	 * @ingroup Filters
	**/
	final class UnTypographizer extends BaseFilter implements Instantiatable
	{
		private static $symbols =
			array(
				' &lt; '	=> ' < ',
				' &gt; '	=> ' > ',
				'&#133;'	=> '…',
				'&trade;'	=> '™',
				'&copy;'	=> '©',
				'&#8470;'	=> '№',
				'&mdash;'	=> '—',
				'&laquo;'	=> '«',
				'&raquo;'	=> '»',
				'&bull;'	=> '•',
				'&reg;'		=> '®',
				'&frac14;'	=> '¼',
				'&frac12;'	=> '½',
				'&frac34;'	=> '¾',
				'&plusmn;'	=> '±'
			);
		
		/**
		 * @return UnTypographizer
		**/
		public static function me()
		{
			return Singleton::getInstance(__CLASS__);
		}
		
		public function apply($value)
		{
			return strtr($value, self::$symbols);
		}
	}
?>