# Appointment Booking – Backend

This is the backend service for the Appointment Booking system.  
It provides APIs for managing availability slots, creating bookings, and sending booking confirmation emails.

---

## 🛠 Tech Stack

- PHP 8.2
- Laravel (Latest)
- MySQL
- SendGrid (Mail)
- Laravel Jobs (Sync execution using `dispatch_now()`)

---

## 🚀 Installation & Running the Project

### Prerequisites
- PHP 8.2+
- Composer
- MySQL
- SendGrid account (for email)

---

### Setup Steps

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve --port=8001

