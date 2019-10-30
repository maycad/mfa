<?php

namespace MayCad\MFA;

/**
 * 
 */
interface MFAService
{
	function transfer(array $params = array());
	
	function deposit(array $params = array());

	function withdrawal(array $params = array());

	function register(array $params = array());

	function login(array $params = array());

	function histories(array $params = array());
}