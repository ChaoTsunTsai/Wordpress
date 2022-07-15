<?php /* Template Name: CustomPageTest */ ?>
<!doctype=html>
    <html lang="zh-TW">

    <head>
        <!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
        <meta charset="utf-8">
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        <meta http-equiv='content-language' content='zh-TW' />
        <link rel="shortcut icon" href="../icon/V5_icon.png">
        <link rel="stylesheet" href="../css/main.css?">
        <title>V5-新聞稿 ver 1.1</title>
    </head>

    <body>
        <?php
        if (isset($_POST['submit'])) {
            include 'connect_toDB2.php';

            // date, date_gmt, modified, modified_gmt
            date_default_timezone_set('Asia/Taipei');
            $date = date('Y-m-d\TH:i:s');
            $date_gmt = date('Y-m-d\TH:i:s');
            $modified = date('Y-m-d\TH:i:s');
            $modified_gmt = date('Y-m-d\TH:i:s');

            // title, content, excerpt            
            $title = $_POST['news_title'];
            $slug = strval($title);
            $content = $_POST['news_content'];
            $protected = false;
            $excerpt = $_POST['news_excerpt'];

            // status, type, author, featured_media, parent, comment_status, ping_status, sticky, template, format, meta, categories, tags
            $status = 'publish';
            $type = 'post';
            $author = 1;
            $featured_media = 0;
            $parent = 0;
            $comment_status = 'closed';
            $ping_status = 'closed';
            $sticky = false;
            $template = '';
            $format = 'standard';
            $meta = [];
            $categories = [21, 22];
            $tags = [];

            $insertquery = "INSERT INTO `news`(`date`, `date_gmt`, `modified`, `modified_gmt`, `status`, `type`, `title`, `content`, `excerpt`, `author`, 
                            `featured_media`, `parent`, `comment_status`, `ping_status`, `sticky`, `template`, `format`) VALUES (now(), now(), now(), now(),
                            '$status', '$type', '$title', '$content', '$excerpt', '$author', '$featured_media', '$parent', '$comment_status', '$ping_status',
                            '$sticky', '$template', '$format')";
            /*$insertquery = "INSERT INTO `news`(`date`, `date_gmt`, `modified`, `modified_gmt`, `status`, `type`, `title`, `content`, `excerpt`, `author`, 
                            `featured_media`, `parent`, `comment_status`, `ping_status`, `sticky`, `template`, `format`) VALUES ('$date', '$date_gmt', '$modified', '$modified_gmt', 
                            '$status', '$type', '$title', '$content', '$excerpt', '$author', '$featured_media', '$parent', '$comment_status', '$ping_status',
                            '$sticky', '$template', '$format')";*/
            $insert = mysqli_query($connect, $insertquery);
            $url = "show_news_test_ver1.1.php";
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
        <div class="row news_view absolute-center">
            <div class="col-xxl-11">
                <?php
                echo '<xmp style="word-wrap: break-word; white-space: pre-wrap;">';
                echo $JSON_code;
                echo '</xmp>';
                ?>
            </div>
        </div>
    </body>