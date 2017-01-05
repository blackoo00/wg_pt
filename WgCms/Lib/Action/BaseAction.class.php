<?php
class BaseAction extends Action
{
    public $isAgent;
    public $home_theme;
    public $reg_needCheck;
    public $minGroupid;
    public $reg_validDays;
    public $reg_groupid;
    public $thisAgent;
    public $agentid;
    public $adminMp;
    public $siteUrl;
    public $isQcloud = false;
    protected function _initialize()
    {
		Vendor('tongji.hm');
        $_hmt = new _HMT("d804bbf6e06872863e6110c106c5ac63");
        $_hmtPixel = $_hmt->trackPageView();
        $this->assign('hmtPixel', $_hmtPixel);
        if ($this->_get('openId') != NULL) {
            $this->isQcloud = true;
            if (session('isQcloud') == NULL) {
                session('isQcloud', true);
            }
        }
        define('RES', THEME_PATH . 'common');
        define('STATICS', TMPL_PATH . 'static');
        $this->assign('action', $this->getActionName());
        $this->isAgent = 0;
        if (C('agent_version')) {
            $thisAgent = M('agent')->where(array('siteurl' => 'http://' . $_SERVER['HTTP_HOST']))->find();
            if ($thisAgent) {
                $this->isAgent = 1;
            }
        }
        if (!$this->isAgent) {
            $this->agentid = 0;
            if (!C('site_logo')) {
                $f_logo = 'tpl/Home/WgCms/common/images/logo-WgCms.png';
            } else {
                $f_logo = C('site_logo');
            }
            $f_siteName = C('SITE_NAME');
            $f_siteTitle = C('SITE_TITLE');
            $f_metaKeyword = C('keyword');
            $f_metaDes = C('content');
            $f_qq = C('site_qq');
            $f_ipc = C('ipc');
            $f_qrcode = 'tpl/Home/WgCms/common/images/ewm2.jpg';
            $f_siteUrl = C('site_url');
            $this->home_theme = C('DEFAULT_THEME');
            $f_regNeedMp = C('reg_needmp') == 'true' ? 1 : 0;
            $this->reg_needCheck = C('ischeckuser') == 'false' ? 1 : 0;
            $this->minGroupid = 1;
            $this->reg_validDays = C('reg_validdays');
            $this->reg_groupid = C('reg_groupid');
            $this->adminMp = C('site_mp');
        } else {
            $this->agentid = $thisAgent['id'];
            $this->thisAgent = $thisAgent;
            $f_logo = $thisAgent['sitelogo'];
            $f_siteName = $thisAgent['sitename'];
            $f_siteTitle = $thisAgent['sitetitle'];
            $f_metaKeyword = $thisAgent['metakeywords'];
            $f_metaDes = $thisAgent['metades'];
            $f_qq = $thisAgent['qq'];
            $f_qrcode = $thisAgent['qrcode'];
            $f_siteUrl = $thisAgent['siteurl'];
            $f_ipc = $thisAgent['copyright'];
            $this->home_theme = C('DEFAULT_THEME');
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/tpl/Home/' . 'agent_' . $thisAgent['id'])) {
                $this->home_theme = 'agent_' . $thisAgent['id'];
            }
            $f_regNeedMp = $thisAgent['regneedmp'];
            $this->reg_needCheck = $thisAgent['needcheckuser'];
            $minGroup = M('User_group')->where(array('agentid' => $thisAgent['id']))->order('id ASC')->find();
            $this->minGroupid = $minGroup['id'];
            $this->reg_validDays = $thisAgent['regvaliddays'];
            $this->reg_groupid = $thisAgent['reggid'];
            $this->adminMp = $thisAgent['mp'];
        }
        $this->siteUrl = $f_siteUrl;
        $this->assign('f_logo', $f_logo);
        $this->assign('f_siteName', $f_siteName);
        $this->assign('f_siteTitle', $f_siteTitle);
        $this->assign('f_metaKeyword', $f_metaKeyword);
        $this->assign('f_metaDes', $f_metaDes);
        $this->assign('f_qq', $f_qq);
        $this->assign('f_qrcode', $f_qrcode);
        $this->assign('f_siteUrl', $f_siteUrl);
        $this->assign('f_regNeedMp', $f_regNeedMp);
        $this->assign('f_ipc', $f_ipc);
        $this->assign('reg_validDays', $this->reg_validDays);
    }
    protected function all_insert($name = '', $back = '/index')
    {
        $name = $name ? $name : MODULE_NAME;
        $db = D($name);
        if ($db->create() === false) {
            $this->error($db->getError());
        } else {
            $id = $db->add();
            if ($id) {
                $m_arr = array('Img', 'Text', 'Voiceresponse', 'Ordering', 'Lottery', 'Host', 'Product', 'Selfform', 'Panorama', 'Wedding', 'Vote', 'Estate', 'Reservation', 'Greeting_card');
                if (in_array($name, $m_arr)) {
                    $data['pid'] = $id;
                    $data['module'] = $name;
                    $data['token'] = session('token');
                    $data['keyword'] = $_POST['keyword'];
                    M('Keyword')->add($data);
                }
                $this->success('操作成功', U(MODULE_NAME . $back));
            } else {
                $this->error('操作失败', U(MODULE_NAME . $back));
            }
        }
    }
    protected function insert($name = '', $back = '/index')
    {
        $name = $name ? $name : MODULE_NAME;
        $db = D($name);
        if ($db->create() === false) {
            $this->error($db->getError());
        } else {
            $id = $db->add();
            if ($id == true) {
                $this->success('操作成功', U(MODULE_NAME . $back));
            } else {
                $this->error('操作失败', U(MODULE_NAME . $back));
            }
        }
    }
    protected function save($name = '', $back = '/index')
    {
        $name = $name ? $name : MODULE_NAME;
        $db = D($name);
        if ($db->create() === false) {
            $this->error($db->getError());
        } else {
            $id = $db->save();
            if ($id == true) {
                $this->success('操作成功', U(MODULE_NAME . $back));
            } else {
                $this->error('操作失败', U(MODULE_NAME . $back));
            }
        }
    }
    protected function all_save($name = '', $back = '/index')
    {
        $name = $name ? $name : MODULE_NAME;
        $db = D($name);
        if ($db->create() === false) {
            $this->error($db->getError());
        } else {
            $id = $db->save();
            if ($id) {
                $m_arr = array('Img', 'Text', 'Voiceresponse', 'Ordering', 'Lottery', 'Host', 'Product', 'Selfform', 'Panorama', 'Wedding', 'Vote', 'Estate', 'Reservation', 'Carowner', 'Carset');
                if (in_array($name, $m_arr)) {
                    $data['pid'] = $_POST['id'];
                    $data['module'] = $name;
                    $data['token'] = session('token');
                    $da['keyword'] = $_POST['keyword'];
                    M('Keyword')->where($data)->save($da);
                }
                $this->success('操作成功', U(MODULE_NAME . $back));
            } else {
                $this->error('操作失败', U(MODULE_NAME . $back));
            }
        }
    }
    protected function del_id($name = '', $jump = '')
    {
        $name = $name ? $name : MODULE_NAME;
        $jump = empty($name) ? MODULE_NAME . '/index' : $jump;
        $db = D($name);
        $where['id'] = $this->_get('id', 'intval');
        $where['token'] = session('token');
        if ($db->where($where)->delete()) {
            $this->success('操作成功', U($jump));
        } else {
            $this->error('操作失败', U(MODULE_NAME . '/index'));
        }
    }
    protected function all_del($id, $name = '', $back = '/index')
    {
        $name = $name ? $name : MODULE_NAME;
        $db = D($name);
        if ($db->delete($id)) {
            $this->ajaxReturn('操作成功', U(MODULE_NAME . $back));
        } else {
            $this->ajaxReturn('操作失败', U(MODULE_NAME . $back));
        }
    }
    //拼团订单操作记录
    function orderAction($order_id,$action_user,$order_status,$shipping_status,$pay_status,$action_place,$action_note,$log_time){
        $data = array(
            'order_id' => $order_id,
            'action_user' => $action_user,
            'order_status' => $order_status,
            'shipping_status' => $shipping_status,
            'pay_status' => $pay_status,
            'action_place' => $action_place,
            'action_note' => $action_note,
            'log_time' => $log_time,
        );
        M('Pt_order_action')->add($data);
    }
    //用户账号操作记录
    /*
        *status 【入账】1拼团失败(前台)2申请单独购买退款成功(后台)
        *status 【出账】3开团(前台)4单独购买商品(前台)5提现(前台)
     */
    function accountLog($user_id,$action_id,$money,$change_desc,$status){
        $data = array(
            'user_id' => $user_id,
            'action_id' => $action_id,
            'user_money' => $money,
            'change_time' => time(),
            'change_desc' => $change_desc,
            'status' => $status,
        );
        M('Pt_users')->where(array('user_id'=>$user_id))->setInc('user_money',$money);
        M('Pt_account_log')->add($data);
    }
}