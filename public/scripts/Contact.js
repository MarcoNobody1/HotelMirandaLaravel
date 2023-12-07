const menuBurguer = document.getElementById("menuBurguer");
const menuCross = document.getElementById("menuCross");
const nav = document.getElementById("nav");
const header = document.querySelector(".header");

menuBurguer.addEventListener("click", () => {
  menuBurguer.classList.add("header__menuiconburguer--closed");
  menuCross.classList.remove("header__menuiconcross--closed");
  nav.classList.remove("header__menucontent--hidden");
  nav.classList.add("fade");
});

menuCross.addEventListener("click", () => {
  menuBurguer.classList.remove("header__menuiconburguer--closed");
  menuCross.classList.add("header__menuiconcross--closed");
  nav.classList.add("header__menucontent--hidden");
  nav.classList.remove("fade");
});

window.addEventListener("scroll", () => {
  const currentScrollPos = window.pageYOffset;
  if (currentScrollPos >= 160 && window.innerWidth > 999) {
    header.classList.add("header--hidden");
  } else {
    header.classList.remove("header--hidden");
  }
});

window.addEventListener("mousemove", (event) => {
  const currentScrollPos = window.pageYOffset;
  if (event.clientY < 35 && currentScrollPos > 150 && window.innerWidth > 999) {
    header.classList.add("header--float");
  } else if (event.clientY > 210 && window.innerWidth > 999) {
    header.classList.remove("header--float");
  }
});

const notification = (
  text,
  icon,
  toast = true,
  title = "FORM NOT SUBMITTED",
  timer = 3000
) => {
  return Swal.fire({
    toast: toast,
    position: "top",
    title: title,
    timerProgressBar: toast,
    text: text,
    icon: icon,
    showConfirmButton: !toast,
    timer: timer,
  }).then((result) => {
    if (result.isConfirmed) {
      location.reload();
    }
  });
};

document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("contact_form");
  let nameinput = document.querySelector("#name");
  let emailinput = document.querySelector("#email");
  let phoneinput = document.querySelector("#phone");
  let subjectinput = document.querySelector("#subject");
  let messageinput = document.querySelector("#message");
  let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    if (nameinput.value.trim() === "") {
      notification("Error: Name cannot be empty", "error", true);
    } else if (
      emailinput.value.trim() === "" ||
      !emailRegex.test(emailinput.value)
    ) {
      notification("Error: Email not valid. Check your answer again.", "error");
    } else if (phoneinput.value.trim() === "") {
      notification("Error: Phone not valid. Check your answer again.", "error");
    } else if (subjectinput.value.length <= 2) {
      notification(
        "Error: Subject must be at least 3 characters long",
        "error"
      );
    } else if (messageinput.value.trim() === "") {
      notification("Error: Message cannot be empty", "error");
    } else {
      const formData = new FormData(form);

      fetch(form.action, {
        method: form.method,
        body: formData,
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.notification) {
            notification(
              data.notification[0],
              data.notification[1],
              data.notification[2],
              data.notification[3],
              99999
            );
          }
        })
        .catch((error) => {
          notification(
            "Oops! Something went wrong. Try again later, please.",
            "error"
          );
        });
    }
  });
});
