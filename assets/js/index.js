// 侧边栏模糊效果
const sideBarWidget = document.querySelectorAll(".widget");
const sideBarWidgetTitle = document.querySelectorAll(".widget-title");
const sideBarWidgetBlur = document.querySelectorAll(".widget-list");

for (let i = 0; i < sideBarWidget.length; i++) {
  sideBarWidget[i].addEventListener("mouseover", () => {
    if (!sideBarWidgetBlur[i].classList.contains("widget-list-blur")) {
      sideBarWidgetBlur[i].classList.add("widget-list-blur");
      sideBarWidgetTitle[i].classList.add("active");
    }
  });
  sideBarWidget[i].addEventListener("mouseout", () => {
    if (sideBarWidgetBlur[i].classList.contains("widget-list-blur")) {
      sideBarWidgetBlur[i].classList.remove("widget-list-blur");
      sideBarWidgetTitle[i].classList.remove("active");
    }
  });
}

//折叠按钮
const burgerEl = document.querySelector(".burger");
const headerEl = document.querySelector("header");
burgerEl.addEventListener("click", () => {
  headerEl.classList.toggle("open");
});
