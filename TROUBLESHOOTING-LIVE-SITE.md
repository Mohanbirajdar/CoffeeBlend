# 🔧 TROUBLESHOOTING GUIDE - mycafe.free.nf

## Step-by-Step: How to Find and Fix Issues

### STEP 1: Upload Diagnostic Files (DO THIS FIRST!)
Upload these 2 files to your InfinityFree root directory via FTP:
1. ✓ `check-site.php` (site health check)
2. ✓ `test-database.php` (database connection test)

Then visit in browser:
- https://mycafe.free.nf/check-site.php
- https://mycafe.free.nf/test-database.php

---

## Common Issues & Solutions

### ❌ Issue 1: White Screen / Blank Page
**Symptoms:** Nothing displays when visiting the site

**Solutions:**
1. Check if all files uploaded correctly
2. Make sure index.php is in root directory
3. Check .htaccess file is uploaded
4. Visit: https://mycafe.free.nf/check-site.php to see errors

**Fix:**
```
- Re-upload all files via FTP
- Ensure files are in htdocs folder (not in subfolder)
- Check file permissions (755 for folders, 644 for files)
```

---

### ❌ Issue 2: Database Connection Error
**Symptoms:** Error message about database connection

**Solutions:**
1. Verify database exists in InfinityFree control panel
2. Check database name is: `if0_40757292_caffee` (double 'e')
3. Confirm SQL file imported via phpMyAdmin
4. Test connection: https://mycafe.free.nf/test-database.php

**Fix:**
1. Login to InfinityFree control panel
2. Go to MySQL Databases
3. Verify database: if0_40757292_caffee exists
4. Open phpMyAdmin
5. Select database
6. Click Import
7. Upload: SQL_FILE/coffee-blend.sql
8. Wait for success message

---

### ❌ Issue 3: CSS/Images Not Loading
**Symptoms:** Site loads but looks plain, no styling

**Solutions:**
1. Check APPURL in includes/header.php
2. Verify it's set to: https://mycafe.free.nf
3. Check if CSS files uploaded to css/ folder
4. Check if images uploaded to images/ folder

**Fix - Edit includes/header.php:**
Make sure line ~11 has:
```php
define("APPURL", "https://mycafe.free.nf");
define("IMAGEPRODUCTS", "https://mycafe.free.nf/admin-panel/products-admins/images");
```

---

### ❌ Issue 4: Admin Panel Not Working
**Symptoms:** Can't access admin panel

**Solutions:**
1. Check URL is: https://mycafe.free.nf/admin-panel
2. Verify admin-panel folder uploaded
3. Check ADMINURL in admin-panel/layouts/header.php

**Fix - Edit admin-panel/layouts/header.php:**
Make sure line ~11 has:
```php
define("ADMINURL", "https://mycafe.free.nf/admin-panel");
```

---

### ❌ Issue 5: Can't Login to Admin
**Symptoms:** Admin login page loads but can't login

**Solutions:**
1. Check if admins table has data
2. Reset admin password via phpMyAdmin

**Fix Password Reset:**
1. Open phpMyAdmin
2. Select database: if0_40757292_caffee
3. Browse "admins" table
4. Edit the admin record
5. Copy this PHP code:
   ```php
   <?php echo password_hash('newpassword123', PASSWORD_DEFAULT); ?>
   ```
6. Run it locally to get hash
7. Update password field with the hash
8. Login with: admin.first@gmail.com / newpassword123

---

### ❌ Issue 6: 404 Errors for Pages
**Symptoms:** Homepage works but other pages show 404

**Solutions:**
1. Check .htaccess uploaded
2. Verify all PHP files in correct folders
3. Check file permissions

**Fix:**
```
- Re-upload .htaccess file
- Ensure all folders uploaded (auth/, products/, admin-panel/, etc.)
- Check control panel for any upload errors
```

---

### ❌ Issue 7: Session Errors
**Symptoms:** Errors about sessions, can't stay logged in

**Solutions:**
1. Check session_start() in header files
2. Verify PHP sessions enabled

**Already Fixed:** Sessions should work automatically

---

### ❌ Issue 8: Environment Detection Wrong
**Symptoms:** Site tries to use localhost settings on production

**Solutions:**
Check these files have correct environment detection:
1. config/config.php
2. includes/header.php  
3. admin-panel/layouts/header.php

**Already Fixed:** Auto-detection is configured

---

## 🔍 Diagnostic Checklist

Run through this checklist:

### Files Uploaded? ✓
- [ ] All PHP files in htdocs
- [ ] css/ folder and all CSS files
- [ ] js/ folder and all JS files
- [ ] images/ folder and all images
- [ ] admin-panel/ folder complete
- [ ] .htaccess file

### Database Setup? ✓
- [ ] Database created: if0_40757292_caffee
- [ ] SQL file imported via phpMyAdmin
- [ ] 7 tables exist (admins, users, products, etc.)
- [ ] Admin records exist in admins table

### Configuration? ✓
- [ ] config/config.php has correct credentials
- [ ] includes/header.php has https://mycafe.free.nf
- [ ] admin-panel/layouts/header.php has correct URL

### Test? ✓
- [ ] Visit: https://mycafe.free.nf/check-site.php
- [ ] Visit: https://mycafe.free.nf/test-database.php
- [ ] Visit homepage: https://mycafe.free.nf
- [ ] Visit admin: https://mycafe.free.nf/admin-panel

---

## 🆘 Still Having Issues?

### Method 1: Check Error Logs
1. Login to InfinityFree control panel
2. Go to "Error Logs"
3. Look for recent errors
4. Fix issues mentioned

### Method 2: Enable Error Display (Temporary)
Add to top of index.php:
```php
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
```
**Remember to remove this after fixing!**

### Method 3: Check File Manager
1. Use InfinityFree File Manager
2. Verify all files are in htdocs
3. Check file sizes match original
4. Look for upload errors

---

## 📞 Get Help

1. **Upload diagnostic files first** - This shows exactly what's wrong
2. **Visit InfinityFree Forum**: https://forum.infinityfree.net/
3. **Include this info:**
   - URL: https://mycafe.free.nf
   - Error message
   - Results from check-site.php
   - What you've already tried

---

## ⚠️ SECURITY REMINDER

**After fixing all issues, DELETE these files:**
- check-site.php
- test-database.php

They contain sensitive information!

---

## ✅ Success Checklist

Your site is working when:
- ✓ Homepage loads with styling
- ✓ Navigation menu works
- ✓ Can register new user
- ✓ Can login as user
- ✓ Can view products
- ✓ Shopping cart works
- ✓ Admin panel accessible
- ✓ Can login as admin

**Then delete diagnostic files and enjoy your site!** 🎉
