<?php
$activate = "inforcar";
@include('header.php');
?>
<head>
    <title>Đánh giá chuyến đi</title>
</head>
<body>
    <h2>Đánh giá chuyến xe</h2>
    <form method="post" action="">
        <label for="rating">Đánh giá:</label>
        <select id="rating" name="rating" required>
            <option value="1">1 sao</option>
            <option value="2">2 sao</option>
            <option value="3">3 sao</option>
            <option value="4">4 sao</option>
            <option value="5">5 sao</option>
        </select><br><br>

        <label for="comments">Bình luận:</label>
        <textarea id="comments" name="comments" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="Gửi đánh giá">
    </form>
</body>
<?php 
@include('footer.php');
?>
