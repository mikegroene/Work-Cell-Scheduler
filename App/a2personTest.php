<?php

// Person Test Copyright 2014 by WebIS Spring 2014 License Apache 2.0
require_once 'Work-Cell-Scheduler/TDD/validator.php';
include 'Work-Cell-Scheduler/Config/local.php';
require_once 'a2personApp.php';

class a2personTestCase extends WebIS\Validator {

	protected static $__CLASS__=__CLASS__;

	function testa2personApp() {
		$n=new \WCS\a2person();
		$this->AssertTrue($n->seta2person_whitelist("MikeGroene"),"this is an error message");
		$this->AssertFalse($n->seta2person_whitelist("Mike...Groene"));
		$this->AssertEquals("{person: MikeGroene}", $n->display());
		$this->AssertTrue($n->seta2person_name("Mike Groene"));
		$this->AssertEquals("{person: MikeGroene name: Mike Groene}",$n->display());
		$this->AssertTrue($n->delete(),"first delete test");
		$this->AssertTrue($n->delete(), "second delete test");
		$this->AsserTrue($n->insert());
		$this->AssertFALSE($n->insert());
	}
}

if (!defined('PHPUnit_MAIN_METHOD')) {
	a2personTestCase::main();
}
?>