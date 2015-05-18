<?php
/**
 * Created by PhpStorm.
 * User: simplexi
 * Date: 14. 22. 4
 * Time: 오후 1:58
 */

class adminSdkBoarddetail extends Controller_Admin
{
    protected function run($args)
    {
        $this->externalCSS('//img.echosting.cafe24.com/css/module.css');
        $this->externalCSS('//img.echosting.cafe24.com/css/layout.css');
        $oBoardDetail = libSdkBoarddetail::getInstance($this->Openapi);
        $iBoardNo = 4;//게시판 아이디
        $iNo = 3;//게시물 아이디
        $aBoard = $oBoardDetail->get($iBoardNo, $iNo);
        $this->assign('aInfo', $aBoard['data'][0]);
        $this->view();
    }
}
