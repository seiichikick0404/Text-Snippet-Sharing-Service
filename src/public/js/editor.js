require.config({ paths: { vs: "../../library/monaco-editor/min/vs" } });

require(["vs/editor/editor.main"], function () {
  var editor = monaco.editor.create(document.getElementById("container"), {
    value: ["function x() {", '\tconsole.log("Hello world!");', "}"].join("\n"),
    language: "javascript",
  });

  // フォームの送信イベントを監視
  document
    .getElementById("snippetForm")
    .addEventListener("submit", function () {
      // エディタの現在の内容を取得
      var editorContent = editor.getValue();
      // 隠れた入力フィールドにエディタの内容を設定
      document.getElementById("editorContent").value = editorContent;
    });
});
