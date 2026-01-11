# Coffee Blend Project - Running Guide

## ✅ Project Status: FULLY OPERATIONAL

### Server Information
- **URL**: http://localhost:8000
- **Status**: Running
- **PHP Version**: 8.3.16
- **Database**: caffee (MySQL)

### What Was Fixed
1. ✅ Database created and imported successfully
2. ✅ All 7 tables populated with sample data
3. ✅ Missing images (menu-2.jpg, menu-3.jpg) created
4. ✅ PHP development server running

### Database Details
- **Tables**: admins, users, products, bookings, orders, reviews, cart
- **Admins**: 2 accounts
- **Users**: 1 account
- **Products**: 4 items
- **Sample data**: Loaded

### Admin Panel Access
- **URL**: http://localhost:8000/admin-panel/
- **Login URL**: http://localhost:8000/admin-panel/admins/login-admins.php
- **Default Admin**:
  - Email: admin.first@gmail.com
  - Password: (check database or reset)

### Available Pages
- Homepage: http://localhost:8000/
- Menu: http://localhost:8000/menu.php
- About: http://localhost:8000/about.php
- Services: http://localhost:8000/services.php
- Contact: http://localhost:8000/contact.php
- Register: http://localhost:8000/auth/register.php
- Login: http://localhost:8000/auth/login.php

### To Stop the Server
Press `Ctrl+C` in the terminal where PHP server is running

### To Restart the Server
```powershell
cd "c:\Users\mohan\Downloads\coffee-blend (6)\coffee-blend"
php -S localhost:8000
```

---
**Note**: The project is fully functional and ready to use!
