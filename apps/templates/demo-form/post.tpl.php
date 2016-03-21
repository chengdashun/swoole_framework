<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<input type="text" id="action_url"/>
<textarea id="post_data"></textarea>
<input type="button" id="submit" value="提交"/>
<form id="form" method="post" target="_blank">

</form>
<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#submit").on("click", function () {
            var actionUrl = $("#action_url").val();
            var postData = $("#post_data").val();
            postData = postData.split("&")
            var len = postData.length;
            var form = $("#form");
            form.html("");
            form.attr("action", actionUrl);
            for (var i = 0; i < len; i++) {
                var firstPos = postData[i].indexOf("=");
                var key = postData[i].substr(0, firstPos);
                var value = postData[i].substr(firstPos + 1);
                $("<input>").attr({
                    "type": "hidden",
                    "name": key,
                    "value": value
                }).appendTo(form);
            }
            form.submit();
        });
    });
</script>
</body>
</html>