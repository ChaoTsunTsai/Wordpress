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
        <title>V5-新聞稿ver 1.1</title>
    </head>

    <body>
        <div class="row news absolute-center">
            <?php
            include 'connect_toDB2.php';
            //date -> 發佈日期
            $date_query = "SELECT `date` FROM `news` ORDER BY `id` DESC LIMIT 1";
            $date_result = mysqli_query($connect, $date_query);
            //$date = mysqli_fetch_assoc($date_result);
            $date_str = mysqli_fetch_assoc($date_result);
            $date = date('Y-m-d\TH:i:s', strtotime($date_str['date']));

            //date_gmt -> 標準發佈日期
            $date_gmt_query = "SELECT `date_gmt` FROM `news` ORDER BY `id` DESC LIMIT 1";
            $date_gmt_result = mysqli_query($connect, $date_gmt_query);
            //$date_gmt = mysqli_fetch_assoc($date_gmt_result);
            $date_gmt_str = mysqli_fetch_assoc($date_gmt_result);
            $date_gmt = date('Y-m-d\TH:i:s', strtotime($date_gmt_str['date_gmt']));

            //modified -> 編輯日期
            $modified_query = "SELECT `modified` FROM `news` ORDER BY `id` DESC LIMIT 1";
            $modified_result = mysqli_query($connect, $modified_query);
            //$modified = mysqli_fetch_assoc($modified_result);
            $modified_str = mysqli_fetch_assoc($modified_result);
            $modified = date('Y-m-d\TH:i:s', strtotime($modified_str['modified']));

            //modified_gmt -> 標準編輯日期
            $modified_gmt_query = "SELECT `modified_gmt` FROM `news` ORDER BY `id` DESC LIMIT 1";
            $modified_gmt_result = mysqli_query($connect, $modified_gmt_query);
            //$modified_gmt = mysqli_fetch_assoc($modified_gmt_result);
            $modified_gmt_str = mysqli_fetch_assoc($modified_gmt_result);
            $modified_gmt = date('Y-m-d\TH:i:s', strtotime($modified_gmt_str['modified_gmt']));

            //status -> 狀態(已發佈)
            $status_query = "SELECT `status` FROM `news` ORDER BY `id` DESC LIMIT 1";
            $status_result = mysqli_query($connect, $status_query);
            $status = mysqli_fetch_assoc($status_result);

            //type -> 類型(post)
            $type_query = "SELECT `type` FROM `news` ORDER BY `id` DESC LIMIT 1";
            $type_result = mysqli_query($connect, $type_query);
            $type = mysqli_fetch_assoc($type_result);

            //title -> 標題
            $title_query = "SELECT `title` FROM `news` ORDER BY `id` DESC LIMIT 1";
            $title_result = mysqli_query($connect, $title_query);
            $title = mysqli_fetch_assoc($title_result);
            //$title = wordwrap($title_str['title'], 10, "\\n", false);

            //slug -> 代稱(URL，截自【標題】片段)
            $slug = "";

            //content strip($content, ["p", "a"]) --> allow multiple tags
            $content_query = "SELECT `content` FROM `news` ORDER BY `id` DESC LIMIT 1";
            $content_result = mysqli_query($connect, $content_query);
            $content = mysqli_fetch_assoc($content_result);
            //$content = strip_tags($content_str['content'], '<a>');
            //$content = "temporary null";
            $protected = false;

            //excerpt
            $excerpt_query = "SELECT `excerpt` FROM `news` ORDER BY `id` DESC LIMIT 1";
            $excerpt_result = mysqli_query($connect, $excerpt_query);
            $excerpt = mysqli_fetch_assoc($excerpt_result);
            $excerpt_str = mysqli_fetch_assoc($excerpt_result);
            //$excerpt = wordwrap($excerpt_str['excerpt'], 10, "<br>\n", false);
            //$excerpt = "temporary null";

            //author
            /*$author_query = "SELECT `author` FROM `news` ORDER BY `id` DESC LIMIT 1";
                $author_result = mysqli_query($connect, $author_query);
                $author = mysqli_fetch_assoc($author_result);*/
            $author = 1;

            //featured_media
            /*$featured_media_query = "SELECT `featured_media` FROM `news` ORDER BY `id` DESC LIMIT 1";
                $featured_media_result = mysqli_query($connect, $featured_media_query);
                $featured_media = mysqli_fetch_assoc($featured_media_result);*/
            $featured_media = 0;

            //parent
            /*$parent_query = "SELECT `parent` FROM `news` ORDER BY `id` DESC LIMIT 1";
                $parent_result = mysqli_query($connect, $parent_query);
                $parent = mysqli_fetch_assoc($parent_result);*/
            $parent = 0;

            //comment_status
            $comment_status_query = "SELECT `comment_status` FROM `news` ORDER BY `id` DESC LIMIT 1";
            $comment_status_result = mysqli_query($connect, $comment_status_query);
            $comment_status = mysqli_fetch_assoc($comment_status_result);

            //ping_status
            $ping_status_query = "SELECT `ping_status` FROM `news` ORDER BY `id` DESC LIMIT 1";
            $ping_status_result = mysqli_query($connect, $ping_status_query);
            $ping_status = mysqli_fetch_assoc($ping_status_result);

            //sticky
            /*$sticky_query = "SELECT `sticky` FROM `news` ORDER BY `id` DESC LIMIT 1";
                $sticky_result = mysqli_query($connect, $sticky_query);
                $sticky = mysqli_fetch_assoc($sticky_result);*/
            $sticky = false;

            //template
            $template_query = "SELECT `template` FROM `news` ORDER BY `id` DESC LIMIT 1";
            $template_result = mysqli_query($connect, $template_query);
            $template = mysqli_fetch_assoc($template_result);

            //format
            $format_query = "SELECT `format` FROM `news` ORDER BY `id` DESC LIMIT 1";
            $format_result = mysqli_query($connect, $format_query);
            $format = mysqli_fetch_assoc($format_result);

            //meta
            $meta = [];

            //categories
            $categories = [21, 22];

            //tags
            $tags = [];

            //convert to JSON format                
            $JSON_array = array(
                "date" => $date,
                "date_gmt" => $date_gmt,
                "modified" => $modified,
                "modified_gmt" => $modified_gmt,
                //
                "slug" => $slug,
                "status" => $status['status'],
                "type" => $type['type'],
                "title" => array("rendered" => $title['title']),
                //"title"=>array("rendered"=>$title),
                //"content"=>array("rendered"=>$content['content'], "protected"=>$protected),
                "content" => array("rendered" => $content, "protected" => $protected),
                "excerpt" => array("rendered" => $excerpt['excerpt'], "protected" => $protected),
                //"excerpt"=>array("rendered"=>$excerpt, "protected"=>$protected),
                "author" => $author,
                //"author"=>$author['author'],
                "featured_media" => $featured_media,
                //"featured_media"=>$featured_media['featured_media'],
                "parent" => $parent,
                //"parent"=>$parent['parent'],
                "comment_status" => $comment_status['comment_status'],
                "ping_status" => $ping_status['ping_status'],
                "sticky" => $sticky,
                //"sticky"=>$sticky['sticky'],
                "template" => $template['template'],
                "format" => $format['format'],
                "meta" => $meta,
                "categories" => $categories,
                "tags" => $tags
            );

            /*$JSON_array = array("date"=>$date['date'],
                                    "date_gmt"=>$date_gmt['date_gmt'],
                                    "modified"=>$modified['modified'],
                                    "modified_gmt"=>$modified_gmt['modified_gmt'],
                                    "status"=>$status['status'],
                                    "type"=>$type['type'],
                                    "title"=>array("rendered"=>$title['title']),
                                    //"content"=>array("rendered"=>$content['content'], "protected"=>$protected)
                                    "content"=>array("rendered"=>$content, "protected"=>$protected),
                                    //"excerpt"=>array("rendered"=>$excerpt['excerpt'], "protected"=>$protected),
                                    "excerpt"=>array("rendered"=>$excerpt, "protected"=>$protected),
                                    "author"=>$author['author'],
                                    "featured_media"=>$featured_media['featured_media'],
                                    "parent"=>$parent['parent'],
                                    "comment_status"=>$comment_status['comment_status'],
                                    "ping_status"=>$ping_status['ping_status'],
                                    "sticky"=>$sticky['sticky'],
                                    "template"=>$template['template'],
                                    "format"=>$format['format'],
                                    "meta"=>$meta,
                                    //"categories"=>$categories,
                                    "tags"=>$tags
                                    );*/

            $JSON_code = json_encode($JSON_array, JSON_PRETTY_PRINT);
            ?>
        </div>
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
    <footer>
        <div class="row">
            <p>Copyright &copy 2022 by V5 Tecnologies</p>
        </div>
    </footer>

    </html>