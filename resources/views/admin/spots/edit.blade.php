<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>編輯景點</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-4">

        <h1 class="mb-4">編輯景點</h1>

        <form method="POST" action="/admin/spots/{{ $spot->id }}">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">景點名稱</label>
                <input type="text" name="name" class="form-control" value="{{ $spot->name }}">
            </div>

            <div class="mb-3">
                <label class="form-label">副標題</label>
                <input type="text" name="subtitle" class="form-control" value="{{ $spot->subtitle }}">
            </div>

            <div class="mb-3">
                <label class="form-label">摘要</label>
                <textarea name="summary" class="form-control">{{ $spot->summary }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">詳細介紹</label>
                <textarea name="description" class="form-control" rows="5">
                {{ $spot->description }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">分類</label>
                <input type="text" name="category" class="form-control" value="{{ $spot->category }}">
            </div>

            <div class="mb-3">
                <label class="form-label">地區</label>
                <input type="text" name="district" class="form-control" value="{{ $spot->district }}">
            </div>

            <div class="mb-3">
                <label class="form-label">電話</label>
                <input type="text" name="phone" class="form-control" value="{{ $spot->phone }}">
            </div>

            <div class="mb-3">
                <label class="form-label">地址</label>
                <input type="text" name="address" class="form-control" value="{{ $spot->address }}">
            </div>

            <div class="mb-3">
                <label class="form-label">圖片路徑</label>
                <input type="text" name="image" class="form-control" value="{{ $spot->image }}">
            </div>

            <button type="submit" class="btn btn-success">
                儲存編輯
            </button>

            <a href="/admin/spots" class="btn btn-secondary">
                返回
            </a>

        </form>

    </div>

</body>

</html>