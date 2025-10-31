# 🛒 TechNest

**TechNest** is a minimal, production-oriented e-commerce / marketplace demo built with **PHP**, **MySQL**, and **Bootstrap 5**.  
Focus: selling premium smartphones (Apple, Samsung, Vivo, etc.) with a simple role-based workflow for **Vendors** and **Admins**.

> Clean, practical, and ready to extend. This README is concise and professional — not noisy.

---

## 🚩 Key Features (Highlights)

- ✅ **Role-based access**
  - **Vendor**: can add products, create categories, and view their own listings.
  - **Admin**: can manage all products and categories — **edit**, **approve**, **dismiss/delete** vendor submissions.
- ✅ Product listing with image, price, category, vendor, and description.
- ✅ Responsive UI using **Bootstrap 5** and enhanced UX with **AOS** animations.
- ✅ Secure database interactions (prepared statements recommended).
- ✅ Simple login/session-based authentication.
- ✅ Clean, reusable includes (`header.php`, `footer.php`) and admin pages.

---

## 📌 Business Logic / Workflow

1. **Vendor Flow**
   - Vendor logs in → navigates to Add Product page → fills product form → submits.
   - Submitted product goes into DB with `status = 'pending'` or `status = 'active'` depending on your workflow.
   - Vendor can view their submissions; they can edit or delete their own draft/pending items (if allowed).

2. **Admin Flow**
   - Admin logs in → goes to Manage Product page → sees all products including vendor submissions.
   - Admin can **Approve/Activate**, **Edit**, or **Dismiss/Delete** any vendor-submitted product.
   - Admin and Vendor can **create categories**. You can add logic: if a vendor creates a category it is flagged for admin review (optional).

3. **Category Management**
   - Both Vendor & Admin can create categories.
   - Optionally: mark vendor-created categories as `pending` until admin approves (recommended for moderation).

---

## 🗂 Database (Suggested Tables & Fields)

> Use prepared statements for all inserts/updates to prevent SQL injection.

### `users`
- `id` INT PK
- `name` VARCHAR
- `email` VARCHAR UNIQUE
- `password` VARCHAR (hashed)
- `role` ENUM('admin','vendor','user')
- `created_at` TIMESTAMP

### `categories`
- `id` INT PK
- `name` VARCHAR
- `created_by` INT (user id)
- `status` ENUM('active','pending','disabled') — optional moderation flag
- `created_at` TIMESTAMP

### `product`
- `id` INT PK
- `name` VARCHAR
- `description` TEXT
- `price` DECIMAL
- `category_id` INT (FK -> categories.id)
- `category_name` VARCHAR (optional denormalized)
- `image` VARCHAR (path)
- `added_by` INT (user id of vendor)
- `status` ENUM('pending','active','dismissed')
- `created_at` TIMESTAMP
- `updated_at` TIMESTAMP

---

## ⚙️ Setup (Quick)

1. Clone repo:
   ```bash
   git clone https://github.com/your-username/TechNest.git
   cd TechNest
Create database and import SQL (or run provided migration script).

Update DB credentials in admin/connection.php:

php
Copy code
$conn = mysqli_connect('localhost','db_user','db_pass','db_name');
Start local server (WAMP/XAMPP) and open:

arduino
Copy code
http://localhost/project/
(Recommended) Ensure uploads/ or project/assests/ folder has write permission for image uploads.

🔐 Security Notes (Must Do)
Always use password_hash() / password_verify() for passwords.

Use prepared statements ($stmt = $conn->prepare(...)) for all DB queries.

Validate & sanitize all user inputs and uploaded files (MIME type, size).

Protect admin routes with role checks:

php
Copy code
if ($_SESSION['user']['role'] !== 'admin') {
    header('Location: /project/');
    exit;
}
👥 Example Accounts (Demo)
Admin

Email: admin@example.com

Password: admin123

Vendor

Email: vendor@example.com

Password: vendor123

(Change credentials in your DB for production.)

🧩 How to use: Add Product (Vendor) → Approve/Dismiss (Admin)
Vendor fills “Add Product” form → product saved with status = 'pending'.

Admin reviews pending products → clicks Approve to set status = 'active' or Dismiss to set status = 'dismissed'.

Active products show on the home/product grid.

🧰 Recommended Improvements (Future)
Email notifications on approval/dismissal.

Image optimization & CDN.

Soft-delete instead of hard-delete for audit trail.

Role-based dashboard analytics (number of vendor submissions, pending items).

Unit tests for crucial DB operations.

✍️ Author
Anurag Kumar
GitHub: https://github.com/your-username

