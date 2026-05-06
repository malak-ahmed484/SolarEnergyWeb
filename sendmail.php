<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname   = $_POST['fullname'];
    $location   = $_POST['location'];
    $placeType  = $_POST['placeType'];
    $consumption= $_POST['consumption'];
    $panelType  = $_POST['panelType'];
    $battery    = $_POST['battery'];

    // حساب الألواح والتكلفة
    $panelCapacity = ($panelType == "550") ? 66 : 84;
    $panelPrice    = ($panelType == "550") ? 3800 : 5500;
    $panels        = ceil($consumption / $panelCapacity);
    $totalCost     = $panels * $panelPrice;
    if ($battery == "yes") {
        $totalCost += 10000;
    }

    // ملخص البيانات
    $summary = "👤 الاسم: $fullname\n📍 الموقع: $location\n🏠 نوع المكان: $placeType\n🔋 الاستهلاك: $consumption ك.و.س\n☀️ عدد الألواح: $panels\n💰 التكلفة: $totalCost جنيه\n⚡ بطارية: $battery";

    // إعدادات الإيميل
    $to      = "malahlmm9@gmail.com"; // غيريها لبريدك الحقيقي
    $subject = "إشعار: عميل جديد أدخل بياناته";
    $headers = "From: solar-calculator@example.com";

    if (mail($to, $subject, $summary, $headers)) {
        echo "✅ شكراً يا $fullname، تم إرسال بياناتك بنجاح وسنتواصل معك قريباً.";
    } else {
        echo "❌ حصل خطأ أثناء إرسال الإيميل.";
    }
}
?>
