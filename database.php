<?php
// Tìm user theo emai
function find_user_by_email($email)
{
  $sql = "SELECT * FROM tb_khachhang WHERE gmail_kh='$email'";
  return db_fetch_row($sql);
}

// Xoá user theo email
function delete_user_by_email($email)
{
  $sql = "DELETE FROM tb_khachhang WHERE gmail_kh='$email'";
  return db_query($sql);
}


//Thực thi chuổi truy vấn
function db_query($query_string)
{
  global $conn;
  $result = mysqli_query($conn, $query_string);
  if (!$result) {
    db_sql_error('Query Error', $query_string);
  }
  return $result;
}

// Lấy một dòng trong CSDL
function db_fetch_row($query_string)
{
  global $conn;
  $result = array();
  $mysqli_result = db_query($query_string);
  $result = mysqli_fetch_assoc($mysqli_result);
  mysqli_free_result($mysqli_result);
  return $result;
}

// Hiển thị lỗi SQL
function db_sql_error($message, $query_string = "")
{
  global $conn;

  $sqlerror = "<table width='100%' border='1' cellpadding='0' cellspacing='0'>";
  $sqlerror .= "<tr><th colspan='2'>{$message}</th></tr>";
  $sqlerror .= ($query_string != "") ? "<tr><td nowrap> Query SQL</td><td nowrap>: " . $query_string . "</td></tr>\n" : "";
  $sqlerror .= "<tr><td nowrap> Error Number</td><td nowrap>: " . mysqli_errno($conn) . " " . mysqli_error($conn) . "</td></tr>\n";
  $sqlerror .= "<tr><td nowrap> Date</td><td nowrap>: " . date("D, F j, Y H:i:s") . "</td></tr>\n";
  $sqlerror .= "<tr><td nowrap> IP</td><td>: " . getenv("REMOTE_ADDR") . "</td></tr>\n";
  $sqlerror .= "<tr><td nowrap> Browser</td><td nowrap>: " . getenv("HTTP_USER_AGENT") . "</td></tr>\n";
  $sqlerror .= "<tr><td nowrap> Script</td><td nowrap>: " . getenv("REQUEST_URI") . "</td></tr>\n";
  $sqlerror .= "<tr><td nowrap> Referer</td><td nowrap>: " . getenv("HTTP_REFERER") . "</td></tr>\n";
  $sqlerror .= "<tr><td nowrap> PHP Version </td><td>: " . PHP_VERSION . "</td></tr>\n";
  $sqlerror .= "<tr><td nowrap> OS</td><td>: " . PHP_OS . "</td></tr>\n";
  $sqlerror .= "<tr><td nowrap> Server</td><td>: " . getenv("SERVER_SOFTWARE") . "</td></tr>\n";
  $sqlerror .= "<tr><td nowrap> Server Name</td><td>: " . getenv("SERVER_NAME") . "</td></tr>\n";
  $sqlerror .= "</table>";
  $msgbox_messages = "<meta http-equiv=\"refresh\" content=\"9999\">\n<table class='smallgrey' cellspacing=1 cellpadding=0>" . $sqlerror . "</table>";
  echo $msgbox_messages;
  exit;
}

// Mã hoá dữ liệu
function escape_string($str)
{
  global $conn;
  return mysqli_real_escape_string($conn, $str);
}

// Cập nhật
function db_update($table, $data, $where)
{
  global $conn;
  $sql = "";
  foreach ($data as $field => $value) {
    if ($value === NULL)
      $sql .= "$field=NULL, ";
    else
      $sql .= "$field='" . escape_string($value) . "', ";
  }
  $sql = substr($sql, 0, -2);
  db_query("UPDATE `{$table}` SET $sql WHERE $where");
  return mysqli_affected_rows($conn);
}

// so sánh giá trị với mã hash trong DB. Nếu đúng return true else false
function verify_hash($value, $key_hash)
{
  return password_verify($value, $key_hash);
}
