{{-- resources/views/editor.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VS Code Editor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.0/themes/prism.css">
    <style>
        body {
            background-color: #1e1e1e; /* Editor background */
            color: #d4d4d4; /* Default text color */
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
            /* height: 400px; Height of editor */
            overflow-y: auto; /* Scrollable content */
            margin: 20px 0; /* Space above and below */
            display: flex; /* Flexbox for line numbers */
        }
        .line-numbers {
            padding-right: 10px; /* Space between line numbers and code */
            text-align: right; /* Align numbers to the right */
            user-select: none; /* Prevent text selection */
        }
        .line-numbers span {
            display: block; /* Each number on a new line */
            color: #888; /* Color for line numbers */
        }
        .code {
            flex: 1; /* Take remaining space */
            outline: none; /* Remove outline on focus */
            white-space: pre; /* Preserve whitespace */
            font-size: 14px; /* Font size of code */
            color: #d4d4d4; /* Default text color */
        }
        .code[contenteditable="true"]:focus {
            /* background-color: #333; Darker background on focus */
        }

        /* Custom syntax highlighting styles */
        .token.function {
            color: #ffcc00; /* Functions */
        }
        .token.class-name {
            color: #f92672; /* Classes */
        }
        .token.variable {
            color: #a6e22e; /* Variables */
        }
        .token.string {
            color: #e6db74; /* Strings */
        }
        .token.comment {
            color: #75715e; /* Comments */
        }
    </style>
</head>
<body>
    <h1>Code Editor</h1>
    <p>This is a simple code editor interface inspired by VS Code.</p>
    <div class="editor">
        <div class="line-numbers" id="line-numbers"></div>
        <pre class="code" contenteditable="true" id="code-area" oninput="updateLineNumbers()">
            <code class="language-php">
Route::controller(UserController::class)->group(function() {
    Route::get('/allusers', 'showUsers')->name('home');
    Route::get('/allusers/{id}', 'singleUser')->name('view.singleUser');
    Route::post('/addUser', 'addUser')->name('addUser');
    Route::post('/updateUser/{id}', 'updateUser')->name('update.user');
    Route::get('/updateUserPage/{id}', 'updateUserPage')->name('updateUser.page');
    Route::get('/deleteUser/{id}', 'deleteUser')->name('delete.user');
});
            </code>
        </pre>
    </div>
    <p>You can edit your code here!</p>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.0/prism.js"></script>
    <script>
        function updateLineNumbers() {
            const codeArea = document.getElementById('code-area');
            const lineNumbers = document.getElementById('line-numbers');
            const lines = codeArea.innerText.split('\n').length;

            // Update line numbers
            lineNumbers.innerHTML = '';
            for (let i = 1; i <= lines; i++) {
                lineNumbers.innerHTML += `<span>${i}</span>`;
            }

            // Reapply Prism syntax highlighting
            Prism.highlightElement(codeArea.querySelector('code'));
        }

        // Initialize line numbers on load
        document.addEventListener('DOMContentLoaded', updateLineNumbers);
    </script>
</body>
</html>


{{-- working code editor /resources/views/editor.blade.php --}}
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VS Code Editor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.0/themes/prism.css">
    <style>
        body {
            background-color: #1e1e1e; /* Editor background */
            color: #d4d4d4; /* Default text color */
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
            height: 400px; /* Height of editor */
            overflow-y: auto; /* Scrollable content */
            margin: 20px 0; /* Space above and below */
            text-align: left; /* Align text to the left */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5); /* Subtle shadow for depth */
            display: flex; /* Flexbox for line numbers */
        }
        .line-numbers {
            padding-right: 10px; /* Space between line numbers and code */
            text-align: right; /* Align numbers to the right */
            user-select: none; /* Prevent text selection */
        }
        .line-numbers span {
            display: block; /* Each number on a new line */
            color: #888; /* Color for line numbers */
        }
        .code {
            flex: 1; /* Take remaining space */
            outline: none; /* Remove outline on focus */
        }
        .code[contenteditable="true"] {
            white-space: pre; /* Preserve whitespace */
            font-size: 14px; /* Font size of code */
            color: #d4d4d4; /* Default text color */
        }
    </style>
</head>
<body>
    <h1>Code Editor</h1>
    <p>This is a simple code editor interface inspired by VS Code.</p>
    <div class="editor">
        <div class="line-numbers">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>5</span>
            <span>6</span>
            <span>7</span>
            <span>8</span>
            <span>9</span>
            <span>10</span>
            <span>11</span>
            <span>12</span>
            <span>13</span>
            <span>14</span>
            <span>15</span>
        </div>
        <div class="code" contenteditable="true">
            Route::controller(UserController::class)->group(function() {
                Route::get('/allusers', 'showUsers')->name('home');
                Route::get('/allusers/{id}', 'singleUser')->name('view.singleUser');
                Route::post('/addUser', 'addUser')->name('addUser');
                Route::post('/updateUser/{id}', 'updateUser')->name('update.user');
                Route::get('/updateUserPage/{id}', 'updateUserPage')->name('updateUser.page');
                Route::get('/deleteUser/{id}', 'deleteUser')->name('delete.user');
            });
        </div>
    </div>
    <p>You can edit your code here!</p>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.0/prism.js"></script>
</body>
</html> --}}



{{-- resources/views/editor.blade.php --}}
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VS Code Editor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.0/themes/prism.css">
    <style>
        body {
            background-color: #1e1e1e; /* Editor background */
            color: #d4d4d4; /* Default text color */
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
            height: 400px; /* Height of editor */
            overflow-y: auto; /* Scrollable content */
            margin: 20px 0; /* Space above and below */
            text-align: left; /* Align text to the left */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5); /* Subtle shadow for depth */
            display: flex; /* Flexbox for line numbers */
        }
        .line-numbers {
            padding-right: 10px; /* Space between line numbers and code */
            text-align: right; /* Align numbers to the right */
            user-select: none; /* Prevent text selection */
        }
        .line-numbers span {
            display: block; /* Each number on a new line */
            color: #888; /* Color for line numbers */
        }
        .code {
            flex: 1; /* Take remaining space */
        }
        pre {
            margin: 0; /* Remove default margin */
            overflow: auto; /* Allow scrolling */
            padding: 0; /* No padding */
            white-space: pre; /* Preserve whitespace */
        }
        code {
            font-size: 14px; /* Font size of code */
        }
    </style>
</head>
<body>
    <h1>Code Editor</h1>
    <p>This is a simple code editor interface inspired by VS Code.</p>
    <div class="editor">
        <div class="line-numbers">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>5</span>
            <span>6</span>
            <span>7</span>
            <span>8</span>
            <span>9</span>
            <span>10</span>
            <span>11</span>
            <span>12</span>
            <span>13</span>
            <span>14</span>
            <span>15</span>
        </div>
        <div class="code">
            <pre><code class="language-php">
Route::controller(UserController::class)->group(function() {
    Route::get('/allusers', 'showUsers')->name('home');
    Route::get('/allusers/{id}', 'singleUser')->name('view.singleUser');
    Route::post('/addUser', 'addUser')->name('addUser');
    Route::post('/updateUser/{id}', 'updateUser')->name('update.user');
    Route::get('/updateUserPage/{id}', 'updateUserPage')->name('updateUser.page');
    Route::get('/deleteUser/{id}', 'deleteUser')->name('delete.user');
});
            </code></pre>
        </div>
    </div>
    <p>You can edit your code here!</p>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.0/prism.js"></script>
</body>
</html> --}}



{{-- resources/views/editor.blade.php --}}
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VS Code Editor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.0/themes/prism.css">
    <style>
        /* Your existing styles */
        body {
            background-color: #1e1e1e; /* Editor background */
            color: #d4d4d4; /* Default text color */
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
            height: 400px; /* Height of editor */
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
    <h1>Code Editor</h1>
    <p>This is a simple code editor interface inspired by VS Code.</p>

    <div class="editor">
        <x-code-block :code="
            'Route::controller(UserController::class)->group(function() {
                Route::get(\'/allusers\', \'showUsers\')->name(\'home\');
                Route::get(\'/allusers/{id}\', \'singleUser\')->name(\'view.singleUser\');
                Route::post(\'/addUser\', \'addUser\')->name(\'addUser\');
                Route::post(\'/updateUser/{id}\', \'updateUser\')->name(\'update.user\');
                Route::get(\'/updateUserPage/{id}\', \'updateUserPage\')->name(\'updateUser.page\');
                Route::get(\'/deleteUser/{id}\', \'deleteUser\')->name(\'delete.user\');
            });'
        " />
    </div>
    
    

    <p>You can edit your code here!</p>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.0/prism.js"></script>
</body>
</html>
 --}}


{{-- resources/views/editor.blade.php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VS Code Editor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.0/themes/prism.css">
    <style>
        body {
            background-color: #1e1e1e; /* Editor background */
            color: #d4d4d4; /* Default text color */
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
            height: 400px; /* Height of editor */
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
    <h1>Code Editor</h1>
    <p>This is a simple code editor interface inspired by VS Code.</p> <!-- Text above -->
    <div class="editor">
        <pre><code class="language-php">
Route::controller(UserController::class)->group(function() {
    Route::get('/allusers', 'showUsers')->name('home');
    Route::get('/allusers/{id}', 'singleUser')->name('view.singleUser');
    Route::post('/addUser', 'addUser')->name('addUser');
    Route::post('/updateUser/{id}', 'updateUser')->name('update.user');
    Route::get('/updateUserPage/{id}', 'updateUserPage')->name('updateUser.page');
    Route::get('/deleteUser/{id}', 'deleteUser')->name('delete.user');
});
        </code></pre>
    </div>
    <p>You can edit your code here!</p> <!-- Text below -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.0/prism.js"></script>
</body>
</html> --}}
