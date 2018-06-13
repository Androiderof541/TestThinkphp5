<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use app\common\model\Teacher;
class TeacherController extends Controller{
	public function index(){
		$Teacher = new Teacher;
		$teachers = $Teacher->select();
		$this->assign('teachers',$teachers);
		$htmls = $this->fetch();
		return $htmls;

	}
	public function insert(){
		/*$teacher = array();
		$teacher['name'] = "王五";
		$teacher['sex'] = 1;
		$teacher['email'] = "lizhiwu@qq.com";
		$teacher['username'] = "lizhiwu";
		var_dump($teacher);

		$Teacher = new Teacher();
		$sta = $Teacher->data($teacher)->save();
		return $teacher['name'].'插入成功';*/
		/*$Teacher = new Teacher();
		$Teacher->name = '李四';
		$Teacher->sex = 1;
		$Teacher->email = "lizhiwu@163.com";
		$Teacher->username = "lisi";
		var_dump($Teacher->save());
		return $Teacher->name.'成功'.'id是'.$Teacher->id;*/
		var_dump($_POST);
		$postData = Request::instance()->post();
		$Teacher = new Teacher();
		$Teacher->name = $postData['name'];
		$Teacher->sex = $postData['sex'];
		$Teacher->email = $postData['email'];
		$Teacher->username = $postData['username'];
		$reuslt = $Teacher->validate(true)->save($Teacher->getData());
		

		if (false==$result) {
			# code...
			return "新增失败：".$Teacher->getError();
		}else{
			return "新增成功：".$Teacher->id;
		}
		/*$Teacher->save();
		return "新增成功,id为".$Teacher->id;*/

	}

	public function add(){
		$html = $this->fetch();
		return $html;
	}
}