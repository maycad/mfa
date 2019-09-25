<?php

namespace MayCad\MFA;

/**
 * 
 */
interface MFAService
{
	function operations();

	function histories();

	function process();
}