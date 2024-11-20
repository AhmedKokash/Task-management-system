<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام إدارة المهام</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .task-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .add-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .task-list {
            margin-top: 20px;
        }
        .task-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #eee;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>نظام إدارة المهام</h1>
        
        <div class="task-form">
            <input type="text" class="task-input" placeholder="أدخل مهمة جديدة">
            <button class="add-btn">إضافة</button>
        </div>

        <div class="task-list">
            <div class="task-item">
                <span>مهمة تجريبية</span>
                <div>
                    <button onclick="editTask(this)">تعديل</button>
                    <button onclick="deleteTask(this)">حذف</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
