<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <!-- タイトル -->
            <h2><i class="fas fa-code"></i> Snippet Title</h2>

            <!-- 有効期限と作成日 -->
            <p><i class="far fa-clock"></i> Expiration: 2023-01-30</p>
            <p><i class="far fa-calendar-alt"></i> Created Date: 2023-01-13</p>

            <!-- シンタックス -->
            <p><i class="fas fa-cogs"></i> Syntax: JavaScript</p>

            <!-- コピーボタン -->
            <div class="text-end mb-3">
                <button class="btn btn-dark" onclick="copySnippetContent()">
                <i class="fas fa-clipboard"></i> 
                <i class="fas fa-copy">Copy code</i>
            </button>
            </div>
        </div>
    </div>

    <!-- Monaco Editor Container -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="container" style="height: 600px; border: 1px solid grey;"></div>
        </div>
    </div>
</div>
