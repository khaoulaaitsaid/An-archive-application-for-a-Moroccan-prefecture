<?php
// Check if the 'path' parameter is provided in the URL
if (isset($_GET['path'])) {
    $path = urldecode($_GET['path']);
    $fullPath = "C:/Users/FUJITSU/Desktop/stage province/" . $path;

    // Verify that the path exists
    if (file_exists($fullPath)) {
        // Check if 'file' parameter is provided in the URL
        if (isset($_GET['path'])) {
            $file = urldecode($_GET['path']);
            $fileFullPath = "C:/Users/FUJITSU/Desktop/stage province/" . $file;
            $fileExtension = strtolower(pathinfo($fileFullPath, PATHINFO_EXTENSION));
            $textExtensions = array('txt', 'html', 'htm', 'php', 'css', 'js');
            $imageExtensions = array('png', 'jpg', 'jpeg', 'gif');

            if ($fileExtension === 'pdf' && is_readable($fileFullPath)) {
                // Set the correct Content-Type header for PDF
                header('Content-Type: application/pdf');


                // Output the PDF file
                readfile($fileFullPath);

                // Exit the script to prevent any additional HTML content
                exit;
            } elseif (in_array($fileExtension, $textExtensions) && is_readable($fileFullPath)) {
                // Display text-based file content
                echo '<pre class="file-preview">' . htmlspecialchars(file_get_contents($fileFullPath)) . '</pre>';
            } elseif (in_array($fileExtension, $imageExtensions)) {
                // Display image file
                echo '<img src="' . htmlspecialchars($fileFullPath) . '" style="max-width: 100%;" alt="' . htmlspecialchars($file) . '">';
            } 
        } else {
            echo '<p>Cannot view contents of the file.</p>';
        }
        if (isset($_GET['path'])) {
    $file = urldecode($_GET['path']);
    $fileFullPath = "C:/Users/FUJITSU/Desktop/stage province/" . $file;
    $fileExtension = strtolower(pathinfo($fileFullPath, PATHINFO_EXTENSION));
    $textExtensions = array('txt', 'html', 'htm', 'php', 'css', 'js');
    $imageExtensions = array('png', 'jpg', 'jpeg', 'gif');

    // Check if it's a PDF and it exists and is readable
    if ($fileExtension === 'pdf' && is_readable($fileFullPath)) {
        // Set the correct Content-Type header for PDF
        
        header('Content-Type: application/pdf');

        // Output the PDF file
        readfile($fileFullPath);

        // Exit the script to prevent any additional HTML content
        exit;
    } elseif (in_array($fileExtension, $textExtensions) && is_readable($fileFullPath)) {
        // Display text-based file content
        
        echo '<pre class="file-preview">' . htmlspecialchars(file_get_contents($fileFullPath)) . '</pre>';
    } elseif (in_array($fileExtension, $imageExtensions)) {
        // Display image file
        echo '<img src="' . htmlspecialchars($fileFullPath) . '" style="max-width: 100%;" alt="' . htmlspecialchars($file) . '">';
    } 
    

    // Display a back button
   
}
    } else {
        echo '<p>Path not found.</p>';
    }
} else {
    echo '<p>No path specified.</p>';

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Folder Contents</title>
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
            max-width: 600px;
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

        /* Styles for file preview */
        .file-preview {
            border: 1px solid #ccc;
            padding: 10px;
            margin-top: 10px;
            white-space: pre-wrap;
        }

        /* Style for PDF viewer */
        .pdf-viewer {
            width: 100%;
            height: 500px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Check if the 'path' parameter is provided in the URL
        if (isset($_GET['path'])) {
            $path = urldecode($_GET['path']);
            $fullPath = "C:/Users/FUJITSU/Desktop/stage province/" . $path;

            // Verify that the path exists
            if (file_exists($fullPath)) {
                if (is_dir($fullPath)) {
                    
                    // Display folder contents
                    echo '<h2>Contents of Folder: ' . htmlspecialchars($path) . '</h2>';
                    echo '<ul class="folder-list">';
                    $contents = scandir($fullPath, SCANDIR_SORT_ASCENDING);
                    foreach ($contents as $item) {
                        if ($item === '.' || $item === '..') {
                            continue;
                            
                        }
                        $itemPath = $fullPath . '/' . $item;
                        echo '<li class="folder-item">';
                        if (is_dir($itemPath)) {
                            // Create a link to view the contents of the subfolder
                            
                            echo '<a class="folder-link" href="view_folder.php?path=' . urlencode($path . '/' . $item) . '">' . htmlspecialchars($item) . '</a>';
                        } else {
                            // Link to view the file content directly (changed 'file' to 'path')
                            
                            echo '<a class="folder-link" href="view_folder.php?path=' . urlencode($path . '/' . $item) . '">' . htmlspecialchars($item) . '</a>';
                        }
                        echo '</li>';
                    }
                    echo '</ul>';
                } else {
                    // Check if 'file' parameter is provided in the URL
                    if (isset($_GET['path'])) {
                        
                        $file = urldecode($_GET['path']);
                        $fileFullPath = "C:/Users/FUJITSU/Desktop/stage province/" . $file;
                        $fileExtension = strtolower(pathinfo($fileFullPath, PATHINFO_EXTENSION));
                        $textExtensions = array('txt', 'html', 'htm', 'php', 'css', 'js');
                        $imageExtensions = array('png', 'jpg', 'jpeg', 'gif');

                        echo '<h2>Viewing: ' . htmlspecialchars($file) . '</h2>';

                        if (in_array($fileExtension, $textExtensions) && is_readable($fileFullPath)) {
                            // Display text-based file content
                            echo '<pre class="file-preview">' . htmlspecialchars(file_get_contents($fileFullPath)) . '</pre>';
                        } elseif (in_array($fileExtension, $imageExtensions)) {
                            // Display image file
                            echo '<img src="' . htmlspecialchars($fileFullPath) . '" style="max-width: 100%;" alt="' . htmlspecialchars($file) . '">';
                        } elseif ($fileExtension === 'pdf' && is_readable($fileFullPath)) {
                            // Display PDF file using an object tag
                            echo '<object class="pdf-viewer" data="' . htmlspecialchars($fileFullPath) . '" type="application/pdf"></object>';
                        } else {
                            echo '<p>Cannot preview this file.</p>';
                            
                        }
                    } else {
                        echo '<p>Cannot view contents of the file.</p>';
                    }
                }
            } else {
                echo '<p>Path not found.</p>';
            }
        } else {
            echo '<p>No path specified.</p>';
        }
        ?>
        <p><a href="list_folders.php">Back to the list of folders</a></p>
     
     <div style="padding-top: 10px;">
            <p><button onclick="goBack()">Back</button></p>
    </div>
    
    <script>
    function goBack() {
        window.history.go(-1);
    }
</script>
</div>
</body>
</html>

