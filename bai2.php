<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ngày Sinh</title>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #00FF00;
            margin-top: 50px;
        }

        form {
            width:500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            display : flex;
            flex-direction:column;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="number"] {
            width: 50px;
            padding: 5px;
            border-radius: 3px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            font-size: 16px;
            position: relative;
           left: 43%;
        }

        button {
            padding: 10px 20px;
            background-color: #41c04d;
            color: #ffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #41c04d;
        }

        .result-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50px;
        }

        .result {
            text-align: center;
        }

        .kq {
            width: 200px;
            height: 150px;
        }
    </style>
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Lấy giá trị ngày, tháng, năm từ form
        $birthday = $_POST['birthday'];
        $birth_month = $_POST['birth_month'];
        $birth_year = $_POST['birth_year'];

        // Đổi ngày, tháng, năm của ngày sinh thành chuỗi định dạng ngày tháng dạng số
        $birthdate = strtotime($birth_year . '-' . $birth_month . '-' . $birthday);

        // Lấy ngày, tháng, năm hiện tại
        $current_date = date('Y-m-d');

        // Đổi ngày, tháng, năm của ngày hiện tại thành chuỗi định dạng ngày tháng dạng số
        $current_date = strtotime($current_date);

        // Tính tuổi bằng cách lấy năm hiện tại trừ đi năm sinh
        $age = date('Y', $current_date) - date('Y', $birthdate);

        // Kiểm tra nếu ngày sinh nhật của bạn đã qua thì thông báo "Ngày sinh nhật của bạn đã qua X ngày". 
        // Nếu ngày sinh nhật của bạn còn lại X ngày thì thông báo "Còn X ngày nữa là đến ngày sinh nhật của bạn".
        // Nếu hômnay là ngày sinh nhật của bạn thì thông báo "Chúc mừng sinh nhật!".
        if (date('md', $birthdate) < date('md', $current_date)) {
            $days_until_birthday = date('z', strtotime(date('Y-m-d', $current_date + 31536000))) + 1 - date('z', $birthdate);
            $message = "Ngày sinh nhật của bạn đã qua $days_until_birthday ngày!";
        } elseif (date('md', $birthdate) > date('md', $current_date)) {
            $days_until_birthday = date('z', $birthdate) - date('z', $current_date);
            $message = "Còn $days_until_birthday ngày nữa là đến ngày sinh nhật của bạn!";
        } else {
            $message = "Chúc mừng sinh nhật!";
        }

        
    }
    ?>
    <div class="container">
        <form method="POST" action="bai2.php">
            <h1>Ngày sinh</h1>
            <label for="birthday">Ngày sinh:</label>
            <input type="number" id="birthday" name="birthday" min="1" max="31" required>
            <label for="birth_month">Tháng sinh:</label>
            <input type="number" id="birth_month" name="birth_month" min="1" max="12" required>
            <label for="birth_year">Năm sinh:</label>
            <input type="number" id="birth_year" name="birth_year" min="1900" max="2023" required>
            <button type="submit">Tính tuổi</button>
            <div class="result-container">
                <?php if (isset($age)) { ?>
                    <p class="result">
                        <?php echo 'Năm nay bạn ' .$age.' tuổi' . '<br>' . $message; ?>
                    </p>
                <?php } ?>
            </div>

        </form>

    </div>
</body>

</html>