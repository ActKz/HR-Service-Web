<?php session_start();?>
<head>
    <style type="text/css"></style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../static/semantic-ui/dist/semantic.min.js"></script>
    <link href="../static/semantic-ui/dist/semantic.min.css" rel="stylesheet">
    <script src="../js/custom.js"></script>
    <link href="../css/custom.css" rel="stylesheet">
    <script type="text/javascript">
        $(document).ready(function(){$('.ui.dropdown').dropdown({on:'hover'})});
    </script>
<!--    <style>
        body{background-color:#E6E600}
    </style>-->
</head>
<body>
<div></div>
<div class="ui green inverted menu">
    <a class="item" href="../index.php">
        <i class="lightning icon"></i> Just Sudo It
    </a>
    <div class="ui pointing dropdown link item">
        <div class="text">2015-DB</div>
        <i class="dropdown icon"></i>
        <div class="menu">
            <div class="item">Lab1</div>
        </div>
    </div>
    <div class="right menu">
    <?php
        if(!isset($_SESSION['employee'])&&!isset($_SESSION['employer']))
        {
            include 'before_login.php';
        }
        else
        {
            include 'after_login.php';
        }?>
    </div>
    <div class="ui modal">
        <i class="close icon"></i>
            <div class="header">Account Type</div>
        <div class="content">
        <div class="ui medium images">
            <a href="../admin/register_er.php"><img src="../image/boss.png" id="boss_img"></a>
 <a href="../admin/register_ee.php"><img src="../image/jobseeker.png" id="jobseeker_img"></a>
        </div>
    </div>
    </div>
</div>
</body>