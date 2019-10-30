<?php

namespace MayCad\MFA;

/**
 * 
 */
interface MFAService
{
	function transfer(array $params = array());
	
	function charge(array $params = array());

	function register(array $params = array());

	function login(array $params = array());

	function histories(array $params = array());
}