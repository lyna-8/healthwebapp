<?php
session_start(); // بدء الجلسة

// التحقق مما إذا كان المستخدم قد سجل الدخول
if (!isset($_SESSION["username"])) {
    header("Location: login.php"); // إعادة التوجيه إلى صفحة تسجيل الدخول إذا لم يكن المستخدم مسجل دخول
    exit;
}

// جلب اسم المستخدم من الجلسة
$username = $_SESSION["username"];
?>