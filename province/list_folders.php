<!DOCTYPE html>
<html>
<head>
    <title>List of Folders</title>
    <style>
        /* Styles CSS for the list */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .folder-list {
            list-style: none;
            padding: 0;
        }

        .folder-item {
            padding: 5px 0;
        }

        .folder-link {
            text-decoration: none;
            color: #007bff;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>List of Folders</h2>
        <ul class="folder-list">
            <?php
            $basePath = "C:/Users/FUJITSU/Desktop/stage province/";
            $folders = scandir($basePath, SCANDIR_SORT_ASCENDING);
            foreach ($folders as $folder) {
                // Ignore . and .. directories
                if ($folder === '.' || $folder === '..') {
                    continue;
                }
                // Check if it's a directory
                if (is_dir($basePath . $folder)) {
                    // Create a link to view the contents of the folder
                    echo '<li class="folder-item">';
                    // Use absolute URL with the complete path to view_folder.php
                    echo '<a class="folder-link" href="' . htmlspecialchars('view_folder.php?path=' . urlencode($folder)) . '">' . htmlspecialchars($folder) . '</a>';
                    echo '</li>';
                }
            }
            ?>
        </ul>
    </div>
</body>
</html>

