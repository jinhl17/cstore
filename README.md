<?php
class adminIndex extends Controller_Admin
{
    protected function run($args)
    {
        print_r($args);exit;
	$this->assign('Hello','Hello World!');

	$bView = $this->View();

	$this->importJS('default');
	$this->importCSS('default');

	if ($bView!==false) {
	    $this->setStatusCode('200');
	}
    }
}
