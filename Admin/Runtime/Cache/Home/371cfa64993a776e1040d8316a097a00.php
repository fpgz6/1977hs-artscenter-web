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

    <!-- Font-awesome core CSS -->
    <link href="/1977hs/Public/Css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="/1977hs/Public/Css/admin/Homepage.css" rel="stylesheet">

    <script type="text/javascript">

    </script>
    
</head>
<body>

<div id="page-wrapper" >
    <div class="row">
        <div class="col-md-12">        
            <h1 class="page-header">
                修改微信二维码
            </h1>
        </div>
    </div>
    <!-- 导航 -->
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
              <li><a href="<?php echo U('Consult/index');?>">联系信息</a></li>
              <li class="active">修改微信二维码</li>
            </ol>
        </div>
    </div>
    <!-- 主体 -->
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td style="width:220px;">当前微信二维码:</td>
                  <td><img src="/1977hs/Public/Uploads/img/qrcode.png" class="img-rounded" style="height:120px;"></td>
                </tr>
                <tr>
                  <td>上传新的微信二维码：</td>
                  <td><input type="file" class="form-control"></td>
                </tr>
                <tr>
                  <td>预览新的微信二维码：</td>
                  <td>上传后才能预览，请点击上传。</td>
                </tr>
              </tbody>
            </table>
            <div style="float:right;"><button type="button" class="btn btn-primary">确认修改</button></div>
        </div>
    </div>
    <!-- 说明 -->
    <div class="row">
        <div class="col-md-12">
            <div class="bs-callout bs-callout-info" id="callout-alerts-dismiss-plugin">
                <h4>说明</h4>
                <p>修改微信二维码。</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>