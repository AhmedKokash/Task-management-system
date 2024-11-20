<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <style>
        /* نفس التنسيقات السابقة */
        .post-meta {
            color: #666;
            margin-bottom: 20px;
        }
        .post-content {
            line-height: 1.6;
        }
        .share-buttons {
            margin: 20px 0;
        }
        .btn-twitter {
            background-color: #1DA1F2;
        }
        .btn-facebook {
            background-color: #4267B2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $post->title }}</h1>
        
        <div class="post-meta">
            تم النشر في: {{ $post->created_at->format('Y/m/d') }}
        </div>

        <div class="post-content">
            {{ $post->content }}
        </div>

        <div class="share-buttons">
            <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(request()->url()) }}" 
               target="_blank" class="btn btn-twitter">
                مشاركة على تويتر
            </a>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" 
               target="_blank" class="btn btn-facebook">
                مشاركة على فيسبوك
            </a>
        </div>

        <div style="margin-top: 20px;">
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">تعديل المقال</a>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">رجوع للقائمة</a>
            
            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" 
                        onclick="return confirm('هل أنت متأكد من حذف هذا المقال؟')">
                    حذف المقال
                </button>
            </form>
        </div>
    </div>
</body>
</html> 