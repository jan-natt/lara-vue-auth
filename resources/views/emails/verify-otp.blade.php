<form action="/verify-otp" method="POST">
  @csrf
  <input type="email" name="email" placeholder="Your email">
  <input type="number" name="otp" placeholder="Enter OTP">
  <button type="submit">Verify</button>
</form>
