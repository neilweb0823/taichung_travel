<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>新增景點</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-4">

        <h1 class="mb-4">新增景點</h1>

        <!-- API 回應訊息 -->
        <div id="message" class="alert" style="display: none;"></div>

        <!-- 新增景點表單 -->
        <form id="spotForm">

            <!-- 景點名稱 -->
            <div class="mb-3">

                <label class="form-label">
                    景點名稱 <span class="text-danger">*</span>
                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
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
                    class="form-control">

            </div>


            <!-- 摘要 -->
            <div class="mb-3">

                <label class="form-label">
                    摘要
                </label>

                <textarea
                    name="summary"
                    class="form-control"></textarea>

            </div>


            <!-- 詳細介紹 -->
            <div class="mb-3">

                <label class="form-label">
                    詳細介紹 <span class="text-danger">*</span>
                </label>

                <textarea
                    name="description"
                    class="form-control"
                    rows="5"
                    required></textarea>

            </div>


            <!-- 分類 -->
            <div class="mb-3">

                <label class="form-label">
                    分類 <span class="text-danger">*</span>
                </label>

                <input
                    type="text"
                    name="category"
                    class="form-control"
                    required>

            </div>


            <!-- 地區 -->
            <div class="mb-3">

                <label class="form-label">
                    地區 <span class="text-danger">*</span>
                </label>

                <input
                    type="text"
                    name="district"
                    class="form-control"
                    required>

            </div>


            <!-- 電話 -->
            <div class="mb-3">

                <label class="form-label">
                    電話
                </label>

                <input
                    type="text"
                    name="phone"
                    class="form-control">

            </div>


            <!-- 地址 -->
            <div class="mb-3">

                <label class="form-label">
                    地址
                </label>

                <input
                    type="text"
                    name="address"
                    class="form-control">

            </div>


            <!-- 圖片路徑 -->
            <div class="mb-3">

                <label class="form-label">
                    圖片路徑 <span class="text-danger">*</span>
                </label>

                <input
                    type="text"
                    name="image"
                    class="form-control"
                    required>

            </div>


            <!-- 按鈕 -->
            <button
                type="submit"
                class="btn btn-success"
                id="submitBtn">

                新增景點

            </button>


            <a
                href="/admin/spots"
                class="btn btn-secondary">

                返回

            </a>

        </form>

    </div>


    <script>
        document
            .getElementById('spotForm')
            .addEventListener('submit', async function(e) {

                // 防止 HTML form 原本直接送出
                e.preventDefault();


                const form = e.target;

                const submitBtn =
                    document.getElementById('submitBtn');

                const message =
                    document.getElementById('message');


                // ========================================
                // 前端欄位驗證
                // ========================================

                const name =
                    form.name.value.trim();

                const category =
                    form.category.value.trim();

                const district =
                    form.district.value.trim();

                const description =
                    form.description.value.trim();

                const image =
                    form.image.value.trim();


                // 景點名稱
                if (name === '') {

                    showError('請輸入景點名稱');

                    return;

                }


                // 分類
                if (category === '') {

                    showError('請輸入分類');

                    return;

                }


                // 地區
                if (district === '') {

                    showError('請輸入地區');

                    return;

                }


                // 詳細介紹
                if (description === '') {

                    showError('請輸入詳細介紹');

                    return;

                }


                // 圖片
                if (image === '') {

                    showError('請輸入圖片路徑');

                    return;

                }


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
                    '🔥 POST 新增景點開始'
                );

                console.log(
                    '📦 送出資料：',
                    data
                );


                // 防止使用者連續點擊
                submitBtn.disabled = true;

                submitBtn.textContent = '新增中...';


                try {

                    // ========================================
                    // 呼叫 Laravel API
                    // ========================================

                    const response =
                        await fetch('/api/spots', {

                            method: 'POST',

                            headers: {

                                'Content-Type': 'application/json',

                                'Accept': 'application/json'

                            },

                            body: JSON.stringify(data)

                        });


                    // ========================================
                    // HTTP Status
                    // ========================================

                    console.log(
                        '🔥 HTTP Status：',
                        response.status
                    );


                    console.log(
                        '🔥 Content-Type：',
                        response.headers.get(
                            'content-type'
                        )
                    );


                    // ========================================
                    // 取得 API 原始回應
                    // ========================================

                    const rawResponse =
                        await response.text();


                    console.log(
                        '🔥 API 原始回應：',
                        rawResponse
                    );


                    let result = null;


                    try {

                        result =
                            JSON.parse(rawResponse);

                    } catch (jsonError) {

                        console.error(
                            'JSON 解析失敗：',
                            jsonError
                        );

                    }


                    // ========================================
                    // API 成功
                    // ========================================

                    if (response.ok) {

                        message.className =
                            'alert alert-success';

                        message.textContent =
                            result?.message ||
                            '景點新增成功！';

                        message.style.display =
                            'block';


                        console.log(
                            '✅ 景點新增成功',
                            result
                        );


                        // 清空表單
                        form.reset();


                        // 5 秒後回到景點管理
                        setTimeout(() => {

                            window.location.href =
                                '/admin/spots';

                        }, 5000);

                    }


                    // ========================================
                    // API 失敗
                    // ========================================
                    else {

                        message.className =
                            'alert alert-danger';

                        message.style.display =
                            'block';


                        // Laravel validation 錯誤
                        if (
                            result &&
                            result.errors
                        ) {

                            let errorMessages = [];

                            Object.values(
                                result.errors
                            ).forEach(function(errors) {

                                errors.forEach(
                                    function(error) {

                                        errorMessages.push(
                                            error
                                        );

                                    }
                                );

                            });


                            message.innerHTML =
                                errorMessages.join('<br>');

                        }

                        // 一般 API 錯誤
                        else if (
                            result &&
                            result.message
                        ) {

                            message.textContent =
                                result.message;

                        } else {

                            message.textContent =
                                '新增景點失敗，請確認資料。';

                        }


                        console.error(
                            '❌ API Error：',
                            result || rawResponse
                        );


                        // 允許再次送出
                        submitBtn.disabled =
                            false;

                        submitBtn.textContent =
                            '新增景點';

                    }

                }


                // ========================================
                // Fetch / 網路錯誤
                // ========================================
                catch (error) {

                    console.error(
                        '❌ Fetch Error：',
                        error
                    );


                    message.className =
                        'alert alert-danger';


                    message.textContent =
                        '無法連線到 API，請確認 Laravel 是否正在執行。';


                    message.style.display =
                        'block';


                    // 允許再次送出
                    submitBtn.disabled =
                        false;

                    submitBtn.textContent =
                        '新增景點';

                }

            });


        // ========================================
        // 顯示前端錯誤訊息
        // ========================================

        function showError(text) {

            const message =
                document.getElementById('message');


            message.className =
                'alert alert-danger';


            message.textContent =
                text;


            message.style.display =
                'block';

        }
    </script>

</body>

</html>