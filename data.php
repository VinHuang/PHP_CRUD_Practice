<?php
  include("connMysqlObj.php");
  $sql_query = "SELECT * FROM students ORDER BY cID ASC";
  $result = $db_link->query($sql_query);
  $total_records = $result->num_rows;
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
  <h1>學生資料管理系統</h1>
  <p>目前資料筆數：<?php echo $total_records;?>，<a
      href="add.php">新增學生資料</a>。</p>
  <table>
    <tr>
      <th>座號</th>
      <th>姓名</th>
      <th>性別</th>
      <th>生日</th>
      <th>電子郵件</th>
      <th>電話</th>
      <th>住址</th>
      <th>功能</th>
    </tr>
    <?php
  //取得以欄位為索引鍵的陣列
  while ($row_result=$result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>".$row_result["cID"]."</td>";
      echo "<td>".$row_result["cName"]."</td>";
      echo "<td>".$row_result["cSex"]."</td>";
      echo "<td>".$row_result["cBirthday"]."</td>";
      echo "<td>".$row_result["cEmail"]."</td>";
      echo "<td>".$row_result["cPhone"]."</td>";
      echo "<td>".$row_result["cAddr"]."</td>";
      echo "<td><a href='update.php?id=".$row_result["cID"]."'>修改</a>";
      echo "<a href='delete.php?id=".$row_result["cID"]."'>刪除</a></<a>";
      echo "<tr>";
  }
?>
  </table>
</body>

</html>