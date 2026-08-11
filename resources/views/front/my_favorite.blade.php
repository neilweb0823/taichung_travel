<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>台中旅遊趣[我的景點]</title>
    <!-- 建議引入 Bootstrap Icons 以便使用搜尋圖示 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/mycss01.css">
    <link rel="stylesheet" href="/css/travel_taichung.css">
</head>

<body>
    <!-- 頁首導覽 -->
    <header class="bg-success bg-opacity-25 py-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="logo-img col-12 col-md-4 text-center text-md-start mb-2 mb-md-0">
                    <img src="/images/台中旅遊趣logo.png" alt="台中旅遊趣 Logo">
                </div>

                <div class="col-12 col-md-8">
                    <nav>
                        <ul class="nav justify-content-center justify-content-md-end gap-3 m-0 p-0">
                            <li class="nav-item"><a class="nav-link-custom" href="/front/index">首頁</a></li>
                            <li class="nav-item"><a class="nav-link-custom" href="/front/travel_list">景點列表</a></li>
                            <li class="nav-item"><a class="nav-link-custom fw-bold" href="#">我的景點</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- 主要內容區 -->
    <main class="container">
        <div class="display-5 fw-500 text-center bg-danger bg-opacity-50 rounded-3 border p-3 mt-3">我的景點</div>
        <div class="table-responsive mt-4">
            <table class="table table-striped table-hover align-middle text-center">

                <thead class="table-success">
                    <tr>
                        <th>圖片</th>
                        <th>名稱</th>
                        <th>地區</th>
                        <th>分類</th>
                        <th>詳細內容</th>
                        <th>刪除</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($favorites as $favorite)

                    <tr>

                        <td>
                            <img src="{{ $favorite->spot->image }}"
                                class="img-thumbnail"
                                style="width:120px;height:80px;object-fit:cover;">
                        </td>

                        <td>
                            {{ $favorite->spot->name }}
                        </td>

                        <td>
                            {{ $favorite->spot->district }}
                        </td>

                        <td>
                            {{ $favorite->spot->category }}
                        </td>

                        <td>
                            <a href="/front/travel_list/{{ $favorite->spot->id }}"
                                class="btn btn-primary btn-sm">
                                查看
                            </a>
                        </td>

                        <td>
                            <form action="/front/favorites/{{ $favorite->id }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('確定要取消收藏嗎？')">
                                    刪除
                                </button>
                            </form>
                        </td>

                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </main>

    <footer class="footer mt-5">
        <div class="container text-center py-4">

            <h4>台中慢遊趣</h4>

            <p class="mb-3">
                探索台中的美好，發現每一段旅程的驚喜。
            </p>

            <p class="mb-1">
                📧 travel@example.com
            </p>

            <p>
                📞 (04) 1234-5678
            </p>

            <div class="footer-link my-3">
                <a href="/front/index">首頁</a>
                <a href="/front/travel_list">景點列表</a>
                <a href="#">我的景點</a>
            </div>

            <hr>

            <p class="mb-0">
                © 2026 台中慢遊趣 All Rights Reserved.
            </p>

        </div>
    </footer>
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>