<?php
// ============================================
// إعدادات الاتصال بقاعدة البيانات
// غيّر القيم التالية حسب بيانات حسابك على InfinityFree
// تجدها في: Control Panel -> MySQL Databases
// ============================================

$db_host = "sqlXXX.infinityfree.com"; // اسم السيرفر (Database Host)
$db_user = "epiz_XXXXXXXX";           // اسم المستخدم (Database Username)
$db_pass = "your_password_here";      // كلمة المرور (Database Password)
$db_name = "epiz_XXXXXXXX_users_db";  // اسم قاعدة البيانات (Database Name)

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>
