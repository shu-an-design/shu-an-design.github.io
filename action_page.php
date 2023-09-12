<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];

  // 郵件內容
  $to = "yuchiao0129@gmail.com"; 
  $subject = "New Form Submission";
  $message = "Name: $name\n";
  $message .= "Email: $email\n";

  // 發送郵件
  if (mail($to, $subject, $message)) {
    echo "郵件已成功發送！";
  } else {
    echo "郵件發送失敗。";
  }
}
?>