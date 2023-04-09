import { ResetPasswordValidate } from '/src/Test.js';
const expect = chai.expect;

// Dùng mocha và chai đề làm unit test
describe('function ResetPasswordValidate()', () => {
  it('Trả về 0 nếu tài khoản hoặc mật khẩu là null', () => {
    const result = ResetPasswordValidate(null, null, null);
    expect(result).to.equal(0);
  });

  it('Trả về -1 nếu địa chỉ email không hợp lệ', () => {
    const result = ResetPasswordValidate(
      'invalidemail',
      'password',
      'password'
    );
    expect(result).to.equal(-1);
  });

  it('Trả về -2 nếu địa chỉ email không tồn tại trên hệ thống', () => {
    const result = ResetPasswordValidate(
      'nonexistent@gmail.com',
      'password',
      'password'
    );
    expect(result).to.equal(-2);
  });

  it('Trả về -3 nếu mật khẩu mới không đủ mạnh', () => {
    const result = ResetPasswordValidate('admin@gmail.com', 'weak', 'weak');
    expect(result).to.equal(-3);
  });

  it('Trả về -4 nếu mật khẩu mới không khớp với mật khẩu xác nhận', () => {
    const result = ResetPasswordValidate(
      'admin@gmail.com',
      'password1',
      'password2'
    );
    expect(result).to.equal(-4);
  });

  it('Trả về 1 nếu đúng hết', () => {
    const result = ResetPasswordValidate(
      'admin@gmail.com',
      'password',
      'password'
    );
    expect(result).to.equal(1);
  });
});
