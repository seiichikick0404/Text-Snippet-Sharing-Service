<?php
$syntaxes = [
    1 => "Plaintext",
    2 => "HTML",
    3 => "CSS",
    4 => "JavaScript",
    5 => "TypeScript",
    6 => "Python",
    7 => "Java",
    8 => "PHP",
    9 => "Go",
    10 => "Ruby",
    11 => "Swift",
    12 => "Kotlin",
    13 => "JSON",
    14 => "YAML",
    15 => "XML",
    16 => "Markdown",
    17 => "SQL",
    18 => "Bash",
]
?>


<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <!-- タイトル -->
            <h2><i class="fas fa-code"></i> Snippet Title</h2>

            <!-- 有効期限と作成日 -->
            <p><i class="far fa-clock"></i> Expiration: <?php echo htmlspecialchars($data['expiration']) ?></p>
            <p><i class="far fa-calendar-alt"></i> Created Date: <?php echo htmlspecialchars($data['created_at']) ?></p>

            <!-- シンタックス -->
            <p><i class="fas fa-cogs"></i> Syntax: <?php echo htmlspecialchars($syntaxes[$data['syntax_id']]) ?></p>

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
