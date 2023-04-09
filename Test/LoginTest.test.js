import { LoginValidate } from '/src/Test.js';
const expect = chai.expect;

// Dùng mocha và chai đề làm unit test
describe('function LoginValidate()', () => {
  it('Trả về 0 nếu tài khoản hoặc mật khẩu là null', () => {
    const result = LoginValidate(null, null);
    expect(result).to.equal(0);
  });
  it('Trả về -1 nếu tài khoản hoặc mật khẩu có độ dài < 10', () => {
    const result = LoginValidate('admin@gmail.com', '123456');
    expect(result).to.equal(-1);
  });
  it('Trả về -2 nếu tài khoản không đúng định dạng mail', () => {
    const result = LoginValidate('adminadminadmin123', '12345678901');
    expect(result).to.equal(-2);
  });
  it('Trả về 1 nếu tài khoản và mật khẩu thỏa mãn hết điều kiện', () => {
    const result = LoginValidate('admin12345@gmail.com', '12345678901');
    expect(result).to.equal(1);
  });
});
