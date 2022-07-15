<!doctype=html>
    <html lang="zh-TW">

    <head>
        <!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
        <meta charset="utf-8">
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        <meta http-equiv='content-language' content='zh-TW' />
        <link rel="shortcut icon" href="../icon/V5_icon.png">
        <link rel="stylesheet" href="../css/main.css?">
        <title>V5-新聞稿 ver 1.0</title>
    </head>

    <body>
        <?php
        include 'connect_toDB.php';

        if (isset($_POST['submit'])) {
            // title, content, excerpt
            $title = $_POST['news_title'];
            $content = $_POST['news_content'];
            $excerpt = $_POST['news_excerpt'];

            $insertquery = "INSERT INTO `news`(`title`, `news_content`, `excerpt`, `report_time`) VALUES ('$title', '$content', '$excerpt', now())";
            $insert = mysqli_query($connect, $insertquery);
            $url = "show_news_test_ver1.0.php";
            echo "<script type='text/javascript'>";
            echo "window.location.href='$url'";
            echo "</script>";
        } else {
            echo '<script>';
            echo 'alert(`Failed to get article information.`)';
            echo 'history.back()';
            echo '</script>';
        }
        ?>
    </body>