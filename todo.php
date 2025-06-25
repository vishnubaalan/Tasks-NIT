<?php
session_start();

if (!isset($_SESSION['todoList'])) {
    $_SESSION['todoList'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['todo']) && !empty(trim($_POST['todo']))) {
        $_SESSION['todoList'][] = trim($_POST['todo']);
    }

    if (isset($_POST['delete'])) {
        $indexToDelete = $_POST['delete'];
        unset($_SESSION['todoList'][$indexToDelete]);
        $_SESSION['todoList'] = array_values($_SESSION['todoList']);
    }

    if (isset($_POST['clear'])) {
        $_SESSION['todoList'] = [];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>To-do PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .container {
            background: white;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            text-align: center;
            width: 320px;
        }

        h2 {
            margin-bottom: 20px;
        }

        input[type="text"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"], .delete-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }

        input[type="submit"] {
            background: #007BFF;
            margin-bottom: 10px;
        }

        input[type="submit"]:hover {
            background: #0056b3;
        }

        .delete-btn {
            background-color: #dc3545;
            margin-left: 10px;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }

        ul {
            list-style: none;
            padding: 0;
            margin-top: 20px;
            text-align: left;
        }

        li {
            background: #f1f1f1;
            margin: 5px 0;
            padding: 8px 12px;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .task-text {
            flex: 1;
        }
    </style>
</head>
<body>

<!-- Empty commit -->
 
<div class="container">
    <h2>Todo List</h2>

    <form method="post">
        <input type="text" name="todo" placeholder="Enter new task" required><br>
        <input type="submit" value="Add Task">
        <input type="submit" name="clear" value="Clear All" style="background-color: red;">
    </form>

    <?php if (!empty($_SESSION['todoList'])): ?>
        <ul>
            <?php foreach ($_SESSION['todoList'] as $index => $todo): ?>
                <li>
                    <span class="task-text"><?php echo htmlspecialchars($todo); ?></span>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="delete" value="<?php echo $index; ?>">
                        <button type="submit" class="delete-btn">Delete</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p style="color: gray;">No tasks yet.</p>
    <?php endif; ?>
</div>

</body>
</html>
