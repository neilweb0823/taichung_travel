    <!DOCTYPE html>
    <html lang="zh-TW">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>景點管理</title>

        <link rel="stylesheet" href="/css/bootstrap.min.css">
    </head>

    <body>

        <div class="container mt-4">

            <h1 class="mb-4">景點管理</h1>

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>名稱</th>
                        <th>分類</th>
                        <th>地區</th>
                        <th>操作</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($spots as $spot)

                    <tr>
                        <td>{{ $spot->id }}</td>
                        <td>{{ $spot->name }}</td>
                        <td>{{ $spot->category }}</td>
                        <td>{{ $spot->district }}</td>

                        <td>
                            <a href="/admin/spots/{{ $spot->id }}/edit"
                                class="btn btn-primary">
                                修改
                            </a>
                            <form method="POST"
                                action="/admin/spots/{{ $spot->id }}"
                                style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">
                                    刪除
                                </button>

                            </form>
                        </td>
                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </body>

    </html>