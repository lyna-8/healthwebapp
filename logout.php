<?php
session_start(); // بدء الجلسة

// إزالة جميع بيانات الجلسة
session_unset();

// تدمير الجلسة
session_destroy();

// إعادة التوجيه إلى صفحة تسجيل الدخول بعد الخروج
header("Location: login.php");
exit;
?>
