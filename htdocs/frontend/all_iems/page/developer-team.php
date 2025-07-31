<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developer Team</title>
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
    <section style="max-width: 1000px; margin: auto; padding: 40px 20px; font-family: sans-serif; text-align: center;">
  <h2 style="color: #1c64f2; font-size: 32px;">আমাদের ডেভেলপার টিম</h2>
  <p style="margin-bottom: 40px;">এই টিমটি MDHH Shop-এর ডিজাইন, ফাংশনালিটি এবং ইউজার এক্সপেরিয়েন্স তৈরিতে কাজ করছে।</p>

  <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 30px;">
    
    <!-- Developer 1 -->
    <div style="border: 1px solid #ddd; border-radius: 10px; padding: 20px;">
      <img src="https://avatars.githubusercontent.com/u/129544919?v=4" alt="" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; margin-bottom: 15px;">
      <h3 style="color: #1c64f2;">Afinur Binte Aziz Arshi</h3>
      <p>Lead Developer & UI/UX Designer</p>
      <a href="mailto:afinurazizarshi@gmail.com" style="color: #1c64f2;">afinurazizarshi@gmail.com</a><br>
      <a href="" target="_blank" style="color: #1c64f2;">Portfolio</a>
    </div>

    <!-- Developer 2 -->
    <div style="border: 1px solid #ddd; border-radius: 10px; padding: 20px;">
      <img src="https://avatars.githubusercontent.com/u/122108214?v=4" alt="Md Haisam Hoque" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; margin-bottom: 15px;">
      <h3 style="color: #1c64f2;">Md Haisam Hoque</h3>
      <p>Backend Engineer</p>
      <a href="mailto:mdhh.info@gmail.com" style="color: #1c64f2;">mdhh.info@gmail.com</a><br>
      <a href="https://haisam10.github.io/freelancer/" target="_blank" style="color: #1c64f2;">Portfolio</a>
    </div>
  </div>

  <p style="margin-top: 40px; color: #777;">Want to join our team? <a href="mailto:mdhh.info@gmail.com" style="color: #1c64f2;">Contact us</a></p>
</section>

    </section>
    <footer>
        <?php include 'frontend/all_iems/component/footer.php'; ?>
    </footer>
</body>

</html>