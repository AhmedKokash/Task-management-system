<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>نظام إدارة المقالات</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .post-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
        }
        .post-title {
            font-size: 1.5em;
            margin-bottom: 10px;
            color: #333;
        }
        .post-content {
            color: #666;
            margin-bottom: 15px;
        }
        .btn {
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
            color: white;
        }
        .btn-add {
            background-color: #4CAF50;
        }
        .btn-edit {
            background-color: #2196F3;
        }
        .btn-delete {
            background-color: #f44336;
        }
        .btn-view {
            background-color: #607D8B;
        }
        .actions {
            margin-bottom: 20px;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .alert-success {
            background-color: #dff0d8;
            border-color: #d6e9c6;
            color: #3c763d;
        }
        .search-form {
            margin-bottom: 20px;
        }
        .search-input {
            padding: 8px;
            width: 300px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-left: 10px;
        }
        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }
        .dashboard {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }
        .stat-card {
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            flex: 1;
        }
        .stat-card h3 {
            margin: 0 0 10px 0;
            color: #666;
        }
        .stat-card p {
            margin: 0;
            font-size: 24px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>نظام إدارة المقالات</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="actions">
            <a href="{{ route('posts.create') }}" class="btn btn-add">إضافة مقال جديد</a>
        </div>

        <div class="search-form">
            <form action="{{ route('posts.index') }}" method="GET">
                <input type="text" name="search" 
                       value="{{ request('search') }}" 
                       placeholder="ابحث عن مقال..."
                       class="search-input">
                <button type="submit" class="btn btn-primary">بحث</button>
            </form>
        </div>

        <div class="posts-list">
            @foreach($posts as $post)
                <div class="post-card">
                    <h2 class="post-title">{{ $post->title }}</h2>
                    <div class="post-content">
                        {{ Str::limit($post->content, 200) }}
                    </div>
                    <div class="post-actions">
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-view">عرض</a>
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-edit">تعديل</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" 
                                    onclick="return confirm('هل أنت متأكد من حذف هذا المقال؟')">
                                حذف
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach

            @if($posts->isEmpty())
                <p>لا توجد مقالات حالياً</p>
            @endif
        </div>

        <div class="pagination">
            {{ $posts->links() }}
        </div>

        <div class="dashboard">
            <div class="stat-card">
                <h3>عدد المقالات</h3>
                <p>{{ $posts->total() }}</p>
            </div>
            <div class="stat-card">
                <h3>آخر تحديث</h3>
                <p>{{ $posts->first() ? $posts->first()->updated_at->diffForHumans() : 'لا يوجد' }}</p>
            </div>
        </div>
    </div>
</body>
</html>