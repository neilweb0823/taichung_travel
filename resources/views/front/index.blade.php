<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>台中旅遊趣</title>
    <!-- 引入 Bootstrap Icons -->
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
                            <li class="nav-item"><a class="nav-link-custom fw-bold" href="#">首頁</a></li>
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
        <!-- 主視覺區塊 -->
        <section class="hero-banner">
            <img class="w-100 opacity-75 d-block" src="/images/湖心亭.jpg" alt="台中公園湖心亭">

            <div class="context-area d-block">
                <h1 class="h2 fw-bold mb-3">漫遊台中，遇見美好</h1>
                <p class="fw-semibold mb-2">台中擁有豐富的人文歷史、自然景觀與特色美食，是一座適合慢遊細品的城市。</p>
                <p class="fw-semibold mb-0">無論漫步草悟道、欣賞高美濕地夕陽，或走進巷弄品嚐在地小吃，都能感受到這座城市獨有的溫度與活力。</p>
            </div>

            <div class="primary-btn">
                <a class="primary-btn-link" href="/front/travel_list">開 始 探 索</a>
            </div>
        </section>
    </main>

    <footer class="footer mt-5">
        <div class="container text-center py-4">
            <h4>台中慢遊趣</h4>
            <p class="mb-3">探索台中的美好，發現每一段旅程的驚喜。</p>
            <p class="mb-1">📧 travel@example.com</p>
            <p>📞 (04) 1234-5678</p>

            <div class="footer-link my-3">
                <a href="#">首頁</a>
                <a href="/front/travel_list">景點列表</a>
                <a href="/front/my_favorite">我的景點</a>
            </div>

            <hr>

            <p class="mb-0">© 2026 台中慢遊趣 All Rights Reserved.</p>
        </div>
    </footer>

    <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>