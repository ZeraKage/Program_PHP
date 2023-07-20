<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        #inketqua{
            width:450px;
        }
    </style>
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
                    } else if (date('md', $birthdate) > date('md', $current_date)) {
                        $days_until_birthday = date('z', $birthdate) - date('z', $current_date);
                        $message = " .Còn $days_until_birthday ngày nữa là đến ngày sinh nhật của bạn!";
                    } else {
                        $message = "Chúc mừng sinh nhật!";
                    }
            
                    
                }
    ?>
     <form id="form1" name="form1" method="post" action="timngaysinhnhat.php">
        <table width="700" border="0" align="center" bgcolor="#FF99FF">
        <tr>
            <td colspan="5" align="center" bgcolor="#CC3366"><h1 class="style1">SINH NHẬT </h1></td>
        </tr>
        <tr>
            <td width="130"><span class="style2">Ngày-Tháng-Năm</span></td>

            <td width="72">
                <label>
                    <input name="birthday" type="text" id="birthday" value="<?php echo isset($_POST['birthday']) ;?>" size="10" />
                </label>
            </td>

            <td width="68">
                <label>
                    <input name="birth_month" type="text" id="birth_month" value="<?php echo isset($_POST['birth_month']);?>" size="10" />
                </label>
            </td>

            <td width="60"> 
                <label>
                    <input name="birth_year" type="text" id="birth_year" value="<?php echo isset($_POST['birth_year']);?>" size="10" />
                </label>
            </td>
            
            <td width="148">
                <label>
                    <input type="submit" name="Submit" value="Tìm" />
                </label>
            </td>
        </tr>
        <tr>
            <td colspan="5" align="center">
                <label>
                    <input 
                    name="chuoi" 
                    type="text" 
                    id="inketqua" 
                    style="background-color:#FFFFCC" 
                    value="<?php 
                    echo 'Năm nay bạn ' .$age.' tuổi'  . $message; 
                    ?>" 
                    size="50" 
                    readonly="true"/>
                </label>
            </td>
        </tr>

        </table>
        
    </form>
</body>
</html>