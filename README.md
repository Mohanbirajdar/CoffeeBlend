# ☕ Coffee Blend - E-Commerce Coffee Shop

A full-featured e-commerce web application for a coffee shop built with PHP and MySQL.

![PHP](https://img.shields.io/badge/PHP-8.3-777BB4?style=flat-square&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-5.7+-4479A1?style=flat-square&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-4.5-7952B3?style=flat-square&logo=bootstrap&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)

## 🎯 Features

### Customer Features
- 🛒 **Shopping Cart** - Add products, manage quantities, checkout
- 📅 **Table Reservations** - Book tables with date/time selection
- ⭐ **Review System** - Write and share reviews
- 🔐 **User Authentication** - Register, login, session management
- 📱 **Responsive Design** - Mobile-friendly interface

### Admin Panel
- 📦 **Product Management** - Add, view, delete products with images
- 📋 **Order Management** - View and update order status
- 🗓️ **Booking Management** - Manage table reservations
- 👥 **Admin Management** - Create and manage admin accounts

## 🛠️ Tech Stack

- **Backend**: PHP 8.x
- **Database**: MySQL/MariaDB
- **Frontend**: Bootstrap 4, jQuery
- **Icons**: Flaticon, Ionicons
- **Animations**: AOS, Owl Carousel

## 📁 Project Structure

```
coffee-blend/
├── admin-panel/          # Admin dashboard
│   ├── admins/           # Admin authentication
│   ├── bookings-admins/  # Booking management
│   ├── orders-admins/    # Order management
│   ├── products-admins/  # Product management
│   └── layouts/          # Admin header/footer
├── auth/                 # User authentication
├── booking/              # Reservation system
├── config/               # Database configuration
├── css/                  # Stylesheets
├── fonts/                # Font files
├── images/               # Static images
├── includes/             # Header/footer includes
├── js/                   # JavaScript files
├── products/             # Cart, checkout, payment
├── reviews/              # Review system
├── scss/                 # SCSS source files
├── SQL_FILE/             # Database schema
└── users/                # User pages
```

## 🚀 Quick Start

### Prerequisites
- PHP 8.x
- MySQL/MariaDB
- Web browser

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/coffee-blend.git
   cd coffee-blend
   ```

2. **Create Database**
   ```sql
   CREATE DATABASE caffee;
   USE caffee;
   SOURCE SQL_FILE/coffee-blend.sql;
   ```

3. **Configure Database** (config/config.php)
   ```php
   define("HOST", "localhost");
   define("DBNAME", "caffee");
   define("USER", "root");
   define("PASS", "");
   ```

4. **Start PHP Server**
   ```bash
   php -S localhost:8000
   ```

5. **Access Application**
   - Homepage: https://mycafe.free.nf/?i=1
   - Admin Panel: https://mycafe.free.nf/admin-panel

## 🗄️ Database Schema

| Table | Description |
|-------|-------------|
| `admins` | Administrator accounts |
| `users` | Customer accounts |
| `products` | Product catalog (drinks & desserts) |
| `cart` | Shopping cart items |
| `orders` | Completed orders |
| `bookings` | Table reservations |
| `reviews` | Customer reviews |

## 🔐 Default Credentials

### Admin Account
- **Email**: admin.first@gmail.com
- **Password**: password

### Test User
- **Email**: user@gmail.com
- **Password**: password

## 📸 Screenshots

### Homepage
- Hero slider with coffee shop images
- Featured products
- Customer testimonials

### Menu Page
- Product catalog with categories
- Add to cart functionality

### Admin Dashboard
- Order management
- Product management
- Booking management

## 🌐 Deployment

The application supports automatic environment detection:
- **Local**: Uses localhost database credentials
- **Production**: Uses production database credentials

### Deploy to InfinityFree (or similar)
1. Create database via phpMyAdmin
2. Import `SQL_FILE/coffee-blend.sql`
3. Upload files via FTP
4. Update `config/config.php` with production credentials

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📞 Support

For support, refer to the `PROJECT-DOCUMENTATION.md` file for detailed documentation.

---

⭐ **Star this repo if you find it helpful!**
