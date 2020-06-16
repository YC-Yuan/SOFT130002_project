<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>三鱼一茶-我的收藏</title>

    <!--bootstrap4-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.css">

    <!--css-->
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/navigation.css">
    <link rel="stylesheet" href="../css/theme.css">
    <link rel="stylesheet" href="../css/repository.css">

    <!--icon-->
    <link rel="Shortcut Icon" href="../../img/icon/icon.png" type="image/x-icon"/>

</head>
<body>

<!--url process start-->
<?php
session_start();
require_once('../php/query.php');
require_once('../php/changePhoto.php');
?>
<!--url process end-->


<header>
    <!--navigation begin-->
    <nav>
        <div id="navigation">
            <a href="home.php">Home</a>
            <a href="browser.php">Browser</a>
            <a href="search.php">Searcher</a>
        </div>
        <?php
        //如果登陆了，正常展示，最后一个为退出登录
        if (isset($_SESSION['UID'])) {
            $UID = $_SESSION['UID'];

            if (isset($_GET['delete'])) {//需要进行删除
                deleteFavor($UID, $_GET['delete']);
            }

            echo '<div id="userMenu"><span>UserCenter</span>
            <ul>
                <li><a href="upload.php"><img src="../../img/icon/upload.png" alt="upload" class="icon"> Upload</a>
                </li>
                <li><a href="mine.php"><img src="../../img/icon/photo.png" alt="myphoto" class="icon"> MyPhoto</a></li>
                <li><a class="currentMenu" href="favor.php"><img src="../../img/icon/favored.png" alt="favor" class="icon"> MyFavor</a>
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
<!--repository begin-->
<div id="repository" class="container bd-form mx-auto my-3 p-0 repository-color">
    <h1 class="title text-big text-center">My Favor</h1>
    <?php
    if (isset($UID)) {
        $myFavor = getFavorPhoto($UID);
        $myNum = $myFavor->rowCount();
        if ($myNum == 0) {
            echo '<div class="repository-box p-2"><p class="text-big info-img text-center">No photo favored yet~<br/>Click photos you like and then favor them!</p></div>';
        } else {
            for ($i = 1; $i <= $myNum; $i++) {
                $img = $myFavor->fetch();
                $imgDescription = $img['Description'];
                if ($imgDescription == '') {
                    $imgDescription = 'The author said nothing.';
                }
                echo '<div class="repository-box p-2">';
                echo '<a href="details.php?imgId=' . $img['ImageID'] . '" class="repository-img"><img src="../../img/large/' . $img['PATH'] . '" alt="myFavored"></a>';
                echo '<div class="repository-content container-ellipsis">';
                echo '<a href="details.php?imgId=' . $img['ImageID'] . '" class="title my-1">' . $img['Title'] . '</a>';
                echo '<a href="details.php?imgId=' . $img['ImageID'] . '" class="content content-ellipsis my-1">' . $imgDescription . '</a>';
                echo '<div class="btn-toolbar justify-content-end">';
                echo '<div class="btn-group my-1" role="group" aria-label="Basic example">';
                echo '<a href="favor.php?delete=' . $img['ImageID'] . '"><button type="button" class="btn btn-danger">Delete</button></a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '';
            }
        }
    }
    ?>
</div>

<!--repository end-->

<!--buttons begin-->
<div class="floatButton">
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
</body>

<!--bootstrap4-->
<script src="../bootstrap4/jquery-3.5.1.min.js"></script>
<script src="../bootstrap4/popper.min.js"></script>
<script src="../bootstrap4/js/bootstrap.js"></script>

<!--js-->
<script src="../js/textEllipsis.js"></script>
<script src="../js/favor.js"></script>
</html>