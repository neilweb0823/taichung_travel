<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>台中旅遊趣[{{ $spot->name }}]</title>
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
                            <li class="nav-item"><a class="nav-link-custom" href="/front/my_favorite">我的景點</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- 主要內容區 -->
    <main class="container my-4">
        <div class="backtolist my-3">
            <a href="/front/travel_list">back</a>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <img class="img-thumbnail" src="{{ $spot->image }}" alt="">
            </div>
            <div class="col-12 col-md-6">
                <div class="detail_textarea">
                    <h2>{{ $spot->name }}</h2>
                    <h5>{{ $spot->summary }}
                    </h5>
                    <p>{{ $spot->description }}
                    </p>
                    <p><strong>分類：</strong>{{ $spot->category }}</p>
                    <p><strong>地區：</strong>{{ $spot->district }}</p>
                    <p><span>電話：</span>{{ $spot->phone }}</p>
                    <p><span>地址：</span>{{ $spot->address }}</p>
                    <form id="favoriteForm">
                        @csrf

                        <input type="hidden" name="spotId" value="{{ $spot->id }}">

                        <button type="submit" class="btn btn-success">
                            收 藏 景 點 +
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </main>
    <div class="modal fade" id="favoriteModal" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">
                        收藏景點
                    </h5>

                    <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>
                </div>

                <div class="modal-body text-center">

                    <i class="bi bi-heart-fill text-danger fs-1"></i>

                    <p id="favoriteMessage" class="mt-3 mb-0">
                    </p>

                </div>

                <div class="modal-footer justify-content-center">

                    <button type="button"
                        class="btn btn-success"
                        data-bs-dismiss="modal">
                        確定
                    </button>

                </div>

            </div>

        </div>

    </div>

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
                <a href="/front/my_favorite">我的景點</a>
            </div>

            <hr>

            <p class="mb-0">
                © 2026 台中慢遊趣 All Rights Reserved.
            </p>

        </div>
    </footer>
    <script src="/js/jquery-4.0.0.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script>
        $('#favoriteForm').submit(function(e) {

            e.preventDefault();

            $.ajax({

                url: '/front/favorites/store',

                type: 'POST',

                data: $(this).serialize(),

                success: function(response) {

                    $('#favoriteMessage').text(response.message);

                    $('#favoriteModal').modal('show');

                },

                error: function(xhr) {

                    alert('收藏失敗，請稍後再試');

                }

            });

        });
    </script>
</body>

</html>