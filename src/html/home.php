<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>三鱼一茶-主页</title>

    <!--bootstrap4-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.css">

    <!--css-->
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/theme.css">
    <link rel="stylesheet" href="../css/navigation.css">
    <link rel="stylesheet" href="../css/home.css">

    <!--icon-->
    <link rel="Shortcut Icon" href="../../img/icon/icon.png" type="image/x-icon"/>

</head>
<body>
<header>
    <!--navigation begin-->
    <nav>
        <div id="navigation">
            <a class="currentPage" href="home.php">首页</a>
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

    <!--homeCarousel begin-->
    <div id="homeCarousel" class="carousel slide carousel-fade w-75 m-auto" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="../../img/homeCarousel/1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../../img/homeCarousel/2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../../img/homeCarousel/3.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#homeCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#homeCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--homeCarousel end-->
</header>

<!--hotImages begin-->
<?php
require_once('config.php');
function echoHotDiv($random)
{
    try {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //按收藏数量排序选择图片
        $sql = 'SELECT travelimage.* FROM travelimage
           INNER JOIN travelimagefavor on travelimage.ImageID =  travelimagefavor.ImageID
             GROUP BY travelimage.ImageID
             ORDER BY COUNT(travelimagefavor.ImageID) DESC';
        $result = $pdo->query($sql);
        $rowNum = $result->rowCount();

        if ($random) {
            $time = rand(0, $rowNum - 6);
            for ($i = 0; $i < $time; $i++) {
                $row = $result->fetch();
            }
        }

        for ($i = 0; $i < 3; $i++) {
            echo '<div class="row  mx-0">';
            echo '<div class="col-12 col-xl-6 my-2">';
            $row = $result->fetch();
            echoHotImg($row);
            echo '</div>';
            echo '<div class="col-12 col-xl-6 my-2">';
            $row = $result->fetch();
            echoHotImg($row);
            echo '</div>';
            echo '</div>';
        }
        $pdo = null;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function echoHotImg($img)
{
    $imgPath = $img['PATH'];
    $imgTitle = $img['Title'];
    $imgDescription = $img['Description'];
    $imgId = $img['ImageID'];
    echo '<div class="homeHotImg bd-content">';
    echo '<a href="details.php?imgId=' . $imgId . '"><img src="../../img/large/' . $imgPath . '" alt="首页热门图1"></a>';
    echo '<div class="hotDiv container-ellipsis">';
    echo '<a href="details.php" class="title">' . $imgTitle . '</a>';
    echo '<a href="details.php" class="hotImgContent content content-ellipsis">';
    echo $imgDescription;
    echo '</a>';
    echo '</div>';
    echo '</div>';
}

?>
<div class="homeHot container-fluid" id="homeHot">
    <?php
    $random = false;
    if (isset($_GET['refresh'])) {
        $random = true;
    }
    echoHotDiv($random);
    ?>
</div>
<!--hotImages end-->

<!--buttons begin-->
<div class="floatButton">
    <a href="home.php?refresh=true">
        <img id="refresh" src="../../img/icon/refresh.png" alt="refreshButton">
    </a>
    <a href="#navigation">
        <img id="toTop" src="../../img/icon/toTop.png" alt="toTopButton">
    </a>
</div>
<!--buttons end-->

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