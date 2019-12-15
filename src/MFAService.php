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

	function balance(array $params = array());

	function confirm(array $params = array());

	function register(array $params = array());

	function login(array $params = array());

	function transactions(array $params = array());

	function contact(array $params = array());

	function newsletter(array $params = array());
}