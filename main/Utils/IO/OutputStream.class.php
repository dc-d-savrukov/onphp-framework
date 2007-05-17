<?php
/***************************************************************************
 *   Copyright (C) 2007 by Ivan Khvostishkov                               *
 *                                                                         *
 *   This program is free software; you can redistribute it and/or modify  *
 *   it under the terms of the GNU General Public License as published by  *
 *   the Free Software Foundation; either version 2 of the License, or     *
 *   (at your option) any later version.                                   *
 *                                                                         *
 ***************************************************************************/
/* $Id$ */

	abstract class OutputStream
	{
		/**
		 * MUST send whole buffer
		 * or throw an IOException
		**/
		abstract public function write($buffer);
		
		/**
		 * @return OutputStream
		**/
		public function flush()
		{
			/* nop */
			
			return $this;
		}
		
		/**
		 * @return OutputStream
		**/
		public function close()
		{
			/* nop */
			
			return $this;
		}
	}
?>