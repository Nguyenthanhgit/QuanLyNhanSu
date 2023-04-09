//Func kiểm tra đăng nhập
function LoginValidate(username, password) {
  // Kiểm tra tài khoản và mật khẩu có null hay không
  if (!username || !password) {
    return 0;
  }

  // Kiểm tra độ dài tài khoản và mật khẩu
  if (username.length < 10 || password.length < 10) {
    return -1;
  }

  // Kiểm tra định dạng email
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(username)) {
    return -2;
  }

  // Trả về 1 nếu đúng hết
  return 1;
}

//Func kiểm tra quên mật khẩu
function ResetPasswordValidate(email, newPassword, confirmPassword) {
  // Kiểm tra email, mật khẩu có null hay không
  if (!email || !newPassword || !confirmPassword) {
    return 0;
  }

  //Kiểm tra tính hợp lệ của địa chỉ email
  const emailRegex = /^\S+@\S+\.\S+$/;
  if (!emailRegex.test(email)) {
    return -1;
  }

  //Kiểm tra xem email có tồn tại trên hệ thống hay không
  const registeredEmail = 'admin@gmail.com'; //giả sử địa chỉ email đã được đăng ký trên hệ thống
  if (email !== registeredEmail) {
    return -2;
  }

  //Kiểm tra tính hợp lệ của mật khẩu mới
  const minPasswordLength = 8; //giả sử độ dài tối thiểu của mật khẩu là 8
  if (newPassword.length < minPasswordLength) {
    return -3;
  }

  //Xác thực lại mật khẩu mới bằng cách so sánh mật khẩu mới với mật khẩu xác nhận
  if (newPassword !== confirmPassword) {
    return -4;
  }

  //Nếu đúng hết thì trả về 1
  return 1;
}
