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

        <!-- API 回應訊息 -->
        <div
            id="message"
            class="alert"
            style="display: none;">
        </div>


        <!-- 編輯表單 -->
        <form id="spotForm" data-spot-id="{{ $spot->id }}">

            <!-- 景點名稱 -->
            <div class="mb-3">

                <label class="form-label">
                    景點名稱
                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ $spot->name }}"
                    required>

            </div>


            <!-- 副標題 -->
            <div class="mb-3">

                <label class="form-label">
                    副標題
                </label>

                <input
                    type="text"
                    name="subtitle"
                    class="form-control"
                    value="{{ $spot->subtitle }}">

            </div>


            <!-- 摘要 -->
            <div class="mb-3">

                <label class="form-label">
                    摘要
                </label>

                <textarea
                    name="summary"
                    class="form-control">{{ $spot->summary }}</textarea>

            </div>


            <!-- 詳細介紹 -->
            <div class="mb-3">

                <label class="form-label">
                    詳細介紹
                </label>

                <textarea
                    name="description"
                    class="form-control"
                    rows="5">{{ $spot->description }}</textarea>

            </div>


            <!-- 分類 -->
            <div class="mb-3">

                <label class="form-label">
                    分類
                </label>

                <input
                    type="text"
                    name="category"
                    class="form-control"
                    value="{{ $spot->category }}">

            </div>


            <!-- 地區 -->
            <div class="mb-3">

                <label class="form-label">
                    地區
                </label>

                <input
                    type="text"
                    name="district"
                    class="form-control"
                    value="{{ $spot->district }}">

            </div>


            <!-- 電話 -->
            <div class="mb-3">

                <label class="form-label">
                    電話
                </label>

                <input
                    type="text"
                    name="phone"
                    class="form-control"
                    value="{{ $spot->phone }}">

            </div>


            <!-- 地址 -->
            <div class="mb-3">

                <label class="form-label">
                    地址
                </label>

                <input
                    type="text"
                    name="address"
                    class="form-control"
                    value="{{ $spot->address }}">

            </div>


            <!-- 圖片路徑 -->
            <div class="mb-3">

                <label class="form-label">
                    圖片路徑
                </label>

                <input
                    type="text"
                    name="image"
                    class="form-control"
                    value="{{ $spot->image }}">

            </div>


            <!-- 儲存 -->
            <button
                type="submit"
                id="submitBtn"
                class="btn btn-success">

                儲存編輯

            </button>


            <!-- 返回 -->
            <a
                href="/admin/spots"
                class="btn btn-secondary">

                返回

            </a>

        </form>

    </div>


    <script>
        // ========================================
        // 編輯景點 ID
        // ========================================
        const spotId = document
            .getElementById("spotForm")
            .dataset
            .spotId;
        // ========================================
        // 表單 submit
        // ========================================

        document
            .getElementById("spotForm")
            .addEventListener(
                "submit",
                async function(e) {

                    // 阻止傳統 form 提交

                    e.preventDefault();


                    const form = e.target;

                    const submitBtn =
                        document.getElementById("submitBtn");

                    const message =
                        document.getElementById("message");


                    // ========================================
                    // 取得表單資料
                    // ========================================

                    const formData =
                        new FormData(form);


                    const data =
                        Object.fromEntries(
                            formData.entries()
                        );


                    console.log(
                        "🔥 PUT 修改景點開始：",
                        data
                    );


                    console.log(
                        "🔥 修改景點 ID：",
                        spotId
                    );


                    // 防止重複送出

                    submitBtn.disabled = true;

                    submitBtn.textContent = "儲存中...";


                    try {

                        // ========================================
                        // PUT /api/spots/{id}
                        // ========================================

                        const response =
                            await fetch(
                                `/api/spots/${spotId}`, {
                                    method: "PUT",

                                    headers: {
                                        "Content-Type": "application/json",

                                        "Accept": "application/json"
                                    },

                                    body: JSON.stringify(data)
                                }
                            );


                        console.log(
                            "🔥 PUT HTTP Status：",
                            response.status
                        );


                        // ========================================
                        // 取得 API 原始回應
                        // ========================================

                        const rawResponse =
                            await response.text();


                        console.log(
                            "🔥 PUT API 原始回應：",
                            rawResponse
                        );


                        let result = null;


                        try {

                            result =
                                JSON.parse(rawResponse);

                        } catch (jsonError) {

                            console.error(
                                "JSON 解析失敗：",
                                jsonError
                            );

                        }


                        // ========================================
                        // 修改成功
                        // ========================================

                        if (response.ok) {

                            message.className =
                                "alert alert-success";

                            message.textContent =
                                result?.message ||
                                "景點修改成功！";

                            message.style.display =
                                "block";


                            console.log(
                                "✅ 景點修改成功：",
                                result
                            );


                            // 5 秒後回到景點管理

                            setTimeout(
                                function() {

                                    window.location.href =
                                        "/admin/spots";

                                },
                                5000
                            );

                        }


                        // ========================================
                        // 修改失敗
                        // ========================================
                        else {

                            message.className =
                                "alert alert-danger";

                            message.style.display =
                                "block";


                            message.textContent =
                                result?.message ||
                                "景點修改失敗，請確認資料。";


                            console.error(
                                "❌ PUT API Error：",
                                result ||
                                rawResponse
                            );


                            // 恢復按鈕

                            submitBtn.disabled =
                                false;

                            submitBtn.textContent =
                                "儲存編輯";

                        }

                    }


                    // ========================================
                    // Fetch 錯誤
                    // ========================================
                    catch (error) {

                        console.error(
                            "❌ PUT Fetch Error：",
                            error
                        );


                        message.className =
                            "alert alert-danger";

                        message.textContent =
                            "無法連線到 API，請確認 Laravel 是否正在執行。";

                        message.style.display =
                            "block";


                        submitBtn.disabled =
                            false;

                        submitBtn.textContent =
                            "儲存編輯";

                    }

                }
            );
    </script>

</body>

</html>