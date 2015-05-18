<?php

/**
 * Class libSdkBoardlist *
 */
class libSdkBoardlist
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

    private $aArgs;         //패러미터
    private $oApi;

    public function __construct($oApi)
    {
        $this->oApi = $oApi;
    }

    /**
     * @param $iBoardNo
     * @param array $aArgs
     * @return array
     */
    public function get($iBoardNo, $aArgs = array())
    {
        $iBoardNo = (int)$iBoardNo;
        $this->aArgs = $aArgs;
        $aReulst = array();
        if ($iBoardNo > 0) {
            $aParam = $this->getParam($iBoardNo);
            $aBoard = $this->oApi->call('board', 'list', $aParam);
            $aMeta = $aBoard['meta'];
            if ($aMeta['code'] == 200) {//성공
                $aReulst['data'] = $this->_list($aBoard['response']);
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

    private function getParam($iBoardNo)
    {
        $iPage = isset($this->aArgs['page']) ? $this->aArgs['page'] : 1;
        $iLimit = isset($aArgs['limit']) ? $aArgs['limit'] : 20;
        $aParam = array(
            'board_no' => $iBoardNo,
            'limit' => $iLimit,
            'page' => $iPage
        );
        if (isset($this->aArgs['product_no'])) {
            $aParam['product_no'] = $this->aArgs['product_no'];
        }
        if (isset($this->aArgs['search_key'])) {
            $aParam['search_key'] = $this->aArgs['search_key'];
        }
        if (isset($this->aArgs['search_val'])) {
            $aParam['search_val'] = $this->aArgs['search_val'];
        }
        if (isset($this->aArgs['search_date'])) {
            $aParam['search_date'] = $this->aArgs['search_date'];
        }
        return $aParam;
    }

    private function _list($aResponse)
    {
        $aData = array(
            'list' => $aResponse['result'],
            'page_info' =>array(
                'total_record' => $aResponse['total_record'],
                'page' => $aResponse['page'],
                'total_page' => $aResponse['total_page']
            )
        );
        return $aData;
    }
}
