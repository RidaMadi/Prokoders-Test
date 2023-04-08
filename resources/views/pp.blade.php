<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        #popup-builder-container {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
        }

        #popup-builder-container label {
            display: block;
            margin-bottom: 10px;
        }

        #popup-builder-container textarea {
            width: 100%;
            height: 10%;
            margin-bottom: 10px;
        }
    </style>
</head>
<body style="height: 20000px">
<div id="popup-builder-container">
    <h2>Popup Builder</h2>
    <form method="POST" action="{{ route('popups.store') }}">
        @csrf
        <div>
            <label for="type">Popup Type:</label>
            <select name="type" id="type">
                <option value="full-screen-overlay">Full Screen Overlay</option>
                <option value="slide-in-popup">Slide In Popup</option>
                <option value="exit-intent-popup">Exit Intent Popup</option>
            </select>
        </div>
        <div>
            <label for="content">Popup Content:</label>
            <textarea name="content" id="content"></textarea>
        </div>
        <div>
            <label for="layout">Popup Layout:</label>
            <textarea name="layout" id="layout"></textarea>
        </div>
        <div>
            <label for="styling">Popup Styling:</label>
            <textarea name="styling" id="styling"></textarea>
        </div>
        <div>
            <label for="form">Popup Form:</label>
            <textarea name="form" id="form"></textarea>
        </div>
        <div>
            <label for="button">Popup Button:</label>
            <textarea name="button" id="button"></textarea>
        </div>
        <button type="submit">Create Popup</button>
    </form>
</div>
<script>
    const popupBuilderContainer = document.getElementById('popup-builder-container');

    popupBuilderContainer.addEventListener('submit', (event) => {
        event.preventDefault();

        const formData = new FormData(event.target);

        fetch(event.target.action, {
            method: event.target.method,
            body: formData
        }).then(response => {
            if (response.ok) {
                // Popup created successfully
                popupBuilderContainer.style.display = 'none';
            } else {
                // Error creating popup
                console.log(response.statusText);
            }
        }).catch(error => {
            console.log(error);
        });
    });
</script>
</body>
</html>
