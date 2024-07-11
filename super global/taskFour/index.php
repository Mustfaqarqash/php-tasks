<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            margin-bottom: 20px;
        }
        .task {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #f4f4f4;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
        }
        .task p {
            margin: 0;
        }
    </style>
</head>

<body>
    <h2>To-Do List</h2>

   
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="taskName">Task Name:</label>
        <input type="text" id="taskName" name="taskName" required>
        
        <label for="taskDesc">Task Description:</label>
        <input type="text" id="taskDesc" name="taskDesc" required>
        
        <button type="submit" name="addTask">Add Task</button>
    </form>

    <?php
    session_start();

    
    if (!isset($_SESSION['tasks'])) {
        $_SESSION['tasks'] = array();
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addTask'])) {
        $taskName = $_POST['taskName'];
        $taskDesc = $_POST['taskDesc'];
        $task = array("name" => $taskName, "desc" => $taskDesc);
        array_push($_SESSION['tasks'], $task);
    }

  
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteTask'])) {
        $taskIndex = $_POST['taskIndex'];
        array_splice($_SESSION['tasks'], $taskIndex, 1);
    }
    ?>

    <section>
        <h3>Tasks:</h3>
        <?php if (!empty($_SESSION['tasks'])): ?>
            <?php foreach ($_SESSION['tasks'] as $index => $task): ?>
                <div class="task">
                    <div>
                        <p><strong><?php echo $task['name']; ?></strong></p>
                        <p><?php echo $task['desc']; ?></p>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="margin: 0;">
                        <input type="hidden" name="taskIndex" value="<?php echo $index; ?>">
                        <button type="submit" name="deleteTask">Delete</button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No tasks available.</p>
        <?php endif; ?>
    </section>

</body>

</html>
