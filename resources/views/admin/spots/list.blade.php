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

        <!-- ==================== 標題 ==================== -->

        <h1 class="mb-4">景點管理</h1>


        <!-- ==================== 新增按鈕 ==================== -->

        <a href="/admin/spots/create"
            class="btn btn-success btn-lg fs-6 mb-4">

            ＋ 新增景點

        </a>


        <!-- ==================== API 查詢區 ==================== -->

        <div class="card mb-4">

            <div class="card-body">

                <h5 class="card-title">
                    景點資料查詢
                </h5>


                <div class="row">

                    <!-- 關鍵字 -->

                    <div class="col-md-8 mb-2">

                        <input
                            type="text"
                            id="searchInput"
                            class="form-control"
                            placeholder="請輸入景點名稱">

                    </div>


                    <!-- 查詢按鈕 -->

                    <div class="col-md-2 mb-2">

                        <button
                            type="button"
                            id="searchBtn"
                            class="btn btn-primary w-100">

                            查詢

                        </button>

                    </div>


                    <!-- 顯示全部 -->

                    <div class="col-md-2 mb-2">

                        <button
                            type="button"
                            id="resetBtn"
                            class="btn btn-secondary w-100">

                            顯示全部

                        </button>

                    </div>

                </div>


                <!-- API 狀態訊息 -->

                <div
                    id="apiMessage"
                    class="mt-3"
                    style="display: none;">

                </div>

            </div>

        </div>


        <!-- ==================== 景點統計圖表 ==================== -->

        <div class="card mb-4">

            <div class="card-body">

                <h5 class="card-title mb-3">
                    景點行政區統計
                </h5>

                <div style="height: 400px;">
                    <canvas id="districtChart"></canvas>
                </div>

            </div>

        </div>

        <!-- ==================== 景點資料表格 ==================== -->

        <table class="table table-bordered table-hover">

            <thead class="table-light">

                <tr>

                    <th>ID</th>

                    <th>名稱</th>

                    <th>分類</th>

                    <th>地區</th>

                    <th>操作</th>

                </tr>

            </thead>


            <tbody id="spotTableBody">

                <!-- API 資料會放在這裡 -->

            </tbody>

        </table>


        <!-- ==================== 查無資料 ==================== -->

        <div
            id="noResults"
            class="text-center text-muted mt-3"
            style="display: none;">

            查無符合條件的景點

        </div>

    </div>


    <!-- Bootstrap -->

    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- ==================== API ==================== -->

    <script>
        // ========================================
        // 儲存 API 回傳的所有景點
        // ========================================

        let allSpots = [];
        let districtChart = null;
        // ========================================
        // 建立行政區景點統計圖
        // ========================================

        function renderDistrictChart(spots) {

            // 統計每個行政區的景點數量

            const districtCount = {};

            spots.forEach(function(spot) {

                const district = spot.district || "未分類";

                if (districtCount[district]) {

                    districtCount[district]++;

                } else {

                    districtCount[district] = 1;

                }

            });


            // 行政區名稱

            const labels = Object.keys(districtCount);


            // 景點數量

            const data = Object.values(districtCount);


            // 取得 canvas

            const canvas =
                document.getElementById("districtChart");


            // 如果之前已經有圖表
            // 先刪除，避免重新搜尋時重複建立

            if (districtChart) {

                districtChart.destroy();

            }


            // 建立 Chart.js

            districtChart = new Chart(canvas, {

                type: "bar",

                data: {

                    labels: labels,

                    datasets: [{

                        label: "景點數量",

                        data: data,

                        borderWidth: 1

                    }]

                },

                options: {

                    responsive: true,

                    maintainAspectRatio: false,

                    scales: {

                        y: {

                            beginAtZero: true,

                            ticks: {

                                stepSize: 1

                            },

                            title: {

                                display: true,

                                text: "景點數量"

                            }

                        },

                        x: {

                            title: {

                                display: true,

                                text: "行政區"

                            }

                        }

                    }

                }

            });

        }

        // ========================================
        // 顯示 API 訊息
        // ========================================

        function showMessage(message, type = "success") {

            const messageBox =
                document.getElementById("apiMessage");

            messageBox.className =
                "alert alert-" + type;

            messageBox.textContent = message;

            messageBox.style.display = "block";

        }


        // ========================================
        // 顯示景點資料
        // ========================================

        function renderSpots(spots) {

            const tbody =
                document.getElementById("spotTableBody");

            const noResults =
                document.getElementById("noResults");


            // 清空原本資料

            tbody.innerHTML = "";


            // 沒有資料

            if (spots.length === 0) {

                noResults.style.display = "block";

                return;

            }


            // 有資料

            noResults.style.display = "none";


            // 建立表格

            spots.forEach(function(spot) {

                const row =
                    document.createElement("tr");


                row.innerHTML = `

                    <td>
                        ${spot.id}
                    </td>


                    <td>
                        ${spot.name ?? ""}
                    </td>


                    <td>
                        ${spot.category ?? ""}
                    </td>


                    <td>
                        ${spot.district ?? ""}
                    </td>


                    <td>

                        <a
                            href="/admin/spots/${spot.id}/edit"
                            class="btn btn-primary">

                            修改

                        </a>


                        <button
                            type="button"
                            class="btn btn-danger"
                            onclick="deleteSpot(${spot.id})">

                            刪除

                        </button>

                    </td>

                `;


                tbody.appendChild(row);

            });

        }


        // ========================================
        // GET /api/spots
        // 取得所有景點
        // ========================================

        function getSpots() {

            showMessage(
                "正在取得景點資料...",
                "info"
            );


            fetch("/api/spots", {

                    method: "GET",

                    headers: {

                        "Accept": "application/json"

                    }

                })

                .then(function(response) {

                    // HTTP 錯誤

                    if (!response.ok) {

                        throw new Error(
                            "API 請求失敗，HTTP 狀態碼：" +
                            response.status
                        );

                    }


                    return response.json();

                })

                .then(function(result) {

                    console.log(
                        "GET /api/spots 回傳：",
                        result
                    );


                    // 檢查 API status

                    if (result.status !== "success") {

                        throw new Error(
                            result.message ||
                            "景點查詢失敗"
                        );

                    }


                    // 儲存 API 資料

                    allSpots = result.data;


                    // 顯示全部景點

                    renderSpots(allSpots);

                    // 建立行政區統計圖

                    renderDistrictChart(allSpots);

                    // 顯示成功訊息

                    showMessage(

                        result.message +
                        "，共取得 " +
                        allSpots.length +
                        " 筆資料",

                        "success"

                    );

                })


                .catch(function(error) {

                    console.error(
                        "GET API 錯誤：",
                        error
                    );


                    showMessage(

                        "景點資料取得失敗：" +
                        error.message,

                        "danger"

                    );

                });

        }


        // ========================================
        // DELETE /api/spots/{id}
        // 刪除景點
        // ========================================

        function deleteSpot(id) {

            // 確認是否刪除

            const confirmed =
                confirm("確定要刪除這個景點嗎？");


            if (!confirmed) {

                return;

            }


            console.log(
                "🔥 DELETE 景點開始，ID：",
                id
            );


            showMessage(
                "正在刪除景點...",
                "info"
            );


            fetch(`/api/spots/${id}`, {

                    method: "DELETE",

                    headers: {

                        "Accept": "application/json"

                    }

                })


                .then(function(response) {

                    console.log(
                        "🔥 DELETE HTTP Status：",
                        response.status
                    );


                    return response.json();

                })


                .then(function(result) {

                    console.log(
                        "🔥 DELETE API 回傳：",
                        result
                    );


                    // API 成功

                    if (result.status === "success") {

                        showMessage(
                            result.message,
                            "success"
                        );


                        // 重新取得景點資料
                        // 讓刪除後的列表立即更新

                        getSpots();

                    } else {

                        throw new Error(
                            result.message ||
                            "景點刪除失敗"
                        );

                    }

                })


                .catch(function(error) {

                    console.error(
                        "DELETE API 錯誤：",
                        error
                    );


                    showMessage(

                        "景點刪除失敗：" +
                        error.message,

                        "danger"

                    );

                });

        }


        // ========================================
        // 搜尋景點
        // ========================================

        function searchSpots() {

            const keyword =
                document
                .getElementById("searchInput")
                .value
                .trim()
                .toLowerCase();


            // 沒有輸入關鍵字

            if (keyword === "") {

                renderSpots(allSpots);

                showMessage(
                    "已顯示全部景點",
                    "info"
                );

                return;

            }


            // 從 API 已取得的資料搜尋

            const filteredSpots =
                allSpots.filter(function(spot) {

                    const name =
                        (spot.name || "")
                        .toLowerCase();


                    const category =
                        (spot.category || "")
                        .toLowerCase();


                    const district =
                        (spot.district || "")
                        .toLowerCase();


                    return (

                        name.includes(keyword) ||

                        category.includes(keyword) ||

                        district.includes(keyword)

                    );

                });


            // 顯示搜尋結果

            renderSpots(filteredSpots);


            showMessage(

                "查詢完成，共找到 " +
                filteredSpots.length +
                " 筆資料",

                "success"

            );

        }


        // ========================================
        // 查詢按鈕
        // ========================================

        document
            .getElementById("searchBtn")
            .addEventListener(
                "click",
                function() {

                    searchSpots();

                }
            );


        // ========================================
        // 顯示全部
        // ========================================

        document
            .getElementById("resetBtn")
            .addEventListener(
                "click",
                function() {

                    document
                        .getElementById("searchInput")
                        .value = "";


                    renderSpots(allSpots);


                    showMessage(
                        "已顯示全部景點",
                        "info"
                    );

                }
            );


        // ========================================
        // Enter 搜尋
        // ========================================

        document
            .getElementById("searchInput")
            .addEventListener(
                "keydown",
                function(event) {

                    if (event.key === "Enter") {

                        searchSpots();

                    }

                }
            );


        // ========================================
        // 網頁載入完成
        // ========================================

        document.addEventListener(
            "DOMContentLoaded",
            function() {

                getSpots();

            }
        );
    </script>

</body>

</html>