require.config({ paths: { vs: "./library/monaco-editor/min/vs" } });

require(["vs/editor/editor.main"], function () {
  var editor = monaco.editor.create(document.getElementById("container"), {
    value: ["function x() {", '\tconsole.log("Hello world!");', "}"].join("\n"),
    language: "javascript",
  });
});
