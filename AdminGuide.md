# Admin Guide — Restaurant Shift Viewer

## 1. Overview
This guide is for administrators/managers who operate **Restaurant Shift Viewer**. It focuses on:

- **Configuration**: how to point the app at your database and deploy the PHP files.
- **Maintenance**: how to keep data safe, apply schema/app updates, and troubleshoot common issues.

> Note: This current project is intentionally minimal and (in the provided codebase) does not include authentication/role permissions. Admin actions are typically available to anyone who can access the deployed PHP pages.

---

## 2. Configuration

### 2.1 Install requirements
You need:

- PHP (with PDO)
- PDO MySQL driver enabled
- MySQL/MariaDB server
- A way to serve the PHP files (Apache/Nginx or PHP built-in server)

Verify PHP modules (example):
- `pdo_mysql`

---

### 2.2 Create the database schema
Run the SQL in `database/schema.sql` against your MySQL/MariaDB server.

Typical steps:
1. Log into MySQL/MariaDB
2. Create a database (if needed)
3. Import `database/schema.sql`

After import, you should have a `shifts` table.

---

### 2.3 Configure database connection
Edit `config/database.php`.

It defines:
- `$host` (e.g., `localhost`)
- `$dbname` (default: `restaurant_shifts`)
- `$username`
- `$password`

Example format:
```php
$host = "localhost";
$dbname = "restaurant_shifts";
$username = "root";
$password = "...";
```

**Important**
- Ensure the `$dbname` matches the database where you imported `database/schema.sql`.
- Use a dedicated DB user in production (least privilege: only what’s required for CRUD on `shifts`).

---

### 2.4 Deploy the application files
Make sure your web server can reach these PHP files:

- `index.php`
- `create.php`
- `edit.php`
- `delete.php`
- `config/database.php`

Deployment options:
- **Apache/Nginx**: place the project files under your web root.
- **PHP built-in server (testing)**:
  - Run from the project directory and point browser to `index.php`.

---

### 2.5 Sanity check
After deployment and DB setup:
1. Open `index.php` in a browser
2. Confirm the shifts table loads
3. Add a shift via `create.php`
4. Edit via `edit.php?id=...`
5. Delete via `delete.php?id=...`

If you see connection/table errors:
- Verify `config/database.php`
- Verify `shifts` table exists in the configured DB

---

## 3. Application maintenance

### 3.1 Backups (recommended)
Back up **both**:
- The **database** (at minimum the schema + data)
- Any **config** files (especially `config/database.php`)

Recommended backup cadence:
- Daily or before making updates
- More frequent if shift data is critical

Minimum backup checklist:
- Export SQL or use DB snapshots
- Store backups off-device (e.g., network share / SD card mirror)

---

### 3.2 Keep the database schema consistent
If you change the application logic, you may need to update the DB.

Steps when updating schema:
1. Review changes in `database/schema.sql`
2. Apply schema updates in a controlled way
3. Test CRUD flows (create/edit/delete)

**Rule of thumb**: apply schema changes before deploying code that depends on them.

---

### 3.3 Update process
When pulling new code changes:

1. Pull latest changes
2. If `database/schema.sql` changed, review and apply updates
3. Confirm `config/database.php` still matches your environment
4. Smoke test:
   - Load `index.php`
   - Create a shift
   - Edit the shift
   - Delete the shift

---

### 3.4 Security and operational hardening
This app is minimal, so operational controls matter.

Recommended hardening:
- Restrict network access to the device/web server (firewall/VPN/local network only)
- Use a dedicated DB user with least privileges
- Rotate DB credentials if exposed
- Ensure backups are protected

If you later add authentication/roles, re-check that admin pages are protected.

---

### 3.5 Troubleshooting

#### 3.5.1 “Connection failed” / database errors
Check:
- MySQL/MariaDB is running
- `$host`, `$dbname`, `$username`, `$password` in `config/database.php`
- PDO MySQL driver enabled

#### 3.5.2 “Table shifts doesn’t exist”
Check:
- `database/schema.sql` imported successfully
- Imported into the same database defined by `$dbname`

#### 3.5.3 CRUD actions not working
Check:
- URL `id` exists (e.g., `edit.php?id=1`)
- The record exists in `shifts`
- Permissions for the DB user

---

## 4. Admin checklist (quick reference)

**After initial setup**
- [ ] Imported `database/schema.sql`
- [ ] Updated `config/database.php`
- [ ] Verified `index.php` loads
- [ ] Verified create/edit/delete works

**Before/after updates**
- [ ] Backups completed
- [ ] If schema changed, applied it
- [ ] Smoke-tested CRUD flows

---

## 5. Files of interest
- `config/database.php` — database connection settings
- `database/schema.sql` — DB schema
- `index.php` — dashboard
- `create.php` — add shift
- `edit.php` — update shift
- `delete.php` — remove shift

