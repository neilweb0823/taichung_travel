<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>台中旅遊趣[景點列表頁]</title>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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

                    <img src="/images/台中旅遊趣logo.png"
                        alt="台中旅遊趣 Logo">

                </div>

                <div class="col-12 col-md-8">

                    <nav>

                        <ul class="nav justify-content-center justify-content-md-end gap-3 m-0 p-0">

                            <li class="nav-item">
                                <a class="nav-link-custom"
                                    href="/front/index">
                                    首頁
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link-custom fw-bold"
                                    href="#">
                                    景點列表
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link-custom"
                                    href="/front/my_favorite">
                                    我的景點
                                </a>
                            </li>

                        </ul>

                    </nav>

                </div>

            </div>

        </div>

    </header>


    <!-- 主要內容區 -->
    <main class="container">

        <div class="display-5 fw-500 text-center bg-danger bg-opacity-50 rounded-3 border p-3 mt-3">
            景點列表
        </div>


        <!-- ==================== 查詢區 ==================== -->

        <div class="row mt-4 mb-3">

            <!-- 關鍵字搜尋 -->
            <div class="col-12 col-md-8 mx-auto mb-3">

                <div class="input-group">

                    <span class="input-group-text">
                        <i class="bi bi-search"></i>
                    </span>

                    <input
                        type="text"
                        id="searchInput"
                        class="form-control"
                        placeholder="請輸入景點名稱">

                </div>

            </div>


            <!-- 地區篩選 -->
            <div class="col-12 col-md-4 mx-auto mb-3">

                <select id="districtFilter" class="form-select">

                    <option value="">全部地區</option>

                    @foreach($districts as $district)

                    <option value="{{ $district }}">
                        {{ $district }}
                    </option>

                    @endforeach

                </select>
            </div>


            <!-- 排序 -->
            <div class="col-12 col-md-4 mx-auto">

                <select id="sortSelect" class="form-select">

                    <option value="">預設排序</option>

                    <option value="id-asc">
                        名稱：A → Z
                    </option>

                    <option value="id-desc">
                        名稱：Z → A
                    </option>

                    <option value="district-asc">
                        地區：A → Z
                    </option>

                    <option value="district-desc">
                        地區：Z → A
                    </option>

                    <option value="category-asc">
                        分類：A → Z
                    </option>

                    <option value="category-desc">
                        分類：Z → A
                    </option>

                </select>

            </div>

        </div>


        <!-- ==================== 景點列表 ==================== -->

        <div class="row mt-3" id="spotList">

            @foreach($spots as $data)

            <div
                class="spot-card col-12 col-md-6 col-lg-4 col-xl-3"
                data-id="{{ $data->id }}"
                data-name="{{ $data->name }}"
                data-category="{{ $data->category }}"
                data-district="{{ $data->district }}">

                <div class="card mb-3">

                    <div class="card-img">

                        <img
                            class="img-thumbnail"
                            src="{{ $data->image }}"
                            alt="{{ $data->name }}">

                    </div>


                    <div class="card-header h3">

                        {{ $data->name }}

                    </div>


                    <div class="card-body">

                        <p class="h5">
                            {{ $data->subtitle }}
                        </p>

                        <hr>

                        <p>
                            {{ $data->summary }}
                        </p>


                        <div class="row">

                            <div class="col-6">

                                <p>
                                    <span>分類：</span>
                                    {{ $data->category }}
                                </p>

                                <p>
                                    <span>地區：</span>
                                    {{ $data->district }}
                                </p>

                            </div>


                            <div class="col-6 seemore d-flex justify-content-center align-self-center">

                                <a href="/front/travel_list/{{ $data->id }}">
                                    Go
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            @endforeach

        </div>


        <!-- 查無資料 -->
        <div
            id="noResults"
            class="text-center mt-4"
            style="display: none;">

            <p class="text-muted">
                查無符合條件的景點
            </p>

        </div>


        <!-- ==================== 分頁 ==================== -->

        <div class="row mt-4">

            <div class="col-12">

                <nav aria-label="景點列表分頁">

                    <ul
                        class="pagination justify-content-center"
                        id="pagination">
                    </ul>

                </nav>


                <div class="text-center mt-2">

                    <span id="pageInfo"></span>

                </div>

            </div>

        </div>

    </main>


    <!-- ==================== Footer ==================== -->

    <footer class="footer mt-5">

        <div class="container text-center py-4">

            <h4>
                台中慢遊趣
            </h4>

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

                <a href="/front/index">
                    首頁
                </a>

                <a href="#">
                    景點列表
                </a>

                <a href="/front/my_favorite">
                    我的景點
                </a>

            </div>

            <hr>

            <p class="mb-0">
                © 2026 台中慢遊趣 All Rights Reserved.
            </p>

        </div>

    </footer>


    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery-4.0.0.js"></script>


    <script>
        // ========================================
        // 分頁設定
        // ========================================

        let currentPage = 1;

        // 每頁顯示 4 筆
        let itemsPerPage = 4;


        // ========================================
        // 取得符合搜尋條件的景點
        // ========================================

        function getFilteredCards() {

            let keyword = $("#searchInput")
                .val()
                .trim()
                .toLowerCase();

            let district = $("#districtFilter").val();

            let cards = [];

            $("#spotList .spot-card").each(function() {

                let spotName = $(this)
                    .data("name")
                    .toString()
                    .toLowerCase();

                let spotDistrict = $(this)
                    .data("district")
                    .toString();

                // 關鍵字是否符合
                let keywordMatch =
                    spotName.includes(keyword);

                // 地區是否符合
                let districtMatch =
                    district === "" ||
                    spotDistrict === district;


                // 兩個條件都符合
                if (keywordMatch && districtMatch) {

                    cards.push(this);

                }

            });

            return cards;

        }


        // ========================================
        // 排序
        // ========================================

        function sortCards(cards) {

            let sortType = $("#sortSelect").val();


            cards.sort(function(a, b) {

                let nameA = $(a)
                    .data("name")
                    .toString();

                let nameB = $(b)
                    .data("name")
                    .toString();


                let districtA = $(a)
                    .data("district")
                    .toString();

                let districtB = $(b)
                    .data("district")
                    .toString();


                let categoryA = $(a)
                    .data("category")
                    .toString();

                let categoryB = $(b)
                    .data("category")
                    .toString();


                // 名稱 A → Z
                if (sortType === "name-asc") {

                    return nameA.localeCompare(
                        nameB,
                        "zh-Hant"
                    );

                }


                // 名稱 Z → A
                if (sortType === "name-desc") {

                    return nameB.localeCompare(
                        nameA,
                        "zh-Hant"
                    );

                }


                // 地區 A → Z
                if (sortType === "district-asc") {

                    return districtA.localeCompare(
                        districtB,
                        "zh-Hant"
                    );

                }


                // 地區 Z → A
                if (sortType === "district-desc") {

                    return districtB.localeCompare(
                        districtA,
                        "zh-Hant"
                    );

                }


                // 分類 A → Z
                if (sortType === "category-asc") {

                    return categoryA.localeCompare(
                        categoryB,
                        "zh-Hant"
                    );

                }


                // 分類 Z → A
                if (sortType === "category-desc") {

                    return categoryB.localeCompare(
                        categoryA,
                        "zh-Hant"
                    );

                }


                // 預設排序
                return 0;

            });


            return cards;

        }


        // ========================================
        // 顯示景點
        // ========================================

        function renderSpots() {

            // 取得符合搜尋條件的景點
            let cards = getFilteredCards();


            // 排序
            cards = sortCards(cards);


            // 所有卡片先隱藏
            $("#spotList .spot-card").hide();


            // 總資料數
            let totalItems = cards.length;


            // 總頁數
            let totalPages =
                Math.ceil(totalItems / itemsPerPage);


            // 沒有資料
            if (totalItems === 0) {

                $("#noResults").show();

                $("#pagination").empty();

                $("#pageInfo").text("");

                return;

            }


            // 有資料
            $("#noResults").hide();


            // 如果目前頁數超過總頁數
            if (currentPage > totalPages) {

                currentPage = totalPages;

            }


            // 起始位置
            let start =
                (currentPage - 1) * itemsPerPage;


            // 結束位置
            let end =
                start + itemsPerPage;


            // 顯示目前頁面的景點
            cards
                .slice(start, end)
                .forEach(function(card) {

                    $(card).show();

                });


            // 更新分頁
            renderPagination(totalPages);

        }


        // ========================================
        // 建立分頁按鈕
        // ========================================

        function renderPagination(totalPages) {

            $("#pagination").empty();


            // 只有一頁時不用顯示頁碼
            if (totalPages <= 1) {

                $("#pageInfo").text(
                    "共 " +
                    $("#spotList .spot-card").length +
                    " 筆景點"
                );

                return;

            }


            // 上一頁
            let previousDisabled =
                currentPage === 1 ? "disabled" : "";


            $("#pagination").append(`

                <li class="page-item ${previousDisabled}">

                    <a
                        class="page-link"
                        href="#"
                        data-page="${currentPage - 1}">

                        上一頁

                    </a>

                </li>

            `);


            // 頁碼
            for (
                let i = 1; i <= totalPages; i++
            ) {

                let active =
                    i === currentPage ?
                    "active" :
                    "";


                $("#pagination").append(`

                    <li class="page-item ${active}">

                        <a
                            class="page-link"
                            href="#"
                            data-page="${i}">

                            ${i}

                        </a>

                    </li>

                `);

            }


            // 下一頁
            let nextDisabled =
                currentPage === totalPages ?
                "disabled" :
                "";


            $("#pagination").append(`

                <li class="page-item ${nextDisabled}">

                    <a
                        class="page-link"
                        href="#"
                        data-page="${currentPage + 1}">

                        下一頁

                    </a>

                </li>

            `);


            // 頁面資訊
            $("#pageInfo").text(

                "第 " +
                currentPage +
                " / " +
                totalPages +
                " 頁"

            );

        }


        // ========================================
        // 點擊分頁
        // ========================================

        $(document).on(
            "click",
            "#pagination .page-link",
            function(e) {

                e.preventDefault();


                let page =
                    Number(
                        $(this).data("page")
                    );


                let cards =
                    getFilteredCards();


                let totalPages =
                    Math.ceil(
                        cards.length /
                        itemsPerPage
                    );


                // 防止超出頁數
                if (
                    page < 1 ||
                    page > totalPages
                ) {

                    return;

                }


                currentPage = page;


                renderSpots();


                // 回到景點列表上方
                $("html, body").animate({
                        scrollTop: $("#spotList").offset().top - 100
                    },
                    300
                );

            }
        );


        // ========================================
        // 關鍵字搜尋
        // ========================================

        $("#searchInput").on(
            "input",
            function() {

                // 搜尋後回到第一頁
                currentPage = 1;

                renderSpots();

            }
        );


        // ========================================
        // 地區篩選
        // ========================================

        $("#districtFilter").on(
            "change",
            function() {

                // 篩選後回到第一頁
                currentPage = 1;

                renderSpots();

            }
        );


        // ========================================
        // 排序
        // ========================================

        $("#sortSelect").on(
            "change",
            function() {

                // 排序後回到第一頁
                currentPage = 1;

                renderSpots();

            }
        );


        // ========================================
        // 網頁第一次載入
        // ========================================

        $(document).ready(function() {

            renderSpots();

        });
    </script>

</body>

</html>
```