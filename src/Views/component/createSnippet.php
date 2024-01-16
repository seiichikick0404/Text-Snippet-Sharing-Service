<div class="container mt-4">
    <h2>Text Snippet Sharing Service</h2>
    <div class="row">
        <!-- Monaco Editor Container -->
        <div class="col-md-8">
            <div id="container" style="height: 600px; border: 1px solid grey;"></div>
        </div>

        <!-- Form Elements Container -->
        <div class="col-md-4">
            <!-- タイトル入力フォーム -->
            <div class="mb-3">
                <label for="snippetTitle" class="form-label">Title</label>
                <input type="text" class="form-control" id="snippetTitle" placeholder="Enter title">
            </div>

            <!-- 有効期限選択フォーム -->
            <div class="mb-3">
                <label for="expiration" class="form-label">Expiration</label>
                <select class="form-select" id="expiration">
                <option value="10min">10min</option>
                <option value="1hour">1h</option>
                <option value="1day">1day</option>
                <option value="forever">never</option>
                </select>
            </div>

            <!-- 構文選択フォーム -->
            <div class="mb-3">
                <label for="syntax" class="form-label">Syntax</label>
                <select class="form-select" id="syntax">
                    <option value="text">Text</option>
                    <option value="python">Python</option>
                    <option value="java">Java</option>
                    <option value="javascript">JavaScript</option>
                    <!-- 他の言語オプションを追加可能 -->
                </select>
            </div>

            <!-- アップロードボタン -->
            <div class="mb-3">
                <button type="submit" class="btn btn-dark">Upload</button>
            </div>
        </div>
    </div>
</div>

<!-- <script src="../../library/monaco-editor/min/vs/loader.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs/loader.min.js"></script>
<script src="../../public/js/editor.js"></script>

