<?php
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO shifts (employee_name, shift_date, start_time, end_time) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_POST['employee_name'], $_POST['shift_date'], $_POST['start_time'], $_POST['end_time']]);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Shift</title>
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
        header h1 { font-size: 2em; color: #fff; text-shadow: 2px 2px 4px #000; }
        .container {
            max-width: 500px;
            margin: 40px auto;
            background: #2a0000;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(255,215,0,0.2);
        }
        h2 { color: #FFD700; margin-bottom: 20px; text-align: center; }
        label { display: block; margin-bottom: 5px; color: #FFD700; font-size: 0.95em; }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #FFD700;
            border-radius: 8px;
            background: #1a0000;
            color: #f5f5f5;
            font-size: 1em;
        }
        input:focus { outline: none; border-color: #FFA500; }
        .btn-submit {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #FFD700, #FFA500);
            color: #1a0000;
            border: none;
            border-radius: 25px;
            font-size: 1em;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn-submit:hover { opacity: 0.85; }
        .btn-back {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #FFD700;
            text-decoration: none;
        }
        .btn-back:hover { color: #FFA500; }
    </style>
</head>
<body>
    <header><h1>🍽️ Restaurant Shift Viewer</h1></header>
    <div class="container">
        <h2>➕ Add New Shift</h2>
        <form method="POST">
            <label>Employee Name:</label>
            <input type="text" name="employee_name" placeholder="Enter employee name" required>
            <label>Shift Date:</label>
            <input type="date" name="shift_date" required>
            <label>Start Time:</label>
            <input type="time" name="start_time" required>
            <label>End Time:</label>
            <input type="time" name="end_time" required>
            <button type="submit" class="btn-submit">Add Shift</button>
        </form>
        <a href="index.php" class="btn-back">← Back to Dashboard</a>
    </div>
</body>
</html>
