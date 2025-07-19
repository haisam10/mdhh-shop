<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Page (Frequently Asked Questions)</title>
    <?php require 'frontend/all_iems/css/style.php' ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=login" />
</head>

<body>
        <!-- Cursor for hover effect -->
     <?php include 'frontend/all_iems/component/cursor.php'; ?>
    <header>
        <span class="txt-cn">
            <?php include 'frontend/all_iems/component/mini-header.php'; ?>
        </span>
        <div>
            <?php include 'frontend/all_iems/component/header.php'; ?>
        </div>
    </header>
    <section>
        <section style="max-width: 800px; margin: auto; padding: 30px; font-family: sans-serif;">
            <h2 style="color: #1c64f2;">সাধারণ জিজ্ঞাসা (FAQ)</h2>

            <h3 style="color: #1c64f2;">১. কিভাবে অর্ডার করবো?</h3>
            <p>প্রোডাক্ট পেজ থেকে "Add to Cart" এ ক্লিক করে Checkout এ গিয়ে অর্ডার কনফার্ম করুন।</p>

            <h3 style="color: #1c64f2;">২. পেমেন্ট কিভাবে করবো?</h3>
            <p>আমরা বিকাশ, নগদ এবং ক্যাশ অন ডেলিভারি সাপোর্ট করি।</p>

            <h3 style="color: #1c64f2;">৩. রিটার্ন কিভাবে করবো?</h3>
            <p>৭ দিনের মধ্যে <a href="/refund-policy" style="color:#fff;">Refund Policy</a> অনুসরণ করে রিটার্ন করুন।</p>

            <h3 style="color: #1c64f2;">৪. ডেলিভারি কতদিনে হবে?</h3>
            <p>সাধারণত ৩-৫ কার্যদিবসের মধ্যে ডেলিভারি হয়ে থাকে।</p>

            <h3 style="color: #1c64f2;">৫. প্রোডাক্ট কি আসল?</h3>
            <p>হ্যাঁ, আমরা শুধুমাত্র যাচাইকৃত ও আসল প্রোডাক্ট সরবরাহ করি।</p>
        </section>

    </section>
    <footer>
        <?php include 'frontend/all_iems/component/footer.php'; ?>
    </footer>
</body>

</html>