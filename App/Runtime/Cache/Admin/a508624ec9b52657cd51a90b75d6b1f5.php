<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Admin</title>
	<link rel="stylesheet" href="__PUBLIC__/layui/css/layui.css" />
	<link rel="stylesheet" href="__PUBLIC__/css/reset.css" />
	<link rel="stylesheet" href="__PUBLIC__/css/main.css" />
	<script src="__PUBLIC__/js/jquery-2.1.4.min.js"></script>
</head>
<body class="clearfix">
	<main class="fr">
		<header class="clearfix">
			<div class="logo fl">
				Admin
			</div>
			<nav class="fr">
				<ul class="layui-nav" lay-filter="">
				  <li class="layui-nav-item"><a href="">最新活动</a></li>
				  <li class="layui-nav-item layui-this"><a href="">产品</a></li>
				  <li class="layui-nav-item"><a href="">大数据</a></li>
				  <li class="layui-nav-item">
				    <a href="javascript:;">解决方案</a>
				    <dl class="layui-nav-child"> <!-- 二级菜单 -->
				      <dd><a href="">移动模块</a></dd>
				      <dd><a href="">后台模版</a></dd>
				      <dd><a href="">电商平台</a></dd>
				    </dl>
				  </li>
				  <li class="layui-nav-item">
				    <a href="javascript:;"><img src="__PUBLIC__/user.png" alt="" width="25"/>admin</a>
				    <dl class="layui-nav-child"> <!-- 二级菜单 -->
				      <dd><a href="">修改密码</a></dd>
				      <dd><a href="">退出登录</a></dd>
				    </dl>
				  </li>
				</ul>
			</nav>
		</header>
		<div class="layui-tab" lay-filter="demo" lay-allowclose="true">
		  <ul class="layui-tab-title">
		  		<li class="layui-this" lay-id="1">控制面板<i class="layui-icon layui-unselect layui-tab-close"></i></li>
		  </ul>
		  <div class="layui-tab-content">
		  		<div class="layui-tab-item layui-show">默认内容</div>
		  </div>
		</div>
	</main>
	<section class="fl">
		<ul class="layui-nav layui-nav-tree layui-nav-side" lay-filter="test">
		 
		  <li class="layui-nav-item layui-nav-itemed">
		    <a href="javascript:;">默认展开</a>
		    <dl class="layui-nav-child">
		      <dd><a href="javascript:;" data-type="tabAdd" data-id="" data-url="__PUBLIC__/Tpl/add.html">选项1</a></dd>
		      <dd><a href="javascript:;" data-type="tabAdd" data-id="" data-url="__PUBLIC__/Tpl/remove.html">选项2</a></dd>
		    </dl>
		  </li>
		  <li class="layui-nav-item">
		    <a href="javascript:;">解决方案</a>
		    <dl class="layui-nav-child">
		      <dd><a href="javascript:;" data-type="tabAdd" data-id="" data-url="">选项3</a></dd>
		      <dd><a href="javascript:;" data-type="tabAdd" data-id="" data-url="">选项4</a></dd>
		    </dl>
		  </li>
		  <li class="layui-nav-item"><a href="">产品</a></li>
		  <li class="layui-nav-item"><a href="">大数据</a></li>
		</ul>
	</section>
	<script src="__PUBLIC__/layui/layui.js"></script>
	<script>
		layui.use(['layer','element'],function(){
			var element=layui.element();
			 //触发事件
			  var active = {
			    tabAdd: function(){
			      //新增一个Tab项
			      element.tabAdd('demo', {
			        title: $(this).text() //用于演示
			        ,id: $(this).attr("data-id") //实际使用一般是规定好的id，这里以时间戳模拟下
			      })
			   		binds();
			    }
			    ,tabDelete: function(othis){
			      //删除指定Tab项
			      element.tabDelete('demo', '44'); //删除：“商品管理”
			    }
			    ,tabChange: function(id){
			      //切换到指定Tab项
			      element.tabChange('demo', id); //切换到：用户管理
			    }
			  };
			  
			  $('section ul li dl dd a').on('click', function(){
			    var othis = $(this), type = othis.data('type');
			    if(othis.attr("data-id")==""){
			    	othis.attr("data-id",new Date().getTime());
			    	active[type] ? active[type].call(this, othis) : '';
			    	
			    	active.tabChange(othis.attr("data-id"));
			    	$('<iframe src='+(!othis.attr("data-url")?'__PUBLIC__/Tpl/404NoFind.html':othis.attr("data-url"))+' width="" height="" data-id='+othis.attr("data-id")+'></iframe>').appendTo($(".layui-show"));
			    }else{
			    	othis.attr("data-type","tabChange");
			    	active.tabChange(othis.attr("data-id"));
			    }
			  });
			    function binds(){
				   $(".layui-tab-close").click(function(){
				   	var ids=$(this).parent().attr("lay-id");
				   	for(var i=0;i<$("section>ul dd").length;i++){
				   		if($("section>ul dd").eq(i).children().attr("data-id")==ids){
				   			$("section>ul dd").eq(i).children().attr("data-id","")
				   		}
				   	}
				   })
			    }
			  binds();
		})
		
	</script>
</body>
</html>