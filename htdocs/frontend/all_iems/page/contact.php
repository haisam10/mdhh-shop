<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact page</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=login" />
        <?php require 'frontend/all_iems/css/style.php' ?>
</head>

<body>
        <!-- Cursor for hover effect -->
     <?php include 'frontend/all_iems/component/cursor.php'; ?>
    <section>
            <header>
        <span class="txt-cn">
            <?php include 'frontend/all_iems/component/mini-header.php';?> 
        </span>
        <div>
            <?php include 'frontend/all_iems/component/header.php';?>
        </div>
    </header>
    </section>
    <section style="max-width: 800px; margin: auto; padding: 30px; font-family: sans-serif; line-height: 1.6;">
        <h2 style="color: #1c64f2;">যোগাযোগ করুন (Contact Us)</h2>

        <p>আপনার যেকোনো প্রশ্ন, পরামর্শ বা অভিযোগ জানাতে আমাদের সাথে যোগাযোগ করুন। আমরা দ্রুত উত্তর দেওয়ার চেষ্টা করি।</p>

        <h3>📞 যোগাযোগের তথ্য</h3>
        <ul style="list-style-type: none; padding-left: 0;">
            <li><strong>ঠিকানা:</strong> Dhaka, Bangladesh</li>
            <li><strong>ফোন:</strong> +880 1537161735</li>
            <li><strong>ইমেইল:</strong> mdhh.info@gmail.com</li>
        </ul>

        <hr style="margin: 30px 0;">

        <h3>✉️ আমাদেরকে বার্তা পাঠান (Send a Message)</h3>
        <form action="#">
            <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScIFa7d-gFCqybDSCEDQ49vSBBdWvdCDzHRhZguM96Qsg_cFw/viewform?embedded=true" width="750" height="1050" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
        </form>

        <p style="margin-top: 20px;">We value your feedback and are here to help!</p>
    </section>
        <footer>
        <?php include 'frontend/all_iems/component/footer.php';?>
    </footer>
    </body>
</body>

</html>