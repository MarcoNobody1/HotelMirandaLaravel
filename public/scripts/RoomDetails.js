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

function initRoomDetailsSwiper() {
  var swiper;
  if (window.matchMedia("(max-width: 1000px)").matches) {
    swiper = new Swiper("#roomsrelated__swiper", {
      navigation: {
        nextEl: "#roomsrelated-nextslide",
        prevEl: "#roomsrelated-prevslide",
      },
    });
  } else {
    swiper = new Swiper("#roomsrelated__swiper", {
      slidesPerView: 2,
      spaceBetween: 10,
      keyboard: true,
      navigation: {
        nextEl: "#roomsrelated-nextslide",
        prevEl: "#roomsrelated-prevslide",
      },
    });
  }
}

initRoomDetailsSwiper();

window.addEventListener("resize", () => {
  initRoomDetailsSwiper();
});

const goToRoomDetails = () => {
  window.location.href = "roomdetails";
};

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
      window.location.href = "/";
    }
  });
};

document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("roomsdetails__form");
  let firstnameinput = document.querySelector("#firstname");
  let surnameinput = document.querySelector("#surname");
  let emailinput = document.querySelector("#availemail");
  let phoneinput = document.querySelector("#availphone");
  let specialRequestinput = document.querySelector("#specialrequest");
  let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    if (firstnameinput.value.trim() === "") {
      notification("Error: Name cannot be empty", "error", true);
    } else if (surnameinput.value.trim() === "") {
      notification("Error: Surname cannot be empty", "error", true);
    } else if (
      emailinput.value.trim() === "" ||
      !emailRegex.test(emailinput.value)
    ) {
      notification("Error: Email not valid. Check your answer again.", "error");
    } else if (phoneinput.value.trim() === "") {
      notification("Error: Phone not valid. Check your answer again.", "error");
    } else if (specialRequestinput.value.trim() === "") {
      notification("Error: Request cannot be empty", "error");
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
