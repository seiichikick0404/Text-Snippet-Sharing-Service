require.config({ paths: { vs: "../../library/monaco-editor/min/vs" } });

require(["vs/editor/editor.main"], function () {
  const container = document.getElementById("container");

  const content = container.getAttribute("data-content");
  const language = container.getAttribute("data-language");
  var editor = monaco.editor.create(document.getElementById("container"), {
    value: content,
    language: language,
    readOnly: true,
  });
});
