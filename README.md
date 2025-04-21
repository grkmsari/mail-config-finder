# 📧 Mail Config Finder (with PHPMailer)

This project is an open-source PHP tool to test various SMTP configurations using PHPMailer. It allows manual or automated testing of SMTP settings to identify working combinations.

## ✨ Features

- Test SMTP settings manually
- Automatically try common port + encryption combinations
- Visual feedback for successful/failed attempts
- Simple and user-friendly web interface

## 🚀 Quick Start

1. Clone the repository:
   ```bash
   git clone https://github.com/grkmsari/mail-config-finder.git
   cd smtp-tester
   ```

2. Install Composer dependencies:
   ```bash
   composer install
   ```

3. Start the local server:
   ```bash
   php -S localhost:8000 -t public/
   ```

4. Open in your browser:
   ```
   http://localhost:8000
   ```

## 🧪 Usage Modes

### ✅ Manual Mode
Enter SMTP details (host, port, username, password, encryption, etc.) manually and test the connection.

### 🔁 Automatic Mode
Automatically tests common combinations of ports and encryption types:

- Ports: `25`, `465`, `587`, `2525`
- Encryption: `ssl`, `tls`, `none`

## 📁 Project Structure

```
mail-config-finder/
├── public/
│   ├── index.html
│   └── SmtpTester.php
├── composer.json
└── README.md
```
