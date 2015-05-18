<?php

/**
 * Class libSdkBoardlist *
 */
class libSdkBoarddetail
{
    /**
     * instance
     * @var object
     * @static
     */
    protected static $instance;

    /**
     * 싱글톤 instance 화
     * @param object $oApi
     * @return object mixed
     */
    public static function getInstance($oApi)
    {
        if (!isset(self::$instance)) {
            self::$instance = new self($oApi);
        }
        return self::$instance;
    }

    private $oApi;         //Open Api 객체

    public function __construct($oApi)
    {
        $this->oApi = $oApi;
    }

    /**
     * @param $iBoardNo 게시판아이디
     * @param $iNo      게시물아이디
     * @return array
     */
    public function get($iBoardNo, $iNo)
    {
        $aReulst = array();
        if ($iBoardNo > 0) {
            $aParam['board_no'] = $iBoardNo;
            $aParam['no'] = $iNo;
            $aBoard = $this->oApi->call('board', 'read', $aParam);
            $aMeta = $aBoard['meta'];
            if ($aMeta['code'] == 200) {//성공
                $aReulst['data'] = $aBoard['response']['result'];
            } else if ($aMeta['code'] == 400) {//패러미터 애러
                $aReulst['msg'] = $aMeta['errorType'].$aMeta['errorDetail'];
            } else {//기타애러
                $aReulst['msg'] = 'api error';
            }
        } else {
            $aReulst['msg'] = 'board_no is null';
        }
        return $aReulst;
    }
}
