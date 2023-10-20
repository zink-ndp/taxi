<?php 
include("header.php");
?>
<head>
    <title>Thay đổi thông tin người dùng</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->

</head>
<style>
.ftco-navbar-light {
    background: brown;
    position: absolute;
    top: 20px;
    left: 0;
    right: 0;
    z-index: 3;
}
.col-6 {
    -webkit-box-flex: initial;
    -ms-flex: 0 0 50%;
    flex: revert;
    max-width: 100%;
}
  input, button, select, optgroup, textarea {
    margin:inherit;
    font-family: inherit;
    background-color:lightblue;
}

.container-fluid {
    width: max-content;
    padding-right: 20px;
    padding-left: 20px;
    margin-right: revert;
    margin-left: inherit;
}

body {
    font-family: "Poppins", Arial, sans-serif;
    background: #cccccc36;
    font-size: 18px;
    line-height: normal;
    font-weight: 2000;
    text-align: -webkit-right;
    color:darkgray;
}
h1, h2, h3, h4, h5, .h1, .h2, .h3, .h4, .h5 {
    line-height: 1;
    color: rgba(0, 0, 0, 1);
    font-weight: 300;
}
h1, .h1 {
    font-size: 3;
}
h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
    margin-bottom: 2rem;
    font-weight: 500;
    line-height: 1.2;
}
h1, h2, h3, h4, h5, h6 {
    margin-top: 5px;
    margin-bottom: 0.5rem;
}
</style>
<body>
<section class="ftco-section contact-section">
    <div class="container">
        <div class="container-fluid pt-1">
            <div class="row px-xl-5">
                <div class="col-lg-12 mb-5" style="margin-top: -40px;">
                    <section class="text-again:center">
                        <div class="row">
                            <div class="col-6">
                            <h1>Thay đổi thông tin người dùng</h1>
                              <form action="sua.php" method="post">
                                  <label for="username">Username:</label>
                                  <input type="text" name="username" required><br>

                                  <label for="full_name">Họ tên:</label>
                                  <input type="text" name="full_name"><br>

                                  <label for="phone">Số điện thoại:</label>
                                  <input type="text" name="phone"><br>

                                  <label for="email">Email:</label>
                                  <input type="email" name="email"><br>

                                  <input type="submit" value="Cập nhật">
                              </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>
   
</body>

<?php 
include("footer.php");
?>