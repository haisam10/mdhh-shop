# MDHH-Shop

**MDHH-Shop** একটি সাধারণ PHP ভিত্তিক ই-কমার্স (eCommerce) ওয়েব প্রোজেক্ট।  
এখানে প্রোডাক্ট দেখা, কার্টে যোগ করা, চেকআউট করা ইত্যাদি বেসিক সিস্টেম রয়েছে।  

---

## ১. প্রোজেক্টে কী আছে  

- **PHP ফাইল** → ওয়েবসাইটের লজিক চালানোর জন্য (index.php, cart.php, checkout.php ইত্যাদি)  
- **mdhh-shop.sql** → ডাটাবেজ সেটআপ    
- **css/** → ওয়েবসাইটের ডিজাইন/স্টাইল  
- **js/** → জাভাস্ক্রিপ্ট কোড  
- **images/** → ছবি ও স্ক্রিনশট
- **/admin** অ্যাডমিন পেজ এ username ও password হলো = admin ও admin 

---

## ২. প্রয়োজনীয় জিনিস  

- **Web Server**: Apache / Nginx (XAMPP, WAMP বা LAMP)  
- **PHP**: 7.4 বা তার বেশি  
- **Database**: MySQL / MariaDB  

---
## ৩. কীভাবে ইন্সটল ও রান করবেন  

১. **রিপোজিটরি ক্লোন করুন**  
```bash
git clone https://github.com/haisam10/mdhh-shop.git
```
২. xampp এর (Appachi ও sql) start দিন 
৩. xampp এর ``htdocs`` ফোল্ডারের ভিতর সব কোড pest করুন 
৪. ``mdhh-htaccess.txt`` ফাইলটি rename করে  ``.htaccess ``রাখুন। 
৫. phpmyadmin এ যান ডাটাবেস ইম্পোর্ট করুন। 

