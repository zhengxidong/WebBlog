<?php
namespace app\manage\controller;
use think\Request;
use app\manage\model\Tag as TagModel;
/**
 *
 */
class Tag extends Base
{
  public function index()
  {
    $tag = new TagModel();
    $tagList = $tag->order('id','desc')->select();
    $this->assign('tagList',$tagList);

    return $this->view->fetch();

  }

  public function add()
  {
      $request = Request::instance();
      $data = $request->post();
      if(empty($data))
      {
        $randColor = randColor();         //随机颜色

        $randColor = hex2rgb($randColor);  //十六进制 转 RGB
        // var_dump($randColor);
        // exit;
        $this->assign('randColor',$randColor);
        return $this->view->fetch();
      }
      else
      {
        //模型操作
        $tag = new TagModel;

        $color = RGBToHex($data['color']);
        $tagData = [

          'tag_name'      => $data['tag_name'],
          'status'        => 1,
          'color'         => $color,
          'created_by'    => 'system',
          'created_on'    => date('Y-m-d H:i:s'),
        ];

        $tag->data($tagData);

        $tag->save();
        $this->redirect('tag/index');
        //$this->success('添加成功','links/index');
      }

  }

  public function edit()
  {

    $request = Request::instance();
    if(Request::instance()->isGet())
    {
       $tagId = $request->param('id');

       $tagInfo = TagModel::get($tagId);

      if(empty($tagInfo))
      {
        $this->redirect('tag/index');
        //$this->success('没有此友链信息！','links/index');
      }
       $this->assign('tagInfo',$tagInfo);

      return $this->view->fetch();
    }
    else if(Request::instance()->isPost())
    {

      $data = $request->post();

      $color = RGBToHex($data['color']);
      $tag = TagModel::get($data['id']);
      $tag->tag_name      = $data['tag_name'];
      $tag->color         = $color;
      $tag->modify_by     = 'system';
      $tag->modify_on     = date('Y-m-d H:i:s');
      $tag->save();
      $this->redirect('tag/index');
    }
    else
    {
      return $this->view->fetch();
    }

  }
}
