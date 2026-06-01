<?php
require_once 'config/database.php';

$stmt = $pdo->query("SELECT * FROM shifts");
$shifts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Restaurant Shift Viewer</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Georgia', serif;
            background-color: #1a0000;
            color: #f5f5f5;
        }
        header {
            background: linear-gradient(135deg, #8B0000, #FFD700);
            padding: 20px;
            text-align: center;
        }
        header h1 {
            font-size: 2.5em;
            color: #fff;
            text-shadow: 2px 2px 4px #000;
            letter-spacing: 2px;
        }
        header p {
            color: #FFD700;
            font-size: 1em;
            margin-top: 5px;
        }
        .container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 0 20px;
        }
        .btn-add {
            display: inline-block;
            background: linear-gradient(135deg, #FFD700, #FFA500);
            color: #1a0000;
            padding: 12px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 20px;
            font-size: 1em;
            transition: 0.3s;
        }
        .btn-add:hover { opacity: 0.85; transform: scale(1.05); }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #2a0000;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(255,215,0,0.2);
        }
        thead {
            background: linear-gradient(135deg, #8B0000, #FFD700);
        }
        thead th {
            padding: 15px;
            color: #fff;
            text-align: left;
            font-size: 1em;
            letter-spacing: 1px;
        }
        tbody tr {
            border-bottom: 1px solid #3a0000;
            transition: 0.3s;
        }
        tbody tr:hover { background: #3a0000; }
        tbody td {
            padding: 12px 15px;
            color: #f5f5f5;
        }
        .btn-edit {
            background: #FFD700;
            color: #1a0000;
            padding: 6px 14px;
            border-radius: 15px;
            text-decoration: none;
            font-weight: bold;
            font-size: 0.85em;
            margin-right: 5px;
        }
        .btn-delete {
            background: #8B0000;
            color: #fff;
            padding: 6px 14px;
            border-radius: 15px;
            text-decoration: none;
            font-weight: bold;
            font-size: 0.85em;
        }
        .btn-edit:hover { opacity: 0.8; }
        .btn-delete:hover { opacity: 0.8; }
        footer {
            text-align: center;
            padding: 20px;
            color: #FFD700;
            margin-top: 40px;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <header>
        <h1>🍽️ Restaurant Shift Viewer</h1>
        <p>Manage your staff shifts easily</p>
    </header>
    <div class="container">
        <br>
        <a href="create.php" class="btn-add">➕ Add New Shift</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Employee</th>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($shifts as $shift): ?>
                <tr>
                    <td><?= $shift['id'] ?></td>
                    <td><?= $shift['employee_name'] ?></td>
                    <td><?= $shift['shift_date'] ?></td>
                    <td><?= $shift['start_time'] ?></td>
                    <td><?= $shift['end_time'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $shift['id'] ?>" class="btn-edit">✏️ Edit</a>
                        <a href="delete.php?id=<?= $shift['id'] ?>" class="btn-delete">🗑️ Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <footer>🍴 Restaurant Shift Viewer &copy; 2026</footer>
</body>
</html>
