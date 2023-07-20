<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tách Họ Và Tên</title>
    <style>
        .khung{
            width: 600px;
            height: auto;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            background:#41c04d;
        }
        h2{
            margin: 0 0 10 0;
            text-align: center;
            color: #0000FF;
            font-size : 40px
        }
        .items{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        input[type="text"]{
            border-radius: 5px;
            margin-bottom: 7px;
            border: 1px solid #ddd;
            width: 400px;
            height: 35px;
        }
        input[type="submit"]{
            padding: 9px 20px;
            color: black;
            border-radius: 5px;
            border: 1px solid #9eb3ff;
            text-transform: uppercase;
            cursor: pointer;
            background-color:	#6495ed;
        }
        .submit-button{
            display: flex;
            justify-content: flex-end;
        }

    </style>
</head>
<?php
$hoten = "";
$ho = "";
$tendem = "";
$ten = "";
$n="";
$mang = "";
    if(isset($_POST["hoten"]))
    {
       $hoten = trim($_POST["hoten"]);
       $mang = explode(" ", $hoten);    
       $ho = $mang[0];
       $n = count($mang);
       $ten = $mang[$n - 1];
       for($i=1; $i<$n - 1;$i++)
            $tendem = $tendem . $mang[$i] . " ";
        if ($tendem == "") {
            $tendem  ="không có tên đệm";
        }
    }

?>
<body>
<div class="khung">
        <div class="form-items">
            <h2>Separating First and Last Names</h2>
            <form method="POST" action="bai1.php">
                <div class="items">
                    <label>Nhập họ và tên </label>
                    <input type="text" name="hoten" value = "<?php echo $hoten;?>"/>
                </div>
                <div class="submit-button">
                    <input type="submit" value="Tách" name="calculate" />
                </div>
                <div class="items">
                    <label>Họ </label>
                    <input type="text" name="ho" readonly="true" value = "<?php echo $ho;?>"/>
                </div>
                <div class="items">
                    <label> Tên đệm </label>
                    <input type="text" name="" readonly="true" value = "<?php echo $tendem;?>"/>
                </div>
                <div class="items">
                    <label> Tên </label>
                    <input type="text" name="ten" readonly="true" value = "<?php echo $ten;?>"/>
                </div>
            </form>           
</body>

</html>