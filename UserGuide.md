# User Guide — Restaurant Shift Viewer

## 1. Overview
It provides a simple dashboard where you can:
- View all shift records
- Add a new shift
- Edit an existing shift
- Delete a shift

## 2. Requirements
To run the app you need:
- A web server that can run PHP (e.g., Apache with PHP, or PHP built-in server)
- PHP with PDO + PDO MySQL driver enabled
- MySQL/MariaDB database server

## 3. Setup (Database + App)
### 3.1 Create the database table
Run the SQL in `database/schema.sql` in your MySQL/MariaDB database.

Example (run in your DB client):
- `CREATE TABLE shifts (...);`

### 3.2 Configure database connection
Edit `config/database.php` to match your environment.

This file contains:
- `$host`
- `$dbname`
- `$username`
- `$password`

> The application connects to a database named `restaurant_shifts` by default.

### 3.3 Deploy the PHP files
Make sure these files are reachable by your web server:
- `index.php`
- `create.php`
- `edit.php`
- `delete.php`
- `config/database.php`

Then open the app in your browser using the URL to `index.php`.

## 4. Using the Application
Open `index.php`.

### 4.1 View shifts (Dashboard)
The dashboard shows a table with columns:
- **ID**
- **Employee** (`employee_name`)
- **Date** (`shift_date`)
- **Start Time** (`start_time`)
- **End Time** (`end_time`)

Each row includes action links:
- **Edit** → opens `edit.php?id=...`
- **Delete** → opens `delete.php?id=...`

### 4.2 Add a shift
1. Click **➕ Add New Shift** (link to `create.php`).
2. Fill in the form:
   - **Employee Name**
   - **Shift Date**
   - **Start Time**
   - **End Time**
3. Click **Add Shift**.
4. The app saves the record to the database and redirects back to `index.php`.

### 4.3 Edit a shift
1. On the dashboard, click **✏️ Edit** for the shift you want to change.
2. Update any fields:
   - Employee Name
   - Shift Date
   - Start Time
   - End Time
3. Click **Update Shift**.
4. The app updates the database record and redirects back to `index.php`.

### 4.4 Delete a shift
1. On the dashboard, click **🗑️ Delete** for the shift you want removed.
2. The app deletes the selected record and redirects back to `index.php`.

## 5. Data Model (What gets stored)
Shifts are stored in the `shifts` table.

Columns:
- `id` (auto-increment primary key)
- `employee_name` (string)
- `shift_date` (DATE)
- `start_time` (TIME)
- `end_time` (TIME)
- `created_at` (timestamp when the record was created)

## 6. Troubleshooting
### 6.1 “Connection failed” / database errors
- Confirm MySQL/MariaDB is running.
- Confirm the database name in `config/database.php` is correct.
- Confirm username/password are correct.
- Confirm PDO MySQL driver is enabled in PHP.

### 6.2 “Table shifts doesn’t exist”
- Ensure you imported `database/schema.sql`.
- Confirm you imported it into the same database configured in `config/database.php`.

### 6.3 Delete/Update not working
- Ensure `id` is present in the URL (e.g., `edit.php?id=1`).
- Ensure the `shifts` record with that `id` exists.

## 7. Notes
- This app is intentionally minimal for small devices and local network use.
- The current implementation does not include authentication/role permissions; access is limited only by where you deploy the PHP files.

