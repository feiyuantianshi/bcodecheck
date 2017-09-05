<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <title>匠迪云</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="/Public/Images/favicon.ico"/>
    <link rel="stylesheet" href="/Public/Css/bootstrap.css">
    <link rel="stylesheet" href="/Public/Css/common.css">
    <link rel="stylesheet" href="/Public/Css/header.css">

    <script src="/Public/Js/jquery-3.1.1.min.js"></script>
    <script src="/Public/Js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default ">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img src="/Public/Images/logo1.png" alt="" title="匠迪云安全"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" >

            <ul class="nav navbar-nav ">
                <li><a href="<?php echo U('Index/index');?>" class="navA index">首页</a></li>
                <li><a href="<?php echo U('Scan/scan');?>" class="navA scan">代码扫描</a></li>
                <li><a href="<?php echo U('Analysis/issues');?>" class="navA issues" >代码分析</a></li>
                <li><a href="<?php echo U('History/history');?>" class="navA history">工程管理</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown user_down"><a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true">您好，<?php echo ($_SESSION['user_name']); ?><span class="caret"></span></a>
                    <ul class="dropdown-menu user_menu">
                        <li class="usemes-li"><a href="<?php echo U('Userinfo/userinfo');?>" class="user_data"><span class="use usemes" ></span> 用户信息</a></li>
                        <li class="usepas-li"><a href="<?php echo U('Changepas/changepas');?>" class="user_data"><span class="use usepas"></span> 修改密码</a></li>
                        <li><a href="mailto:hr@Obsec.net?Subject=代码扫描平台用户建议" class="user_data"><span class="use "></span> 用户建议</a></li>
                    </ul>
                </li>
                <li><a href="/Home/Logout/logout" class="navA"><span class="glyphicon glyphicon-log-out"></span>注销</a></li>
            </ul>
        </div>
    </div>
</nav>
<script>
    $(function(){
        var file = "<?php echo ($_SERVER['PATH_INFO']); ?>";
        if(file == 'Scan/scan'){
            $('.scan').css('border-bottom','4px solid #65b6fc');
        }else if(file.indexOf("Analysis/issues") >= 0 || file.indexOf("Analysis/issues_bro") >= 0 || file.indexOf("Analysis/online") >= 0){
            $('.issues').css('border-bottom','4px solid #65b6fc');
        }else if(file == 'History/history' || file == 'Task/task'){
            $('.history').css('border-bottom','4px solid #65b6fc');
        }else if(file == 'Userinfo/userinfo'){
            $('.usemes').css('background-position','0 -30px');
            $('.usemes-li a').css('color','#145876');
        }else if(file == 'Changepas/changepas'){
            $('.usepas').css('background-position','-40px -30px');
            $('.usepas-li a').css('color','#145876');
        }else if(file == 'Index/index'){
			$('.index').css('border-bottom','4px solid #65b6fc');
		}
    });

    $('.user_down').click(function(){
        if( $('.user_menu').css('display') == 'none'){
            $('.user_menu').css('display','block');
        }else{
            $('.user_menu').css('display','none');
        }

    });
</script>

<link rel="stylesheet" href="/Public/Css/caf.css">
<link rel="stylesheet" href="/Public/Css/jeuic.css">
<link rel="stylesheet" href="/Public/Css/table.css">

<div class="container">
    <div class="row rowpiece">
        <div class="col-xs-4 col-sm-2 col-md-2 col-lg-1 subhead" ><a id="zong" href="<?php echo U('Home/Analysis/issues/info_id/'.$_GET['info_id']);?>">总览视图</a></div>
        <div class="col-xs-4 col-sm-2 col-md-2 col-lg-1 subhead"><a href="<?php echo U('Home/Analysis/issues_bro/info_id/'.$_GET['info_id']);?>">分览视图</a></div>
        <div class="col-xs-4 col-sm-2 col-md-2 col-lg-1 subhead" style=" background-color:rgba(34,41,48,.6);"><a href="<?php echo U('Home/Analysis/online/info_id/'.$_GET['info_id']);?>">在线审计</a></div>
    </div>
    <div class="row rowpiece type_language">
        <div  class="row tab-content" style="margin-top: 1rem">
            <div class="tab-pane fade in active" id="first">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 rl lee">
                    <div class="message-left">
                        <div class="level-con">
                            <div class="part4" type="4">
                                <p>忽略</p>
                                <p style="color: #c31f26" class="grade_gnore"></p>
                            </div>
                            <div class="part4" type="1">
                                <p>高</p>
                                <p style="color: #c31f26" class="grade_high"></p>
                            </div>
                            <div class="part4" type="2">
                                <p>中</p>
                                <p style="color: #dac82c" class="grade_mi"></p>
                            </div>
                            <div class="part4" type="3">
                                <p>低</p>
                                <p style="color: #199d2b" class="grade_low"></p>
                            </div>
                            <div class="part4" type="5" style="background: #1f2938">
                                <p>所有</p>
                                <p style="color: #0978b7" class="grade_con"></p>
                            </div>
                        </div>
                        <div class="tree-con">
                            <!--滚动条-->
                            <div class="scroll-container">
                                <div class="scroll">

                                    <!--！！！！！！！！！！！！！树形图！！！！！！！！！！！！！！-->
                                    <div class="je-tree" id="trees" >
                                    </div>
                                    <!--！！！！！！！！！！！！！树形图！！！！！！！！！！！！！！-->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 rl ree">
                    <div class="message-right">
                        <!--上面结构标题-->
                        <ul  class="nav nav-tabs cre-ul" style="height:28px;line-height: 28px">
                            <li>
                                代码详情
                            </li>
                            <!--推入标题-->
                        </ul>

                        <div class="iframe-con">
                            <iframe src="" frameborder="0" class="iframe"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/Public/Js/bootstrap-table.js"></script>
<script src="/Public/Js/jeTreeC.js"></script>
<script>
</script>
<script>

    online_data ();
    //高中低筛选刷新
    $('.part4').click(function(){
        $(this).css('background','#1f2938');
        $(this).siblings('.part4').css('background','#2a323d');
        var grade_status = $(this).attr('type');
        online_data(grade_status);
    });

    function online_data(grade_status,xs_view){

        info_id = "<?php echo ($_GET['info_id']); ?>";
        $.ajax({
            url: '/Home/Analysis/online_data',
            type: "post",
            async : false,
            data : {'info_id':info_id,'grade_status':grade_status},
            success: function (data){
                data_json = data.online_res;
                var grade_high = data.grade_status_num.high ? data.grade_status_num.high : 0 ;//高
                var grade_mi = data.grade_status_num.mi ? data.grade_status_num.mi : 0 ;//中
                var grade_low = data.grade_status_num.low ? data.grade_status_num.low : 0 ;//低
                var grade_gnore = data.grade_status_num.gnore ? data.grade_status_num.gnore : 0 ;//忽略
                var grade_con = data.grade_status_num.grade_con ? data.grade_status_num.grade_con : 0 ;//忽略
                $('.grade_high').html(grade_high);
                $('.grade_mi').html(grade_mi);
                $('.grade_low').html(grade_low);
                $('.grade_gnore').html(grade_gnore);
                $('.grade_con').html(grade_con);
            },
            error:function(){
                alert('数据获取失败');
            }
        });

   jsonlist = data_json;
        var arr = [];
        $("#trees").jeTree({
            datas:jsonlist,
            itemfun:function (item) {
                if(item.childlist.length == 0){
                    $(".folderleaf").css({"background":"url(/Public/Images/checked.png) no-repeat","background-position":"0 5px"})
                    $("li[treeid="+item.tid+"] .folderleaf").css({"background":"url(/Public/Images/checked.png) no-repeat","background-position":"0 -36px"})
                    //获获兄弟节点
                    var next = $("li[treeid="+item.tid+"]").next().attr('treeid');
                    var prev = $("li[treeid="+item.tid+"]").prev().attr('treeid');
                    if(next){
                        var xs_view = next;
                    }else{
                        var xs_view = prev;
                    }
                    if(!xs_view){
                        xs_view = item.tid;
                    }
                    //获取漏洞等级
                    var grade_status = item.grade_status;

                    var data_id = item.data_id;
                    var info_id = item.info_id;
                    var url = encodeURI('/Home/Analysis/online_right?data_id='+data_id+'&info_id='+info_id+'&xs_view='+xs_view+'&grade_status='+grade_status);
                    $('.iframe').attr('src',url);
                    // 点击5个问题出现
                    $(".opera").css("display","none");
                    $("li[treeid="+item.tid+"] .opera").css("display","none");
                    // 判断标题的重复性
                    arr = [];
                    $(".cre-ul .cre-li").each(function (){
                        arr.push($(this).attr("ids"));
                    })
                    var res = $.inArray(item.tid,arr);
                    if(res == -1){
                        creTitle(item.tid,item.name,data_id,info_id,xs_view,grade_status);
                        $(".cre-li[ids="+item.tid+"]").siblings().removeClass('active');
                    }else{
                        $(".cre-li[ids="+item.tid+"]").siblings().removeClass('active');
                        $(".cre-li[ids="+item.tid+"]").addClass('active');
                    }
                }
            }
        });
        //审计过后改变颜色
        $('.li-relative').each(function(){
            if($(this).attr('leak_sort') == 1){
                $(this).find('.folderleaf').css('color','green');
            }
        });

        //自动加载下一个数据
        $("li[treeid="+xs_view+"]").parent().parent().find('a').addClass('foldershow');
        $("li[treeid="+xs_view+"]").parent().css('display','block');
        $("li[treeid="+xs_view+"] .folderleaf").css({"background":"url(/Public/Images/checked.png) no-repeat","background-position":"0 -36px"})
        var name = $("li[treeid="+xs_view+"] .folderleaf").html();
        var data_id = $("li[treeid="+xs_view+"]").attr('data_id');
        var info_id = $("li[treeid="+xs_view+"]").attr('info_id');
        if(xs_view && data_id && info_id){
            var arr = [];
            $(".cre-ul .cre-li").each(function (){
                arr.push($(this).attr("ids"));
            })
            var res = $.inArray(xs_view,arr);
            if(res == -1){
                creTitle(xs_view,name,data_id,info_id,xs_view,grade_status) //添加title
                $(".cre-li[ids="+xs_view+"]").siblings().removeClass('active');
            }else{
                $(".cre-li[ids="+xs_view+"]").siblings().removeClass('active');
                $(".cre-li[ids="+xs_view+"]").addClass('active');
            }

            if($(".cre-li[ids="+xs_view+"]").attr('active') == 'active'){
                 //获获兄弟节点
                 var next = $("li[treeid="+xs_view+"]").next().attr('treeid');
                 var prev = $("li[treeid="+xs_view+"]").prev().attr('treeid');

                 if(next){
                 var xs_view = next;
                 }else{
                 var xs_view = prev;
                 }
                 if(!xs_view){
                 xs_view = 'M00'+data_id;
                 }
            }

            var url = encodeURI('/Home/Analysis/online_right?data_id='+data_id+'&info_id='+info_id+'&xs_view='+xs_view+'&grade_status='+grade_status);
            $('.iframe').attr('src',url);
        }
    }
    //    创建标题
    function creTitle(id,name,data_id,info_id,xs_view,grade_status){
        var creLi = "<li class='cre-li active' active='' data_id='"+data_id+"' info_id='"+info_id+"' xs_view='"+xs_view+"' grade_status='"+grade_status+"' ids='"+id+"'><a href='#tabmessage' data-toggle='tab' class='cre-title' index = "+id+" title = "+name +"> "+name+"  </a><span class='cre-close'></span></li>";
        $(".cre-ul").append(creLi);
        $(".cre-title[index="+id+"]").parent().prev().attr('active','');
        $(".cre-title[index="+id+"]").parent().attr('active','active');
    }
    //    点击标题添加active
    $(".cre-ul").on("click",".cre-title",function(){
        var data_id = $(this).parent().attr('data_id');
        var info_id = $(this).parent().attr('info_id');
        var ids = $(this).parent().attr('ids');
        //获获兄弟节点
        var next = $("li[treeid="+ids+"]").next().attr('treeid');
        var prev = $("li[treeid="+ids+"]").prev().attr('treeid');
        if(next){
            var xs_view = next;
        }else{
            var xs_view = prev;
        }
        if(!xs_view){
            xs_view = ids;
        }
        var grade_status = $(this).parent().attr('grade_status');
        $("li[active='active']").attr('active','');
        $(this).parent().attr('active','active');
        var url =  '/Home/Analysis/online_right?data_id='+data_id+'&info_id='+info_id+'&xs_view='+xs_view+'&grade_status='+grade_status;
        $('.iframe').attr('src',url);
    })
    //   点击删除标题
    $(".cre-ul").on("click",".cre-close",function(){
        var active_num = $(this).parent().index(); //获取选中元素的位置
        var li_leng = $('.cre-ul .cre-li').length; //获取li数量
        var active =  $(this).parent().attr('active');
        if(active_num == 1 && active == 'active'){
            //如果第一个被选中，删除，赋值后一个
            var data_id = $(this).parent().next().attr('data_id');
            var info_id = $(this).parent().next().attr('info_id');
            var ids = $(this).parent().next().attr('ids');
            //获获兄弟节点
            var next = $("li[treeid="+ids+"]").next().attr('treeid');
            var prev = $("li[treeid="+ids+"]").prev().attr('treeid');
            if(next){
                var xs_view = next;
            }else{
                var xs_view = prev;
            }

            if(!xs_view){
                xs_view = ids;
            }
            var grade_status = $(this).parent().next().attr('grade_status');
            $(this).parent().next().addClass('active');
            $(this).parent().next().attr('active','active');
            $(this).parent().remove();
        }else if(active_num != 1 && active == 'active'){
            //如果选中的被删除，样式赋值到前一个
            var data_id = $(this).parent().prev().attr('data_id');
            var info_id = $(this).parent().prev().attr('info_id');
            var ids = $(this).parent().prev().attr('ids');
            //获获兄弟节点
            var next = $("li[treeid="+ids+"]").next().attr('treeid');
            var prev = $("li[treeid="+ids+"]").prev().attr('treeid');
            if(next){
                var xs_view = next;
            }else{
                var xs_view = prev;
            }

            if(!xs_view){
                xs_view = ids;
            }
            var grade_status = $(this).parent().prev().attr('grade_status');
            $(this).parent().prev().addClass('active');
            $(this).parent().prev().attr('active','active');
            $(this).parent().remove();
        }else{
            //删除未选中的
            var data_id = $("li[active='active']").attr('data_id');
            var info_id = $("li[active='active']").attr('info_id');
            var ids = $("li[active='active']").attr('ids');
            //获获兄弟节点
            var next = $("li[treeid="+ids+"]").next().attr('treeid');
            var prev = $("li[treeid="+ids+"]").prev().attr('treeid');
            if(next){
                var xs_view = next;
            }else{
                var xs_view = prev;
            }

            if(!xs_view){
                xs_view = ids;
            }
            var grade_status = $("li[active='active']").attr('grade_status');
            $(this).parent().remove();
        }
        if(li_leng != 1){
            var url = '/Home/Analysis/online_right?data_id='+data_id+'&info_id='+info_id+'&xs_view='+xs_view+'&grade_status='+grade_status;
            $('.iframe').attr('src',url);
        }else{
            $('.iframe').attr('src','');
        }

    })
    //    删除指定元素
    function removeByValue(arr0, val) {
        for(var i=0; i<arr0.length; i++) {
            if(arr0[i] == val) {
                arr0.splice(i, 1);
                break;
            }
        }
    }


    //树形及右侧父级赋高
    giveHeight()
    function giveHeight(){
        var winHeight = $(window).height();
//       树形赋高
        var treeConTop = $(".tree-con").offset().top;

        var treeConHeight = winHeight - treeConTop -6;

        if(treeConHeight >= 500){
            treeConHeight = 500
        }else{
            treeConHeight = treeConHeight;
        }
        $(".tree-con").css({"height":treeConHeight});
//右侧赋高
        var iframeConTop= $(".iframe-con").offset().top;
        var iframeConHeight = winHeight - iframeConTop - 7;

        if(iframeConHeight >= 552){
            iframeConHeight = 552
        }else{
            iframeConHeight = iframeConHeight;
        }
        $(".iframe-con").css("height",iframeConHeight);

    }

</script>

</body>
</html>