<?php
/**
 *  AUTHOR:CMB
 *  DATE:2015/6/10
 *  FUNCTION:首页模块（后台）
 */
namespace Home\Controller;
use Think\Controller;
class HomepageController extends CommonController {
	
    /* 主页显示 */
    public function index(){
        // 取左幻灯片
        $where = array('leftOrRight' => C('左'));
        $this->scrollLeft  = M('scroll')->where($where)->order('sort')->select();
        // 取右幻灯片
        $where = array('leftOrRight' => C('右'));
        $this->scrollRight = M('scroll')->where($where)->order('sort')->select();
        // 显示模板
        $this->display();
    }

    ///////////////////////////////////////////////////////////////////////////
    ///////////////////////////////    分割线     //////////////////////////////
    ///////////////////////////////////////////////////////////////////////////

    /* 添加左幻灯片界面 */
    public function add_left(){
        // 显示模板
    	$this->display();
    }

    /* 添加左幻灯片处理 */
    public function add_left_handle(){
        // 输入限制
        if($_POST['img'] == 0 ){
            $this->error("请选择图片上传");
        }
        // 图片上传
        $pic_adr = $this->uploadImage();
        if($pic_adr == -1){
            echo '图片上传错误';
            die;
        }
        // 获取操作者
        $loginname = $_SESSION['loginname'];
        // 读取所有数据，为了排序
        $where = array('leftOrRight' => C('左'));
        $dataRead = M('scroll')->where($where)->select();
        if($_POST['optionsRadios'] == C('TOP')){
            // 置顶
            $sort = $this->sortGetTop($dataRead,'scroll');
        }else{
            // 非置顶
            $sort = $this->sortGetBottom($dataRead);
        }
        // 构造数据
        $data = array(
            'pic_adr'      => $pic_adr,
            'leftOrRight'  => C('左'),
            'sort'         => $sort,
            'controller'   => $_SESSION['loginname'],
            'created_time' => Date('Y-m-d H:i:s')
        );
        // 数据插入
        if(!M('scroll')->add($data))
        {
            echo 'scroll表插入数据错误';die;
        }else{
            $this->success('添加成功',U('Homepage/index'));
        }
    }

    /* 修改左幻灯片界面 */
    public function alter_left(){
        // 获取参数
        $id            = $_GET['id'];
        // 获取当前处理的数据
        $data          = M('scroll')->find($id);
        $this->id      = $id;
        $this->pic_adr = $data['pic_adr'];
        // 显示模板
        $this->display();
    }

    /* 修改左幻灯片处理 */
    public function alter_left_handle(){
        // 输入限制
        if($_POST['img'] == 0 ){
            $this->error("请选择图片上传");
        }
        // 获取参数
        $id            = $_POST['id'];
        // 获取当前处理的数据
        $data          = M('scroll')->find($id);
        $filename      = $_SERVER['DOCUMENT_ROOT']. __ROOT__ . $data['pic_adr'];
        // 图片上传
        $pic_adr = $this->uploadImage();
        if($pic_adr == -1){
            echo '图片上传错误';
            die;
        }
        // 获取操作者
        $loginname = $_SESSION['loginname'];
        // 构造数据
        $data = array(
            'id'           => $id,
            'pic_adr'      => $pic_adr,
            'controller'   => $_SESSION['loginname'],
            'created_time' => Date('Y-m-d H:i:s')
        );
        // 判断删除文件是否成功
        if($this->deleteFile($filename) == 1)
        {
            M('scroll')->data($data)->save();
            $this->success('修改成功',U('Homepage/index'));
        }else{
            echo "删除文件错误";
        }   
    }

    /* 删除左幻灯片处理*/
    public function delete_left_handle(){
        // 获取参数
        $id           = $_GET['id'];
        // 获取当前处理的数据
        $current_data = M('scroll')->find($id);
        $filename     = $_SERVER['DOCUMENT_ROOT']. __ROOT__ . $current_data['pic_adr'];
        // 获取排在当前数据后面的元素
        $data         = M('scroll')->where('sort > %d AND leftOrRight = %d',$current_data['sort'],C('左'))->select();
        for($i=0;$i<COUNT($data);$i++){
            $data[$i]['sort'] -= 1;
            M('scroll')->data($data[$i])->save();
        } 
        // 判断删除文件是否成功   
        if($this->deleteFile($filename) == 1)
        {
            M('scroll')->delete($id);
            $this->success('删除成功');
        }else{
            echo "删除文件错误";
        }          
    }

        /* 排序左幻灯片处理*/
    public function sort_left_handle(){
        // 获取参数
        $id   = $_GET['id'];
        $type = $_GET['type'];
        // 获取当前处理的数据
        $c1_data = M('scroll')->find($id);
        $c1_sort = $c1_data['sort'];
        // 获取要对换的数据
        if($type == 'up'){
            $c2_sort = $c1_sort-1;
        }else{
            $c2_sort = $c1_sort+1;
        }
        $where   = array('sort' => $c2_sort , 'leftOrRight' => C('左'));
        $c2_data = M('scroll')->where($where)->find();
        // 排序对换
        $c1_data['sort'] = $c2_sort;
        $c2_data['sort'] = $c1_sort;
        M('scroll')->data($c1_data)->save();
        M('scroll')->data($c2_data)->save();
        $this->success('排序成功');
    }

    ///////////////////////////////////////////////////////////////////////////
    ///////////////////////////////    分割线     //////////////////////////////
    ///////////////////////////////////////////////////////////////////////////

    /* 添加右幻灯片界面 */
    public function add_right(){
        // 获取数据
        $where = array('leftOrRight' => C('右'));
        $data = M('scroll')->where($where)->select();
        // 判断是否超过三张
        if(COUNT($data) >= 3){
            $this->error('右幻灯片已经有三张，请删除后再添加或者执行修改操作。');
        }else{
		  $this->display();
        }
    }

    /* 添加右幻灯片处理 */
    public function add_right_handle(){
        // 输入限制
        if($_POST['img'] == 0 ){
            $this->error("请选择图片上传");
        }
        // 图片上传
        $pic_adr = $this->uploadImage();
        if($pic_adr == -1){
            echo '图片上传错误';
            die;
        }
        // 获取操作者
        $loginname = $_SESSION['loginname'];
        // 读取所有数据，为了排序
        $where = array('leftOrRight' => C('右'));
        $dataRead = M('scroll')->where($where)->select();
        if($_POST['optionsRadios'] == C('TOP')){
            // 置顶
            $sort = $this->sortGetTop($dataRead,'scroll');
        }else{
            // 非置顶
            $sort = $this->sortGetBottom($dataRead);
        }
        // 构造数据
        $data = array(
            'pic_adr'      => $pic_adr,
            'leftOrRight'  => C('右'),
            'sort'         => $sort,
            'controller'   => $_SESSION['loginname'],
            'created_time' => Date('Y-m-d H:i:s')
        );
        // 数据插入
        if(!M('scroll')->add($data))
        {
            echo 'scroll表插入数据错误';die;
        }else{
            $this->success('添加成功',U('Homepage/index'));
        }
    }

    /* 修改右幻灯片界面 */
    public function alter_right(){
        // 获取参数
        $id            = $_GET['id'];
        // 获取当前处理的数据
        $data          = M('scroll')->find($id);
        $this->id      = $id;
        $this->pic_adr = $data['pic_adr'];
        // 显示模板
        $this->display();
    }

    /* 修改右幻灯片处理 */
    public function alter_right_handle(){
        // 输入限制
        if($_POST['img'] == 0 ){
            $this->error("请选择图片上传");
        }
        // 获取参数
        $id            = $_POST['id'];
        // 获取当前处理的数据
        $data          = M('scroll')->find($id);
        $filename     = $_SERVER['DOCUMENT_ROOT']. __ROOT__ . $data['pic_adr'];
        // 图片上传
        $pic_adr = $this->uploadImage();
        if($pic_adr == -1){
            echo '图片上传错误';
            die;
        }
        // 获取操作者
        $loginname = $_SESSION['loginname'];
        // 构造数据
        $data = array(
            'id'           => $id,
            'pic_adr'      => $pic_adr,
            'controller'   => $_SESSION['loginname'],
            'created_time' => Date('Y-m-d H:i:s')
        );
        // 判断删除文件是否成功
        if($this->deleteFile($filename) == 1)
        {
            M('scroll')->data($data)->save();
            $this->success('修改成功',U('Homepage/index'));
        }else{
            echo "删除文件错误";
        }   
    }

    /* 删除右幻灯片处理*/
    public function delete_right_handle(){
        // 获取参数
        $id           = $_GET['id'];
        // 获取当前处理的数据
        $current_data = M('scroll')->find($id);
        $filename     = $_SERVER['DOCUMENT_ROOT']. __ROOT__ . $current_data['pic_adr'];
        // 获取排在当前数据后面的元素
        $data         = M('scroll')->where('sort > %d AND leftOrRight = %d',$current_data['sort'],C('右'))->select();
        for($i=0;$i<COUNT($data);$i++){
            $data[$i]['sort'] -= 1;
            M('scroll')->data($data[$i])->save();
        }
        // 判断删除文件是否成功    
        if($this->deleteFile($filename) == 1)
        {
            M('scroll')->delete($id);
            $this->success('删除成功');
        }else{
            echo "删除文件错误";
        }    
    }

    /* 排序右幻灯片处理*/
    public function sort_right_handle(){
        // 获取参数
        $id   = $_GET['id'];
        $type = $_GET['type'];
        // 获取当前处理的数据
        $c1_data = M('scroll')->find($id);
        $c1_sort = $c1_data['sort'];
        // 获取要对换的数据
        if($type == 'up'){
            $c2_sort = $c1_sort-1;
        }else{
            $c2_sort = $c1_sort+1;
        }
        $where   = array('sort' => $c2_sort , 'leftOrRight' => C('右'));
        $c2_data = M('scroll')->where($where)->find();
        // 排序对换
        $c1_data['sort'] = $c2_sort;
        $c2_data['sort'] = $c1_sort;
        M('scroll')->data($c1_data)->save();
        M('scroll')->data($c2_data)->save();
        $this->success('排序成功');
    }

}