<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <title>1977画室网站后台</title>
    <link rel="icon" href="/1977hs/Public/Uploads/img/logo.png">
    <!-- Bootstrap core CSS -->
    <link href="/1977hs/Public/Css/admin/bootstrap.min.css" rel="stylesheet">
    <script src="/1977hs/Public/Js/admin/jquery.min.js"></script>
    <script src="/1977hs/Public/Js/admin/bootstrap.min.js"></script>
    <script src="/1977hs/Public/Js/admin/docs.min.js"></script>
    <script src="/1977hs/Public/Js/admin/ie10-viewport-bug-workaround.js"></script>

    <!-- Ueditor -->
    <script type="text/javascript" charset="utf-8" src="/1977hs/Public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/1977hs/Public/ueditor/ueditor.all.min.js"></script>

    <!-- Font-awesome core CSS -->
    <link href="/1977hs/Public/Css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="/1977hs/Public/Css/admin/Homepage.css" rel="stylesheet">

    <style type="text/css">
        img{
            width: 600px;
        }
    </style>
    
</head>
<body>

<div id="page-wrapper" >
    <div class="row">
        <div class="col-md-12">        
            <h1 class="page-header">
                修改1977介绍
            </h1>
        </div>
    </div>
    <!-- 导航 -->
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
              <li><a href="<?php echo U('Aboutus/index');?>">关于1977模块</a></li>
              <li class="active">修改1977介绍</li>
            </ol>
        </div>
    </div>
    <form class="form-signin" enctype="multipart/form-data" role="form" action="<?php echo U('Aboutus/alter_introduction_handle');?>" method='post' id="form">
    <!-- 主体 -->
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
              <tbody>
                <tr>
                    <td style="width:60px;">内容:</td>
                    <td>
                        <script type="text/plain" id="editor" style="width:100%;height:500px;overflow:scroll;">
                            <?php echo ($introduction["content"]); ?>
                        </script>
                    </td>
                </tr>
              </tbody>
            </table>
            <input name="id" value="<?php echo ($introduction["id"]); ?>" type="hidden">
            <div style="float:right;"><button type="submit" class="btn btn-primary">提 交</button></div>
        </div>
    </div>
    </form>
    <!-- 说明 -->
    <div class="row">
        <div class="col-md-12">
            <div class="bs-callout bs-callout-info" id="callout-alerts-dismiss-plugin">
                <h4>说明</h4>
                <p>关于1977模块修改介绍</p>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    //实例化编辑器
    var ue = UE.getEditor('editor');
</script>
</body>
</html>