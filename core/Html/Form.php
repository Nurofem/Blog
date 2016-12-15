<?php

namespace Core\Html;

class Form{

    //包裹html代码的 元素
    protected $tag = 'div';
    //数据
    protected $data;

    public function __Construct($data = array())
    {
        $this->data = $data;
    }


    //设置包裹元素
    public function setTag($tag)
    {
        $this->tag = $tag;
    }
    //给input添加一层html代码
    //@parameter $class 包裹的样式
    //@parameter $html 要包裹的html代码

    protected function surround($html, $class="form-group")
    {
        return "<{$this->tag} class={$class}>{$html}</{$this->tag}>";
    }
    //获取数组中的值并当作默认值数用
    //@parameter $key input 中的name值
    protected function getData($key)
    {
    
      if(is_object($this->data) && isset($this->data->$key))
      {
          return $this->data->$key;
      }
        
      elseif(array_key_exists($key , $this->data))
      {
          return $this->data[$key];
      }
      return null;
    }
    // 添加一个input标签
    //@parameter $name input标签名
    //@parameter $type 标签的属性
    //@parameter $value 标签默认值
    //@parameter $options 标签的其他属性 
    public function input($name ,$type  ,$options=null)
    {
       

        $input = "<input name={$name} type={$type} value='{$this->getData($name)}' ";
        
        
        if($options == null)
        {
            return $this->surround($this->label($name).$input .='>');
        }
        foreach($options as $key => $val)
        {
            $input .= $key."=".$val.' ';
        }
        return $this->surround($this->label($name).$input.='>');

    }

    //创建一个button
    //@parameter $content button 的内容
    public function button($content , $class="")
    {
        
        return $this->surround("<button type='submit' class='btn btn-primary ".$class."'>{$content}</button>");
    }

    //创建一个label标签
    public function label($for)
    {
        return "<label for={$for} class='control-label'>{$for}:</label>";
    }

    public function textarea($name, $class="")
    {
        $html =  " <textarea name={$name} class={$class}>{$this->getData($name)}</textarea>";
        return $this->surround($this->label($name).$html);
    }
    
    public function select($name, $list ,$class='')
    {
        $html = "<select name={$name} class={$class}>";
        
        
        foreach($list as $key=> $value)
        {
            $selected = '';
            if(!empty($this->data) && $this->data->$name == $key)
            {
                $selected = 'selected';
            }
            $html.= "<option value={$key} {$selected}>{$value}</option>";
        }
        $html.="</select>";
        return $html;
    }

    public function hidden($name, $value)
    {
        return "<input name={$name} , value={$value} type='hidden' class='form-control' >";
    }

}