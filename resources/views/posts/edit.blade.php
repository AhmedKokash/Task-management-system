<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل المقال</title>
    <style>
        /* نفس التنسيقات السابقة */
    </style>
</head>
<body>
    <div class="container">
        <h1>تعديل المقال</h1>

        <form action="{{ route('posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">عنوان المقال</label>
                <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required>
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">محتوى المقال</label>
                <textarea id="content" name="content" required>{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">تحديث المقال</button>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">رجوع</a>
            </div>
        </form>
    </div>
</body>
</html> 