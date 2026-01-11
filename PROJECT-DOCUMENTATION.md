# ☕ Coffee Blend - Complete Project Documentation

## 📋 Table of Contents
1. [Project Overview](#project-overview)
2. [System Architecture](#system-architecture)
3. [Database Structure](#database-structure)
4. [File Structure & Organization](#file-structure--organization)
5. [Core Features](#core-features)
6. [Technical Stack](#technical-stack)
7. [Configuration & Setup](#configuration--setup)
8. [User Flows](#user-flows)
9. [Admin Panel](#admin-panel)
10. [Security Features](#security-features)
11. [Deployment Guide](#deployment-guide)
12. [Troubleshooting](#troubleshooting)

---

## 🎯 Project Overview

**Coffee Blend** is a full-featured e-commerce web application for a coffee shop, built with PHP and MySQL. It allows customers to browse products, place orders, make reservations, and write reviews. The system includes a complete admin panel for managing products, orders, bookings, and administrators.

### Key Capabilities
- **Product Catalog**: Browse drinks and desserts with detailed information
- **Shopping Cart**: Add products, manage quantities, checkout
- **User Authentication**: Register, login, session management
- **Table Reservations**: Book tables with date/time selection
- **Review System**: Customers can write and share reviews
- **Admin Dashboard**: Complete backend management system
- **Responsive Design**: Mobile-friendly interface using Bootstrap 4

---

## 🏗️ System Architecture

### Application Type
- **Architecture**: Monolithic MVC-inspired structure
- **Pattern**: Server-side rendering with PHP
- **Session Management**: PHP sessions for authentication
- **Database**: Relational database (MySQL/MariaDB)

### Request Flow
```
Browser Request
    ↓
Apache Server (port 80/443)
    ↓
PHP Processor (8.3.x)
    ↓
config/config.php (Database Connection)
    ↓
includes/header.php (Session & Navigation)
    ↓
Page Logic (index.php, menu.php, etc.)
    ↓
Database Queries (PDO)
    ↓
HTML Response with includes/footer.php
    ↓
Browser Renders Page
```

### Environment Detection
The application automatically detects whether it's running locally or in production:

```php
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$isLocalhost = ($host == 'localhost' || $host == 'localhost:8000' || strpos($host, '127.0.0.1') !== false);

if ($isLocalhost) {
    // Use local database credentials
} else {
    // Use production (InfinityFree) credentials
}
```

---

## 🗄️ Database Structure

### Database Name
- **Local**: `caffee`
- **Production**: `if0_40757292_caffe`

### Tables Overview

#### 1. **admins** - Administrator Accounts
| Column | Type | Description |
|--------|------|-------------|
| id | INT (PK, AUTO_INCREMENT) | Unique admin ID |
| adminname | VARCHAR | Admin username |
| email | VARCHAR | Admin email |
| mypassword | VARCHAR | Hashed password |
| created_at | TIMESTAMP | Account creation date |

**Purpose**: Stores admin user credentials for accessing the admin panel.

#### 2. **users** - Customer Accounts
| Column | Type | Description |
|--------|------|-------------|
| id | INT (PK, AUTO_INCREMENT) | Unique user ID |
| username | VARCHAR | Customer username |
| email | VARCHAR | Customer email |
| mypassword | VARCHAR | Hashed password |
| created_at | TIMESTAMP | Registration date |

**Purpose**: Stores customer account information for authentication and order tracking.

#### 3. **products** - Product Catalog
| Column | Type | Description |
|--------|------|-------------|
| id | INT (PK, AUTO_INCREMENT) | Unique product ID |
| name | VARCHAR | Product name |
| image | VARCHAR | Image filename |
| price | DECIMAL | Product price |
| description | TEXT | Product description |
| type | ENUM('drink', 'dessert') | Product category |
| created_at | TIMESTAMP | Product creation date |

**Purpose**: Central catalog of all drinks and desserts available for purchase.

#### 4. **cart** - Shopping Cart Items
| Column | Type | Description |
|--------|------|-------------|
| id | INT (PK, AUTO_INCREMENT) | Unique cart item ID |
| name | VARCHAR | Product name |
| image | VARCHAR | Product image |
| price | DECIMAL | Product price |
| pro_id | INT (FK → products.id) | Reference to product |
| user_id | INT (FK → users.id) | Reference to user |
| product_qty | INT | Quantity selected |
| created_at | TIMESTAMP | Added to cart date |

**Purpose**: Temporary storage of items users add to cart before checkout.

#### 5. **orders** - Completed Orders
| Column | Type | Description |
|--------|------|-------------|
| id | INT (PK, AUTO_INCREMENT) | Unique order ID |
| name | VARCHAR | Product name |
| image | VARCHAR | Product image |
| price | DECIMAL | Product price |
| pro_id | INT (FK → products.id) | Reference to product |
| user_id | INT (FK → users.id) | Reference to user |
| product_qty | INT | Quantity ordered |
| status | VARCHAR | Order status |
| created_at | TIMESTAMP | Order placed date |

**Purpose**: Permanent record of all completed orders with status tracking.

#### 6. **bookings** - Table Reservations
| Column | Type | Description |
|--------|------|-------------|
| id | INT (PK, AUTO_INCREMENT) | Unique booking ID |
| first_name | VARCHAR | Customer first name |
| last_name | VARCHAR | Customer last name |
| date | DATE | Reservation date |
| time | TIME | Reservation time |
| phone | VARCHAR | Contact phone |
| message | TEXT | Special requests |
| user_id | INT (FK → users.id) | Reference to user |
| status | VARCHAR | Booking status |
| created_at | TIMESTAMP | Booking created date |

**Purpose**: Manages table reservation requests and status.

#### 7. **reviews** - Customer Reviews
| Column | Type | Description |
|--------|------|-------------|
| id | INT (PK, AUTO_INCREMENT) | Unique review ID |
| review | TEXT | Review content |
| username | VARCHAR | Reviewer name |
| created_at | TIMESTAMP | Review posted date |

**Purpose**: Stores customer feedback and testimonials displayed on the site.

---

## 📁 File Structure & Organization

### Root Directory Files

#### **index.php** - Homepage
- Displays featured products (drinks)
- Shows hero slider with coffee shop images
- Displays "About Us" section
- Shows product menu preview
- Displays customer testimonials/reviews
- Newsletter signup form

#### **menu.php** - Full Menu Page
- Lists all desserts
- Lists all drinks
- Categorized product display
- "Add to Cart" functionality
- Product images and prices

#### **about.php** - About Us Page
- Company information
- Team/staff showcase
- Customer reviews section
- Mission and values

#### **services.php** - Services Page
- Coffee shop services description
- Quality guarantees
- Specialty offerings
- Service features

#### **contact.php** - Contact Page
- Contact form
- Location map (Google Maps integration)
- Contact information (address, phone, email)
- Business hours

#### **404.php** - Error Page
- Custom 404 page
- "Page Not Found" message
- Link back to homepage

### Configuration

#### **config/config.php** - Database Connection
```php
// Auto-detects environment (local vs production)
// Sets database credentials accordingly
// Creates PDO connection ($conn)
// Error handling for connection failures
```

**Critical Features**:
- Environment auto-detection
- PDO with error mode exceptions
- Single connection reused across entire application

### Includes Directory

#### **includes/header.php** - Global Header
```php
// Session start
// Navigation menu
// User authentication checks
// APPURL constant definition
// CSS/JS includes
```

**Key Constants**:
- `APPURL`: Base URL for the application
- `IMAGEPRODUCTS`: Path to product images

#### **includes/footer.php** - Global Footer
```php
// Footer content
// Newsletter form
// Social media links
// Copyright information
// JavaScript includes
```

### Authentication System

#### **auth/register.php** - User Registration
- Registration form
- Password hashing
- Email validation
- Username uniqueness check
- Creates user session on success

#### **auth/login.php** - User Login
- Login form
- Password verification
- Session creation
- Redirect to homepage

#### **auth/logout.php** - Logout
- Destroys user session
- Redirects to homepage

### Booking System

#### **booking/book.php** - Table Reservation
- Booking form (date, time, guests, phone)
- Requires user authentication
- Inserts into bookings table
- Success confirmation

### Product & Shopping

#### **products/product-single.php** - Product Details
- Individual product page
- Detailed description
- Price information
- Add to cart button
- Product image

#### **products/cart.php** - Shopping Cart
- Display cart items
- Quantity modification
- Remove items
- Calculate total price
- Proceed to checkout button

#### **products/checkout.php** - Checkout Process
- Convert cart items to orders
- Clear cart
- Redirect to payment

#### **products/pay.php** - Payment Page
- Order confirmation
- Total amount display
- Payment processing (simplified)
- Success message

#### **products/delete-cart.php** - Remove Cart Item
- Deletes single item from cart
- Redirects back to cart

#### **products/delete-product.php** - Remove from Cart
- Alternative deletion method
- Used from product pages

### Review System

#### **reviews/write-review.php** - Submit Review
- Review form
- Requires authentication
- Inserts review into database
- Redirects to homepage

### Admin Panel Structure

#### **admin-panel/index.php** - Admin Dashboard
- Overview statistics
- Recent orders
- Recent bookings
- Quick links

#### **admin-panel/admins/**
- **admins.php**: List all administrators
- **create-admins.php**: Add new admin
- **login-admins.php**: Admin login
- **logout.php**: Admin logout

#### **admin-panel/products-admins/**
- **show-products.php**: List all products
- **create-products.php**: Add new product with image upload
- **delete-products.php**: Remove product
- **images/**: Uploaded product images

#### **admin-panel/orders-admins/**
- **show-orders.php**: View all orders
- **change-status.php**: Update order status (delivered, pending, etc.)
- **delete-orders.php**: Remove order

#### **admin-panel/bookings-admins/**
- **show-bookings.php**: View all reservations
- **change-status.php**: Update booking status (confirmed, pending, cancelled)
- **delete-bookings.php**: Remove booking

#### **admin-panel/layouts/**
- **header.php**: Admin panel header with ADMINURL constant
- **footer.php**: Admin panel footer

#### **admin-panel/styles/style.css**
- Custom admin panel styling

### Assets

#### **css/** - Stylesheets
- `bootstrap.min.css`: Bootstrap 4 framework
- `style.css`: Main custom styles
- `animate.css`: Animation library
- `aos.css`: Scroll animations
- `owl.carousel.min.css`: Carousel plugin
- `flaticon.css`: Icon fonts
- `ionicons.min.css`: Icon library

#### **js/** - JavaScript Files
- `jquery.min.js`: jQuery library
- `bootstrap.min.js`: Bootstrap JS
- `owl.carousel.min.js`: Product carousel
- `aos.js`: Animate on scroll
- `main.js`: Custom JavaScript

#### **images/** - Media Files
- Background images (bg_1.jpg, bg_2.jpg, etc.)
- Menu item images (menu-1.jpg, menu-2.jpg, etc.)
- Gallery images
- About section images

#### **fonts/** - Font Files
- Flaticon icon font
- Ionicons
- Open Iconic icons

### Database Files

#### **SQL_FILE/coffee-blend.sql**
- Complete database schema
- Sample data for all tables
- Table structure definitions
- Default admin account
- Sample products, users, reviews

---

## ⚙️ Core Features

### 1. User Authentication System

**Registration Flow**:
```
User fills form → Validate input → Hash password → 
Insert into users table → Create session → Redirect to home
```

**Login Flow**:
```
User enters credentials → Query users table → 
Verify password → Create session → Redirect to home
```

**Session Variables**:
- `$_SESSION['user_id']`: User ID
- `$_SESSION['username']`: Username
- `$_SESSION['email']`: User email

### 2. Shopping Cart System

**Add to Cart Flow**:
```
User clicks "Add to Cart" → Check if logged in → 
Check if already in cart → Insert/Update cart table → 
Redirect to cart page
```

**Cart Features**:
- Multiple items
- Quantity adjustment
- Real-time total calculation
- Persistent across sessions
- Item removal

### 3. Order Management

**Checkout Process**:
```
View cart → Click checkout → 
Copy cart items to orders table → 
Delete cart items → Redirect to payment → 
Show success message
```

**Order Statuses**:
- `pending`: Just placed
- `processing`: Being prepared
- `delivered`: Completed
- `cancelled`: Cancelled by admin

### 4. Booking/Reservation System

**Booking Flow**:
```
User fills reservation form → Validate date/time → 
Check authentication → Insert into bookings → 
Confirmation message
```

**Booking Statuses**:
- `pending`: Awaiting confirmation
- `confirmed`: Approved by admin
- `cancelled`: Rejected or cancelled

### 5. Review System

**Review Submission**:
```
User writes review → Check authentication → 
Insert into reviews table → Display on homepage
```

### 6. Admin Panel Features

**Product Management**:
- Create: Upload image, set name, price, description, type
- Read: View all products in table format
- Update: (Not implemented in current version)
- Delete: Remove product and its image

**Order Management**:
- View all orders with customer info
- Change status (pending → processing → delivered)
- Delete orders
- Sort by date

**Booking Management**:
- View all reservations
- Change status (pending → confirmed/cancelled)
- Delete bookings
- View customer details

**Admin Management**:
- Create new admin accounts
- View all admins
- Separate admin authentication

---

## 💻 Technical Stack

### Backend
- **Language**: PHP 8.3.x
- **Database**: MySQL/MariaDB
- **Database Abstraction**: PDO (PHP Data Objects)
- **Session Management**: PHP Sessions
- **Password Security**: PHP password_hash() / password_verify()

### Frontend
- **Framework**: Bootstrap 4.5
- **JavaScript**: jQuery 3.2.1
- **Carousel**: Owl Carousel 2
- **Animations**: AOS (Animate On Scroll)
- **Icons**: Flaticon, Ionicons, Open Iconic
- **Responsive**: Mobile-first design

### Server
- **Local Development**: PHP Built-in Server (localhost:8000)
- **Production**: Apache Server
- **Hosting**: InfinityFree (Free hosting platform)

### Development Tools
- **Version Control**: Git (recommended)
- **FTP Client**: FileZilla (for deployment)
- **Database Management**: phpMyAdmin
- **Code Editor**: VS Code (or any PHP editor)

---

## 🔧 Configuration & Setup

### Local Development Setup

#### Prerequisites
```bash
- PHP 8.x installed
- MySQL/MariaDB installed
- Web browser
- Terminal/Command Prompt
```

#### Step-by-Step Local Setup

1. **Place Project Files**
   ```
   C:\Users\mohan\Downloads\coffee-blend (6)\coffee-blend\
   ```

2. **Create Local Database**
   ```sql
   CREATE DATABASE caffee;
   USE caffee;
   SOURCE SQL_FILE/coffee-blend.sql;
   ```

3. **Configure Database** (config/config.php)
   ```php
   // Local settings (auto-detected)
   define("HOST", "localhost");
   define("DBNAME", "caffee");
   define("USER", "root");
   define("PASS", "");
   ```

4. **Start PHP Server**
   ```bash
   cd "C:\Users\mohan\Downloads\coffee-blend (6)\coffee-blend"
   php -S localhost:8000
   ```

5. **Access Application**
   ```
   Homepage: http://localhost:8000
   Admin Panel: http://localhost:8000/admin-panel
   ```

### Production Deployment (InfinityFree)

#### InfinityFree Credentials
- **MySQL Host**: sql306.infinityfree.com
- **Database**: if0_40757292_caffe
- **Username**: if0_40757292
- **Password**: St3EsR0M2gsnQ
- **FTP Host**: ftpupload.net
- **FTP Port**: 21
- **Website**: https://mycafe.free.nf

#### Deployment Steps

1. **Create InfinityFree Account**
   - Sign up at infinityfree.net
   - Create website: mycafe.free.nf

2. **Create Database**
   - Login to control panel
   - MySQL Databases → Create Database
   - Name: if0_40757292_caffe
   - Import SQL file via phpMyAdmin

3. **Upload Files via FTP**
   - Connect FileZilla to ftpupload.net:21
   - Navigate to htdocs folder
   - Upload all project files

4. **Critical Files to Upload**
   ```
   ✓ config/config.php (database connection)
   ✓ index.php (homepage)
   ✓ menu.php, about.php, contact.php, services.php
   ✓ 404.php
   ✓ All folders (admin-panel, auth, products, etc.)
   ✓ assets (css, js, images, fonts)
   ```

5. **Configure URLs**
   - Production APPURL: https://mycafe.free.nf
   - Production ADMINURL: https://mycafe.free.nf/admin-panel

6. **Test Deployment**
   - Visit: https://mycafe.free.nf
   - Test: Registration, Login, Cart, Checkout
   - Test: Admin panel login

---

## 👥 User Flows

### Customer Journey

#### 1. **First Visit (Guest User)**
```
Land on homepage → Browse products → 
Must register/login to add to cart → 
Register account → Login → Browse again
```

#### 2. **Shopping Flow**
```
Browse menu → Click "Add to Cart" → 
View cart → Adjust quantities → 
Checkout → View payment page → 
Order confirmation
```

#### 3. **Booking Flow**
```
Navigate to booking page → 
Fill reservation form (date, time, guests) → 
Submit → Confirmation message → 
Admin reviews and confirms
```

#### 4. **Review Flow**
```
Write review (requires login) → 
Submit → Review appears on homepage → 
Visible to all visitors
```

### Admin Journey

#### 1. **Admin Login**
```
Visit /admin-panel/admins/login-admins.php → 
Enter credentials → Access admin dashboard
```

#### 2. **Product Management**
```
Products → Create Product → 
Upload image + details → Save → 
Product appears on menu
```

#### 3. **Order Processing**
```
View Orders → Find pending order → 
Change status to "processing" → 
Complete order → Change to "delivered"
```

#### 4. **Booking Management**
```
View Bookings → Check details → 
Confirm or cancel → Customer notified
```

---

## 🛡️ Security Features

### Authentication Security

1. **Password Hashing**
   ```php
   $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
   ```

2. **Session Management**
   ```php
   session_start();
   $_SESSION['user_id'] = $userId;
   ```

3. **Login Protection**
   ```php
   if(!isset($_SESSION['user_id'])) {
       header("Location: login.php");
   }
   ```

### Database Security

1. **PDO Prepared Statements**
   ```php
   $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
   $stmt->execute([':email' => $email]);
   ```

2. **Error Mode**
   ```php
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   ```

### File Upload Security

1. **Image Validation** (in create-products.php)
   ```php
   - File type validation
   - File size limits
   - Unique filename generation
   - Restricted upload directory
   ```

### .htaccess Security

```apache
# Prevent directory listing
Options -Indexes

# Protect config files
<FilesMatch "config\.php$">
    Order allow,deny
    Deny from all
</FilesMatch>
```

---

## 🔍 Troubleshooting

### Common Issues & Solutions

#### 1. **Database Connection Error**
```
Error: Access denied for user
Solution: 
- Check database credentials in config/config.php
- Verify database exists
- Check if user has permissions
```

#### 2. **Session Not Working**
```
Error: User logged in but session lost
Solution:
- Ensure session_start() is at top of header.php
- Check session cookie settings
- Verify PHP session extension is enabled
```

#### 3. **Images Not Loading**
```
Error: Product images showing broken
Solution:
- Check APPURL constant is correct
- Verify images uploaded to admin-panel/products-admins/images/
- Check file permissions
```

#### 4. **404 Errors on All Pages**
```
Error: Only homepage works
Solution:
- Check .htaccess file exists
- Enable mod_rewrite in Apache
- Verify RewriteBase in .htaccess
```

#### 5. **Cart Items Disappearing**
```
Error: Cart empties on refresh
Solution:
- Check if user is logged in
- Verify user_id in cart table matches session
- Check database connection persistence
```

#### 6. **Admin Panel Can't Login**
```
Error: Admin credentials not working
Solution:
- Check admins table has entries
- Verify password was hashed correctly
- Check admin session variables
```

### InfinityFree Specific Issues

#### 1. **Remote Database Connection Blocked**
```
Error: Can't connect from local machine
Solution: InfinityFree blocks remote database connections.
This is normal. Database only accessible from their servers.
```

#### 2. **Slow Loading**
```
Issue: Pages load slowly
Solution:
- InfinityFree has slower performance (free tier)
- Clear browser cache
- Optimize images (reduce file sizes)
```

#### 3. **Hit Limit Reached**
```
Error: 50,000 hits per day exceeded
Solution:
- InfinityFree has daily hit limits
- Wait 24 hours
- Upgrade to premium hosting
```

### Debug Mode

Enable error display for debugging:
```php
// Add to top of page
error_reporting(E_ALL);
ini_set('display_errors', 1);
```

---

## 📊 Default Data & Credentials

### Sample Admin Account
```
Username: admin
Email: admin@admin.com
Password: admin123 (hashed in database)
```

### Sample User Account
```
Username: test
Email: test@test.com
Password: test123 (hashed in database)
```

### Sample Products
- Espresso ($3.50)
- Cappuccino ($4.00)
- Latte ($4.50)
- Croissant ($2.50)
- Chocolate Cake ($5.00)

### Database Connection Status Codes
```
200: Success
500: Database connection error
403: Access denied
404: Table/record not found
```

---

## 🚀 Performance Optimization

### Recommended Improvements

1. **Image Optimization**
   - Compress images before upload
   - Use WebP format
   - Implement lazy loading

2. **Caching**
   - Enable browser caching
   - Implement Redis/Memcached
   - Cache database queries

3. **Database Optimization**
   - Add indexes on frequently queried columns
   - Optimize JOIN queries
   - Use LIMIT for pagination

4. **Code Optimization**
   - Minimize database queries
   - Use prepared statements
   - Implement autoloading

5. **Asset Optimization**
   - Minify CSS/JS files
   - Combine multiple files
   - Use CDN for libraries

---

## 📝 Future Enhancements

### Suggested Features

1. **Payment Integration**
   - Stripe/PayPal integration
   - Credit card processing
   - Invoice generation

2. **Advanced Features**
   - Product search functionality
   - Category filters
   - Product ratings (star system)
   - Wishlist functionality

3. **Admin Improvements**
   - Analytics dashboard
   - Sales reports
   - Inventory management
   - Product update functionality

4. **User Experience**
   - Email notifications
   - SMS confirmations
   - Order tracking
   - Loyalty program

5. **Technical Improvements**
   - RESTful API
   - AJAX cart updates
   - Real-time notifications
   - Progressive Web App (PWA)

---

## 📞 Support & Maintenance

### Regular Maintenance Tasks

1. **Weekly**
   - Backup database
   - Review error logs
   - Check disk space

2. **Monthly**
   - Update PHP/MySQL versions
   - Review security patches
   - Clean up old sessions

3. **Quarterly**
   - Performance audit
   - Security audit
   - User feedback review

### Backup Strategy

```bash
# Database Backup
mysqldump -u username -p caffee > backup_$(date +%Y%m%d).sql

# File Backup
tar -czf backup_$(date +%Y%m%d).tar.gz /path/to/coffee-blend/
```

---

## 📄 License & Credits

### Third-Party Libraries
- Bootstrap (MIT License)
- jQuery (MIT License)
- Owl Carousel (MIT License)
- AOS (MIT License)
- Flaticon (Various licenses)

### Project Status
- Version: 1.0
- Last Updated: December 2025
- Status: Production Ready

---

## 🎯 Quick Reference

### Important URLs

**Local Development**
```
Homepage: http://localhost:8000
Admin Panel: http://localhost:8000/admin-panel
Admin Login: http://localhost:8000/admin-panel/admins/login-admins.php
```

**Production**
```
Homepage: https://mycafe.free.nf
Admin Panel: https://mycafe.free.nf/admin-panel
Admin Login: https://mycafe.free.nf/admin-panel/admins/login-admins.php
```

### Key Files Reference
```
Database Config: config/config.php
Main Header: includes/header.php
Main Footer: includes/footer.php
Admin Header: admin-panel/layouts/header.php
Database SQL: SQL_FILE/coffee-blend.sql
```

### Database Quick Commands
```sql
-- View all products
SELECT * FROM products;

-- View pending orders
SELECT * FROM orders WHERE status = 'pending';

-- View today's bookings
SELECT * FROM bookings WHERE date = CURDATE();

-- Count total users
SELECT COUNT(*) FROM users;
```

---

**End of Documentation**

*For additional support or questions, refer to the troubleshooting section or review the inline code comments.*
