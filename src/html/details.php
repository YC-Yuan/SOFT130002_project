<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>三鱼一茶-图片详情</title>

    <!--bootstrap4-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.css">

    <!--css-->
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/theme.css">
    <link rel="stylesheet" href="../css/navigation.css">
    <link rel="stylesheet" href="../css/details.css">

    <!--icon-->
    <link rel="Shortcut Icon" href="../../img/icon/icon.png" type="image/x-icon"/>

</head>
<body onresize="changeLine()" onload="changeLine()">
<header>
    <!--navigation begin-->
    <nav>
        <div id="navigation">
            <a href="home.php">首页</a>
            <a href="browser.php">浏览页</a>
            <a href="search.html">搜索页</a>
        </div>
        <div id="userMenu"><span>个人中心</span>
            <ul>
                <li><a href="upload.html"><img src="../../img/icon/upload.png" alt="upload" class="icon">上传照片</a></li>
                <li><a href="mine.html"><img src="../../img/icon/photo.png" alt="upload" class="icon">我的照片</a></li>
                <li><a href="favor.html"><img src="../../img/icon/favored.png" alt="upload" class="icon">我的收藏</a></li>
                <li><a href="login.html"><img src="../../img/icon/account.png" alt="upload" class="icon">登入</a>
                </li>
            </ul>
        </div>
        <br>
    </nav>
    <!--navigation end-->
</header>

<!--details begin-->
<?php
require_once('config.php');
try {
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //按图片ID搜索图片
    $imgId = $_GET['imgId'];
    $sql = 'SELECT * FROM `travelimage` WHERE ImageID=' . $imgId;
    $result = $pdo->query($sql);
    $img = $result->fetch();
    $pdo = null;

    $imgTitle = $img['Title'];
    $imgDescription = $img['Description'];
    $imgContent = $img['Content'];
    $imgPath=$img['PATH'];

    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $imgCity = $img['CityCode'];
    if ($imgCity != null) {
        $sql = 'SELECT * FROM `geocities` WHERE GeoNameID=' . $imgCity;
        $result = $pdo->query($sql);
        $geo = $result->fetch();
        $imgCity = $geo['AsciiName'];
    } else {
        $imgCity = 'unknown';
    }
    $pdo = null;


    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $imgCountry = $img['Country_RegionCodeISO'];
    if ($imgCountry != null) {
        $sql = 'SELECT * FROM `geocountries_regions` WHERE ISO="' . $imgCountry . '"';
        $result = $pdo->query($sql);
        $geo = $result->fetch();
        $imgCountry = $geo['Country_RegionName'];
    } else {
        $imgCountry = 'unknown';
    }
    $pdo = null;


} catch (PDOException $e) {
    die($e->getMessage());
}
?>
<div class="container bd-form pt-1 pb-1 repository-color">
    <div class="row my-0 justify-content-center">
        <img class="w-100" src="../../img/large/<?php echo $imgPath?>" alt="The Photo">
    </div>
    <div class="row my-2 justify-content-center">
        <p class="text-mid m-0"><span id="title" class="info-img"><?php echo $imgTitle; ?></span> by <span id="Author"
                                                                                                           class="info-img">Author</span>
        </p>
    </div>
    <div class="row my-2 justify-content-center">
        <button type="button" class="btn btn-default btn-lg" onclick="alert('收藏功能建设中');">
            <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span> 收藏
        </button>
    </div>
    <div class="row my-2 justify-content-center">
        <div class="col-3 justify-content-center text-big">主题：<span class="info-img"><?php echo $imgContent; ?></span>
        </div>
        <div class="col-3 justify-content-center text-big">国家：<span class="info-img"><?php echo $imgCountry; ?></span>
        </div>
        <div class="col-3 justify-content-center text-big">城市：<span class="info-img"><?php echo $imgCity; ?></span>
        </div>
    </div>
    <div class="row my-2 justify-content-center">
        <p class="title text-mid">图片描述：</p>
        <div class="col-10 justify-content-center text-mid content mt-2">
            <?php
            echo $imgDescription;
            ?>
        </div>
    </div>
</div>
<!--details end-->

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
<script src="../js/imgSquare.js"></script>
</body>
</html>