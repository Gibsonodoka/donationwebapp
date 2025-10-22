# 🎖️ Friends of the Battalion — Donation Web App

A modern Laravel-based donation platform that enables supporters to contribute crypto donations, upload receipts, and track their giving history.  
Built with **Laravel 11**, **TailwindCSS**, and **Alpine.js**, the platform ensures transparency and ease of use for both donors and administrators.

---

## 🚀 Features

### 👥 User Portal
- Simple authentication and registration (via Laravel Breeze)
- Interactive donation accordion with multiple crypto wallets (BTC, ETH, USDT)
- Receipt upload with confirmation workflow
- Real-time copy-to-clipboard wallet addresses
- Personal donation history dashboard with status tracking
- More features coming up

### 🛠️ Admin Dashboard
- View all donations with user details
- Confirm or reject payments
- Manage supporter data and crypto receipts
- Role-based access control via middleware

### 🎨 Frontend
- Fully responsive TailwindCSS UI
- Hero banner with gradient overlay
- Donation accordion using Alpine.js for smooth interactivity
- Reusable layout components (navbar, sidebar, footer)

---

## 🧩 Tech Stack

| Layer | Technology |
|--------|-------------|
| **Backend** | Laravel 11 |
| **Frontend** | Blade, TailwindCSS, Alpine.js |
| **Database** | MySQL / MariaDB |
| **Storage** | Local storage (for receipts) |
| **Auth** | Laravel Breeze (sanctum-based) |

---

## ⚙️ Installation

### 1️⃣ Clone the Repository
```bash
git clone https://github.com/Gibsonodoka/donationwebapp.git
cd donationwebapp
