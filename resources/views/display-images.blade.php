<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Images</title>
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
            padding: 40px 20px;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 15px;
            font-size: 32px;
        }
        .message {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 30px;
            text-align: center;
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .image-section {
            margin-bottom: 30px;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
        }
        .image-section h2 {
            color: #667eea;
            margin-bottom: 15px;
            font-size: 22px;
        }
        .image-section img {
            max-width: 100%;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
            border: 3px solid white;
        }
        .api-info {
            background: #fff3cd;
            border: 1px solid #ffc107;
            padding: 15px;
            border-radius: 8px;
            margin-top: 30px;
        }
        .api-info h3 {
            color: #856404;
            margin-bottom: 10px;
        }
        .api-info code {
            background: white;
            padding: 8px 12px;
            border-radius: 5px;
            display: inline-block;
            color: #667eea;
            font-weight: 600;
        }
        .note {
            background: #e7f3ff;
            border-left: 4px solid #2196F3;
            padding: 15px;
            margin-top: 20px;
            border-radius: 5px;
            color: #1565C0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📸 Image Display</h1>
        
        @if(isset($message))
            <div class="message">
                {{ $message }}
            </div>
        @endif

        @if(isset($mergedImagePath))
            <div class="image-section">
                <h2>Combined Image (Image1 + Image2 Attached)</h2>
                <img src="{{ asset($mergedImagePath) }}" alt="Merged Image">
            </div>
            
            <div class="note">
                ✅ Image 1 এবং Image 2 একসাথে জোড়া লেগে একটা single image তৈরি হয়েছে। Image 2 টা Image 1 এর ঠিক নিচে attached আছে।
            </div>
        @endif

        <div class="api-info">
            <h3>🔗 API Endpoint</h3>
            <p>JSON response পেতে এই URL hit করুন:</p>
            <code>GET {{ url('/api/images') }}</code>
        </div>
    </div>
</body>
</html>