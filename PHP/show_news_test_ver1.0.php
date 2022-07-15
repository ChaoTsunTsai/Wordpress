<!doctype=html>
    <html lang="zh-TW">

    <head>
        <meta charset="utf-8">
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        <meta http-equiv='content-language' content='zh-TW' />
        <link rel="shortcut icon" href="../icon/V5_icon.png">
        <link rel="stylesheet" href="../css/main.css?">
        <script src="./ckeditor4-releases-master/ckeditor4-releases-master/ckeditor.js"></script>
        <script src="./ckeditor4-releases-master/ckeditor4-releases-master/config.js"></script>
        <title>V5-新聞稿 ver.1.0</title>
    </head>

    <body>
        <div class="header"><img src="../icon/V5_icon.png" width="70px"></div>
        <div class="row news absolute-center">
            <?php
            include 'connect_toDB.php';

            $get_news_query = "SELECT `news_content` FROM `news` ORDER BY `id` DESC LIMIT 1";
            $get_news = mysqli_query($connect, $get_news_query);
            $result = mysqli_fetch_array($get_news);

            $get_report_time_query = "SELECT `report_time` FROM `news` ORDER BY `id` DESC LIMIT 1";
            $get_report_time = mysqli_query($connect, $get_report_time_query);
            $report_time = mysqli_fetch_array($get_report_time);
            ?>
            <div class="row news_view absolute-center">
                <div class="col-xxl-10 content_show">
                    <?php echo $result['news_content']; ?>
                    <?php echo '<div class = `row`>'; ?>
                    <?php echo '<small class = "report_time">上傳日期：' . $report_time['report_time'] . '</small>'; ?>
                    <?php echo '</div>'; ?>
                </div>
            </div>
        </div>
    </body>
    <footer>
        <div class="row">
            <p>Copyright &copy 2022 by V5 Tecnologies</p>
        </div>
    </footer>

    </html>