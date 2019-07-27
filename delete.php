<?php
include("connMysqlObj.php");
//用欄位 action 值是否為 update，判斷現在是否是刪除的動作
if (isset($_POST["action"])&&($_POST["action"]=="delete")) {
    $sql_query = "DELETE FROM students WHERE cID=?";
    //預備語法
    $stmt = $db_link -> prepare($sql_query);
    $stmt -> bind_param("i", $_POST["cID"]);
    $stmt -> execute();
    $stmt -> close();
    $db_link -> close();
    //重新導向回到主畫面
    header("Location: http://localhost/crud/data.php");
}
//取出要修改的資料設定為欄位預設值
$sql_query = "SELECT cID ,cName ,cSex ,cBirthday ,cEmail ,cPhone ,cAddr FROM students WHERE cID=?";
$stmt = $db_link -> prepare($sql_query);
$stmt -> bind_param("i", $_GET["id"]);
$stmt -> execute();
$stmt -> bind_result($cid, $cname, $csex, $cbirthday, $cemail, $cphone, $caddr);
$stmt -> fetch();
?>
<html>

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>學生資料管理系統</title>
  <style>
    h1,
    p {
      text-align: center;
    }

    table {
      border: 1px solid #000;
      font-family: 微軟正黑體;
      font-size: 16px;
      width: 100%;
      border: 1px solid #000;
      text-align: center;
      border-collapse: collapse;
    }

    th {
      background-color: #009FCC;
      padding: 10px;
      border: 1px solid #000;
      color: #fff;
    }

    td {
      border: 1px solid #000;
      padding: 5px;
    }
  </style>
</head>

<body>
  <h1>學生資料管理系統 - 刪除資料</h1>
  <p><a href="data.php">回主畫面</a></p>
  <!-- 用 action="" 代表送回本頁 -->
  <form action="" method="post" name="formDel" id="formDel">
    <table>
      <tr>
        <th>欄位</th>
        <th>資料</th>
      </tr>
      <tr>
        <td>姓名</td>
        <td>
          <?php echo $cname; ?>
        </td>
      </tr>
      <tr>
        <td>性別</td>
        <td>
          <?php
          if ($csex == "M") {
              echo "男";
          } else {
              echo "女";
          }
        ?>
        </td>
      </tr>
      <tr>
        <td>生日</td>
        <td>
          <?php echo $cbirthday; ?>
        </td>
      </tr>
      <tr>
        <td>電子郵件</td>
        <td>
          <?php echo $cemail; ?>
        </td>
      </tr>
      <tr>
        <td>電話</td>
        <td>
          <?php echo $cphone; ?>
        </td>
      </tr>
      <tr>
        <td>住址</td>
        <td>
          <?php echo $caddr; ?>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <input name="cID" type="hidden"
            value="<?php echo $cid; ?>">
          <input name="action" type="hidden" value="delete">
          <input type="submit" name="button" value="確認要刪除這筆資料嗎？">
        </td>
      </tr>
    </table>
  </form>
</body>

</html>
<?php
$stmt -> close();
$db_link -> close();
