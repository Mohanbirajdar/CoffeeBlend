# ✅ InfinityFree Configuration Applied

## Database Credentials - CONFIGURED ✓
```
Hostname: sql306.infinityfree.com
Port: 3306
Database: if0_40757292_caffe
Username: if0_40757292
Password: St3EsR0M2gsnQ
```

## What's Done:
✓ config/config.php - Database credentials updated

## What You Need to Do:

### 1. Get Your Domain URL
Go to your InfinityFree control panel and find your domain URL.
It will look like one of these:
- `your-domain.infinityfreeapp.com` (subdomain)
- `yourdomain.com` (if you used custom domain)

### 2. Update URLs (Replace YOUR_DOMAIN with actual domain)
Once you have your domain, update these two files:

**File 1: includes/header.php** (line ~11)
Replace:
```php
define("APPURL", "https://your-domain.infinityfreeapp.com");
define("IMAGEPRODUCTS", "https://your-domain.infinityfreeapp.com/admin-panel/products-admins/images");
```
With:
```php
define("APPURL", "https://YOUR_DOMAIN");
define("IMAGEPRODUCTS", "https://YOUR_DOMAIN/admin-panel/products-admins/images");
```

**File 2: admin-panel/layouts/header.php** (line ~11)
Replace:
```php
define("ADMINURL", "https://your-domain.infinityfreeapp.com/admin-panel");
```
With:
```php
define("ADMINURL", "https://YOUR_DOMAIN/admin-panel");
```

### 3. Upload Files via FTP
- Host: ftpupload.net
- Port: 21
- Username: (from your InfinityFree control panel)
- Upload to: htdocs folder

### 4. Import Database
- Open phpMyAdmin from InfinityFree control panel
- Select database: if0_40757292_caffe
- Import: SQL_FILE/coffee-blend.sql

---

**IMPORTANT:** Tell me your domain URL and I'll update the remaining files automatically!
