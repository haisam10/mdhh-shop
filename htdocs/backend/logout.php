<?php
session_start();            // সেশন শুরু
session_unset();            // সব সেশন ভ্যারিয়েবল মুছে ফেলুন
session_destroy();          // সেশন সম্পূর্ণভাবে ধ্বংস করুন
header("Location: ./");  // লগইন পেজে পাঠিয়ে দিন
exit();
?>
