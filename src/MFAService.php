<?php

namespace MayCad\MFA;

/**
 * 
 */
interface MFAService
{
	function register();
	
	function operations();

	function histories();

	function process();
}