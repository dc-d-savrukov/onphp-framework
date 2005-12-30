<?php
/****************************************************************************
 *   Copyright (C) 2004-2005 by Konstantin V. Arkhipov, Anton E. Lebedevich *
 *   voxus@gentoo.org, noiselist@pochta.ru                                  *
 *                                                                          *
 *   This program is free software; you can redistribute it and/or modify   *
 *   it under the terms of the GNU General Public License as published by   *
 *   the Free Software Foundation; either version 2 of the License, or      *
 *   (at your option) any later version.                                    *
 *                                                                          *
 ****************************************************************************/
/* $Id$ */

	/**
	 * SQL's BETWEEN or logical check whether value in-between given limits.
	**/
	class LogicalBetween implements LogicalObject
	{
		private $field  = null;
		private $left   = null;
		private $right  = null;
		
		public function __construct($field, $left, $right)
		{
			$this->left		= $left;
			$this->right	= $right;
			$this->field	= $field;
		}
		
		public function toString(Dialect $dialect)
		{
			return
				'('.
					$this->fieldOrValue($dialect, $this->field).
					' BETWEEN '.
						$this->fieldOrValue($dialect, $this->left).
					' AND '.
						$this->fieldOrValue($dialect, $this->right).
				')';
		}
		
		public function toBoolean(Form $form)
		{
			$left	= Expression::toValue($form, $this->left);
			$right	= Expression::toValue($form, $this->right);
			$value	= Expression::toValue($form, $this->field);
			
			return
				($left	<= $value) &&
				($value	>= $right);
		}

		private function fieldOrValue(Dialect $dialect, $something)
		{
			if ($something instanceof DialectString)
				return $something->toString($dialect);
			else
				return $dialect->quoteField($something);
		}
	}
?>