            <?php
            require '../functions.php';
            require 'connect.php';

            // Kiểm tra nếu biểu mẫu đã được gửi
            if (isset($_POST["dangkytx"])) {
            // Lấy dữ liệu từ biểu mẫu
            $ten = $_POST["ten"];
            $banglai = $_POST["banglai"];
            $sdt = $_POST["sdt"];
            $username = $_POST["username"];
            $password = $_POST["psw"];
            $gioitinh = $_POST["gioitinh"];
            $hinhanh = $_POST["hinhanh"];
            
            // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
            $hashed_password = md5($password);

            $nextId = getMaxId($conn,'TX_MA','taixe')+1;

            // Tạo câu lệnh SQL để chèn dữ liệu vào bảng khachhang (loại bỏ KH_MA)
            $sql = "INSERT INTO taixe VALUES ($nextId, '$ten', '$banglai', '$sdt', '$username', '$hashed_password', $gioitinh,'$hinhanh')";

            // Thực hiện câu lệnh SQL và kiểm tra kết quả
            if ($conn->query($sql) === TRUE) {
                echo '<script language="javascript">
                    alert("Đăng ký thành công! Vui lòng đăng nhập lại!");
                    window.location.href = "dntaixe.php"; // Chuyển hướng sau khi đăng ký thành công
                    </script>';
            } else {
                echo "Lỗi khi thực hiện đăng ký: " . $conn->error;
            }

            // Đóng kết nối đến cơ sở dữ liệu
            $conn->close();
            }
            ?>

                            <div class="col-6" >
                                <h2>Đăng ký</h2>
                                <form class="row g-3 formdangky" action="dk_taixe.php" method="POST">

                                    <div class="col-12">
                                        <label for="inputAddress" class="form-label">Họ và tên<span class="error"></span> </label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="Tên" name="ten">
                                    </div>
                                    <div class="col-12">
                                        <label for="inputAddress" class="form-label">Bằng Lái<span class="error">*</span> </label>
                                        <input type="banglai" class="form-control" id="banglai" placeholder="Nhập bằng lái xe hiện có của bạn" name="banglai">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputNumberl4" class="form-label">Tên đăng nhập<span class="error"></span></label>
                                        <input type="text" class="form-control" id="username" name="username">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPassword4" class="form-label">Mật khẩu<span class="error">*</span></label>
                                        <input type="password" class="form-control" id="matkhau" name="psw">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPassword4" class="form-label">Nhập lại mật khẩu<span class="error">*</span></label>
                                        <input type="password" class="form-control" id="matkhau2" name="psw1">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputNumberl4" class="form-label">Số điện thoại<span class="error"></span></label>
                                        <input type="text" class="form-control" id="sdt" name="sdt">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputCity" class="form-label">Giới tính</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gioitinh" id="flexRadioDefault1" value="1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Nam
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gioitinh" id="flexRadioDefault2" value="0" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Nữ
                                            </label>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPassword4" class="form-label">Hình ảnh<span class="error">*</span></label>
                                        <td>
                                            <input type="file" name="BV_HINHANH"/>
                                        </td>
                                    </div>
                                    <div class="col-md-12">      
                                        <button type="submit" class="mt-2 btn btn-success"  name="dangkytx">Đăng ký </button>
                                    </div>
                                </form>
                            </div>