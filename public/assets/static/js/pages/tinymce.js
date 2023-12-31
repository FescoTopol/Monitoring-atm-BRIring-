document.addEventListener("DOMContentLoaded", () => {

  const themeOptions = document.body.classList.contains("theme-dark")
    ? {
        skin: "oxide-dark",
        content_css: "dark",
      }
    : {
        skin: "oxide",
        content_css: "default",
      }

  tinymce.init({forced_root_block : "", selector: "textarea", ...themeOptions })
  tinymce.init({
    selector: "#dark",
    toolbar:
      "undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code",
    plugins: "code",
    ...themeOptions,
  })
})
