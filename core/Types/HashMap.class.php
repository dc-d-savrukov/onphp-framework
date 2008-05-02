<?php
/***************************************************************************
 *   Copyright (C) 2008 by Konstantin V. Arkhipov                          *
 *                                                                         *
 *   This program is free software; you can redistribute it and/or modify  *
 *   it under the terms of the GNU Lesser General Public License as        *
 *   published by the Free Software Foundation; either version 3 of the    *
 *   License, or (at your option) any later version.                       *
 *                                                                         *
 ***************************************************************************/
/* $Id$ */

	/**
	 * @ingroup Types
	**/
	final class HashMap extends RangedType
	{
		/**
		 * @return HashMap
		**/
		public function setValue($value)
		{
			if (is_array($value)) {
				$this->checkLimits(count($value));
				
				$this->value = $value;
				
				return $this;
			}
			
			throw new WrongArgumentException();
		}
	}
?>