const nodemailer = require("nodemailer");

async function sendEmail(summary) {
    // إعدادات السيرفر (Gmail)
    let transporter = nodemailer.createTransport({
        service: "gmail",
        auth: {
            user: "YOUR_EMAIL@gmail.com", // بريدك
            pass: "YOUR_APP_PASSWORD"     // باسورد التطبيق من Gmail
        }
    });

    // محتوى الرسالة
    let info = await transporter.sendMail({
        from: '"حاسبة الطاقة الشمسية" <YOUR_EMAIL@gmail.com>',
        to: "malak@example.com", // بريدك اللي توصلك عليه الإشعارات
        subject: "إشعار: عميل جديد أدخل بياناته",
        text: summary
    });

    console.log("Message sent: %s", info.messageId);
}

module.exports = sendEmail;
