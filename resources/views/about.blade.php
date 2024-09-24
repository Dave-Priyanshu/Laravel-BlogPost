{{-- resources/views/about.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.0/themes/prism.css">
    <style>
        body {
            background-color: #1e1e1e; /* Background color */
            color: #d4d4d4; /* Text color */
            font-family: 'Courier New', Courier, monospace; /* Monospace font */
            margin: 0;
            padding: 20px;
            text-align: center; /* Center text */
        }
        h1, p {
            margin: 10px 0; /* Consistent margins */
        }
        .editor {
            background-color: #252526; /* Editor background */
            border: 1px solid #444; /* Editor border */
            border-radius: 5px;
            padding: 20px; /* Padding inside editor */
            height: 300px; /* Height of editor */
            overflow-y: auto; /* Scrollable content */
            margin: 20px 0; /* Space above and below */
            text-align: left; /* Align text to the left */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5); /* Subtle shadow for depth */
        }
        pre {
            margin: 0; /* Remove default margin */
            overflow: auto; /* Allow scrolling */
            padding: 10px; /* Padding for the preformatted text */
            white-space: pre; /* Preserve whitespace */
        }
        code {
            font-size: 14px; /* Font size of code */
        }
    </style>
</head>
<body>
    <h1>About Us</h1>
    <p>This page contains information about our application.</p>
    <div class="editor">
        <x-code-block :code="'// About Us Controller Logic
        Route::get(\"/about\", function () {
            return view(\"about\");
        });'" />
    </div>
    
    <p>Learn more about what we do!</p>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.0/prism.js"></script>
</body>
</html>
