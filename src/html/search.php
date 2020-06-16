<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>三鱼一茶-搜索页</title>

    <!--bootstrap4-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.css">

    <!--css-->
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/theme.css">
    <link rel="stylesheet" href="../css/navigation.css">
    <link rel="stylesheet" href="../css/search.css">

    <!--icon-->
    <link rel="Shortcut Icon" href="../../img/icon/icon.png" type="image/x-icon"/>
</head>
<body>

<!--url process start-->
<?php
session_start();
?>
<!--url process end-->


<header>
    <!--navigation begin-->
    <nav>
        <div id="navigation">
            <a href="home.php">Home</a>
            <a href="browser.php">Browser</a>
            <a class="currentPage" href="search.php">Searcher</a>
        </div>
        <?php
        //如果登陆了，正常展示，最后一个为退出登录
        if (isset($_SESSION['UID'])){
            echo '<div id="userMenu"><span>UserCenter</span>
        <ul>
            <li><a href="upload.php"><img src="../../img/icon/upload.png" alt="upload" class="icon"> Upload</a>
            </li>
            <li><a href="mine.php"><img src="../../img/icon/photo.png" alt="myphoto" class="icon"> MyPhoto</a></li>
            <li><a href="favor.php"><img src="../../img/icon/favored.png" alt="favor" class="icon"> MyFavor</a>
            </li>
            <li><a href="../php/logout.php"><img src="../../img/icon/logout.png" alt="logout" class="icon"> Logout</a>
            </li>
        </ul>
        </div>';
        } //如果没登录，整个改成登录
        else {
        echo '<div id="userMenu"><a href="login.php">Login</a>';
        }
        ?>
        <br>
    </nav>
    <!--navigation end-->
</header>
<div class="searcher searchDiv bd-content" id="searcher">
    <h2 class="m-2">搜索</h2>
    <form>
        <div class="form-check form-check-inline">
            <input class="form-check-input m-2" type="radio" name="searchRadios" id="byTitle" value="option1" checked>
            <label class="form-check-label m-2" for="byTitle">
                根据标题搜索
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input m-2" type="radio" name="searchRadios" id="byDescription" value="option2">
            <label class="form-check-label m-2" for="byDescription">
                根据描述搜索
            </label>
        </div>
        <div class="form-group">
            <label for="searchTitle" class="m-2">图片标题</label>
            <input type="email" class="form-control w-75 m-2" id="searchTitle" placeholder="复旦光华楼">
        </div>
        <div class="form-group">
            <label for="searchDescription" class="m-2">图片描述</label>
            <textarea class="form-control w-75 m-2" id="searchDescription" rows="6"></textarea>
        </div>
        <button type="button" class="btn btn-secondary m-2">搜索</button>
    </form>
</div>
<div class="searchResult bd-content" id="searchResult">
    <h2 class="m-2">搜索结果</h2>
    <div class="boxOfResult">
        <a href="details.php">
            <img src="../../img/hot/2.jpg" alt="搜索图片1"></a>
        <div class="boxContent container-ellipsis">
            <a href="details.php" class="title">图片标题</a>
            <p class="content content-ellipsis">
                图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片
                描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述
                描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述
                描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述
                图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述图片描述</p>
        </div>
    </div>
</div>

<div id="page">
    <a href="browser.php">上一页</a>
    <strong>1</strong>
    <a href="browser.php">2</a>
    <a href="browser.php">3</a>
    <a href="browser.php">4</a>
    <a href="browser.php" id="pageLast">……19302010020</a>
    <a href="browser.php">下一页</a>
</div>

<!--footer begin-->
<footer>
    <hr>
    <p>沪私危备案74751号</p>
    <p>版权&copy;2001-2020 3Fish1Tea三鱼一茶 版权所有</p>
    <p>联系我们19302010020@fudan.edu.cn</p>
</footer>
<!--footer end-->


<!--bootstrap4-->
<script src="../bootstrap4/jquery-3.5.1.min.js"></script>
<script src="../bootstrap4/popper.min.js"></script>
<script src="../bootstrap4/js/bootstrap.js"></script>

<!--js-->
<script src="../js/textEllipsis.js"></script>

</body>
</html>