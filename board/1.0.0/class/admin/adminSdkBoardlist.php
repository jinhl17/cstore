<?php
/**
 * @package
 * @author     hrkim08 <hrkim08@simplexi.com.cn>
 * @since      2015. 04. 23.
 * @version    1.0
 * @todo
 */
class adminSdkBoardlist extends Controller_Admin
{
    protected function run($args)
    {
        $this->externalCSS('//img.echosting.cafe24.com/css/module.css');
        $this->externalCSS('//img.echosting.cafe24.com/css/layout.css');
        $oBoard = libSdkBoardlist::getInstance($this->Openapi);
        $iBoardNo = 4;//게시판 아이디
        /*$aParam = array(
            'limit' => 20,          //출력개수
            'page' => 1,            //페이지
            'product_no' => 0,      //상품아이디
            'search_key'=> '',      //검색 키 subject:제목, content:내용, writer_name:작성자, member_id:회원아이디
            'search_val'=> '',      //검색어
            'search_date'=> 'week'  //검색 기간 week: 최근 한주,month3: 최근 3개월,month6: 최근 6개월
        );*/
        $aBoard = $oBoard->get($iBoardNo, $aParam);
        $this->assign('aList', $aBoard['data']['list']);
        $this->view();
    }
}
