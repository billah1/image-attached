<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Combiner</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            max-width: 600px;
            width: 100%;
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
            font-size: 28px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 600;
        }
        input[type="url"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        input[type="url"]:focus {
            outline: none;
            border-color: #667eea;
        }
        .btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .btn:hover {
            transform: translateY(-2px);
        }
        .example {
            margin-top: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            font-size: 12px;
        }
        .example p {
            color: #666;
            margin-bottom: 8px;
        }
        .example code {
            display: block;
            background: white;
            padding: 8px;
            border-radius: 4px;
            margin-top: 5px;
            word-break: break-all;
            color: #667eea;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🖼️ Image Combiner</h1>
        <form method="GET" action="{{ route('combine.images') }}">
            <div class="form-group">
                <label for="image1">Image 1 URL (Top)</label>
                <input type="url" id="image1" name="image1" placeholder="https://example.com/image1.jpg" required>
            </div>
            <div class="form-group">
                <label for="image2">Image 2 URL (Bottom)</label>
                <input type="url" id="image2" name="image2" placeholder="https://example.com/image2.jpg" required>
            </div>
            <button type="submit" class="btn">Combine Images</button>
        </form>

        <div class="example">
            <p><strong>Example URLs to test:</strong></p>
            <code>https://picsum.photos/800/400</code>
            <code>https://picsum.photos/800/500</code>
        </div>
    </div>
</body>
</html>