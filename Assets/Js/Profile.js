const editBtn = document.querySelector(".edit-btn");
const saveBtn = document.querySelector(".save-btn");
const editProfileImgBtn = document.querySelector(".edit-profile-img-btn");
const Pname = document.querySelector(".Pname");
const name = document.querySelector(".name");
const phone = document.querySelector(".phone");
const email = document.querySelector(".email");
const username = document.querySelector(".username");
const password = document.querySelector(".password");
const editPnameInput = document.querySelector(".edit-Pname-input");
const editNameInput = document.querySelector(".edit-name-input");
const editPhoneInput = document.querySelector(".edit-phone-input");
const editEmailInput = document.querySelector(".edit-email-input");
const editUsernameInput = document.querySelector(".edit-username-input");
const editPasswordInput = document.querySelector(".edit-password-input");
const profileImg = document.querySelector(".profile-img");

editBtn.addEventListener("click", () => {
  editPnameInput.value = Pname.textContent;
  editNameInput.value = name.textContent;
  editPhoneInput.value = phone.textContent;
  editEmailInput.value = email.textContent;
  editUsernameInput.value = username.textContent;
  profileImg.style.opacity = "0.5";
  editProfileImgBtn.style.display = "block";
  editBtn.style.display = "none";
  saveBtn.style.display = "block";
  name.style.display = "none";
  Pname.style.display = "none"
  phone.style.display = "none";
  email.style.display = "none";
  username.style.display = "none";
  password.style.display = "none";
  editPnameInput.style.display = "block";
  editNameInput.style.display = "block";
  editPhoneInput.style.display = "block";
  editEmailInput.style.display = "block";
  editUsernameInput.style.display = "block";
  editPasswordInput.style.display = "block";
});

saveBtn.addEventListener("click", () => {
  Pname.textContent = editPnameInput.value;
  name.textContent = editNameInput.value;
  phone.textContent = editPhoneInput.value;
  email.textContent = editEmailInput.value;
  username.textContent = editUsernameInput.value;
  password.textContent = editPasswordInput.value;
  profileImg.style.opacity = "1";
  editProfileImgBtn.style.display = "none";
  editBtn.style.display = "block";
  saveBtn.style.display = "none";
  Pname.style.display = "block";
  name.style.display = "block";
  phone.style.display = "block";
  email.style.display = "block";
  username.style.display = "block";
  password.style.display = "block";
  editPnameInput.style.display = "none";
  editNameInput.style.display = "none";
  editPhoneInput.style.display = "none";
  editEmailInput.style.display = "none";
  editUsernameInput.style.display = "none";
  editPasswordInput.style.display = "none";
});

editProfileImgBtn.addEventListener("click", () => {
  // code để thay đổi ảnh
});