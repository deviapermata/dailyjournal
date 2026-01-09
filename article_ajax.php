<!DOCTYPE html>
<html>
<head>
    <title>Pagination JQuery AJAX</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<h2>Data Article (AJAX)</h2>

<div id="article_data">
   
</div>

<script>
function loadData(hlm){
    $.ajax({
        url: "article_data.php",
        method: "POST",
        data: { hlm: hlm },
        success: function(res){
            $("#article_data").html(res);
        }
    });
}

$(document).ready(function(){
    loadData(1);
});
</script>

</body>
</html>
