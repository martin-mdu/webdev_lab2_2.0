<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="lab1styles.css" />
    <title>LAB1 Admin</title>
    <link href="lab1logo.png" rel="icon" />
    <script>
        function uploadFile(event) {
            event.preventDefault(); // Prevent form from submitting the normal way

            // Create a FormData object to hold the file data
            const formData = new FormData(document.getElementById('uploadForm'));

            // Create an XMLHttpRequest object
            const xhr = new XMLHttpRequest();

            // Set up a handler for the response
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        document.getElementById('result').innerHTML = xhr.responseText;
                    } else {
                        document.getElementById('result').innerHTML = 'Error uploading file';
                    }
                }
            };

            // Open a POST request to the upload.php script
            xhr.open('POST', 'upload.php', true);

            // Send the file data
            xhr.send(formData);
        }

        function applyLatestFile() {
            // Redirect to main page after applying the latest JSON file
            window.location.href = "lab1website.php";
        }
    </script>
</head>

<body>
    <div class="top_page">
        <span id="circle">
            <a href="lab1website.php">
                <img id="picture_circle" src="lab1logo.png" />
            </a>
        </span>
    </div>
    <div>
        <p>Press the logo to go back to the main page.</p>
    </div>
    <div>
        <h1>Upload a File</h1>
        <form id="uploadForm" onsubmit="uploadFile(event)" enctype="multipart/form-data">
            <label for="fileUpload">Choose .json file:</label>
            <input type="file" id="fileUpload" name="fileUpload" accept=".json">
            <br><br>
            <input type="submit" value="Upload">
        </form>
        <br>
        <button onclick="applyLatestFile()">Apply changes</button>

    </div>

</body>

</html>