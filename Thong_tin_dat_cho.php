<!DOCTYPE html>
<html>

<head>
    <title>Form Đặt Chỗ</title>
    <style>
        form {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
        }

        h2 {
            font-size: 36px;
            text-align: center;
            color: #007bff;
            /* thay đổi màu sắc của tiêu đề */
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type=text],
        select,
        textarea {
            width: 100%;
            padding: 12px 20px;
            margin-bottom: 10px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            height: 100px;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $age_range = $_POST['age-range'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $guests = $_POST['guests'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $location = $_POST['location'];
        $media = $_POST['media'];
        $requests = $_POST['requests'];

        // Hiển thị thông tin được gửi từ form
        echo "<h2>Thông tin đặt chỗ:</h2>";
        echo "Tên người đặt: " . $name . "<br>";
        echo "Độ tuổi: " . $age_range . ' tuổi' . "<br>";
        echo "Giới tính: " . $gender . "<br>";
        echo "Địa chỉ người đặt: " . $address . "<br>";
        echo "Số lượng khách tham dự: " . $guests . "<br>";
        echo "Ngày tổ chức: " . $date . "<br>";
        echo "Thời gian: " . $time . "<br>";
        echo "Địa điểm: " . $location . "<br>";
        echo "Bạn biết tôi qua báo chí, đài phát thanh hay TV: " . $media . "<br>";
        echo "Các yêu cầu khác: " . $requests . "<br>";
    }
    ?>
    <form method="post">
        <h2>Thông Tin Đặt Chỗ</h2>
        <label for="name">Tên Người Đặt:</label>
        <input type="text" id="name" name="name" placeholder="Nhập tên của bạn..">

        <label for="age-range">Độ tuổi:</label>
        <select id="age-range" name="age-range">
            <option value="Từ 18 đến 25 tuổi">Từ 18 đến 25 tuổi</option>
            <option value="Từ 26 đến 35 tuổi" selected>Từ 26 đến 35 tuổi</option>
            <option value="Từ 36 đến 50 tuổi">Từ 36 đến 50 tuổi</option>
<option value="Trên 50 tuổi">Trên 50 tuổi</option>
        </select>
        <label for="gender">Giới Tính:</label>
        <select id="gender" name="gender">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
            <option value="Khác"></option>
        </select>

        <label for="address">Địa Chỉ Người Đặt:</label>
        <input type="text" id="address" name="address" placeholder="Nhập địa chỉ của bạn..">

        <label for="guests">Số Lượng Khách Tham Dự:</label>
        <input type="number" id="guests" name="guests" min="1" max="100">

        <label for="date">Ngày Tổ Chức:</label>
        <input type="date" id="date" name="date">

        <label for="time">Thời Gian:</label>
        <select id="time" name="time">
            <option value="Sáng">Buổi Sáng</option>
            <option value="Trưa">Buổi Trưa</option>
            <option value="Chiều">Buổi Chiều</option>
            <option value="Tối">Buổi Tối</option>
        </select>

        <label for="location">Địa Điểm:</label>
        <select id="location" name="location">
            <option value="Trong Nhà">Trong Nhà</option>
            <option value="Ngoài Trời">Ngoài Trời</option>
        </select>


        <label for="media">Bạn Biết Tôi Qua Báo Chí, Đài Phát Thanh Hay TV:</label>
        <select id="media" name="media">
            <option value="Báo Chí">Báo Chí</option>
            <option value="Đài Phát Thanh">Đài Phát Thanh</option>
            <option value="TV">TV</option>
        </select>

        <label for="requests">Các Yêu Cầu Khác:</label>
        <textarea id="requests" name="requests" placeholder="Nhập các yêu cầu của bạn.."></textarea>

        <input type="submit" value="Đặt Chỗ" name="submit">
    </form>
</body>

</html>