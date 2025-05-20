<?php include 'auth/check_login.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Famkie Agency - Order</title>
  <link rel="stylesheet" href="css/order.css?v=<?= time(); ?>">
</head>
<body>

<div class="home-container">
  <div class="info-box">
    <h3>Loss Price List</h3>
    <table class="info-table">
      <tr>
        <td>Regular Service</td>
        <td>$400,000 per loss</td>
      </tr>
      <tr>
        <td>Premium Service</td>
        <td>$500,000 per loss</td>
      </tr>
    </table>
  </div>

  <div class="info-box">
    <h3>Request Order Form</h3>
    <form method="POST" action="submit_order.php" id="orderForm">
      <table class="info-table">
        <tr>
          <td>Select Service</td>
          <td>
            <select id="service" name="service" required>
              <option value="">-- Choose Service --</option>
              <option value="regular">Regular</option>
              <option value="premium">Premium</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Quantity</td>
          <td>
            <input type="number" id="quantity" name="quantity" min="1" required>
          </td>
        </tr>
        <tr>
          <td>Total to Pay</td>
          <td><strong id="total">-</strong></td>
        </tr>
      </table>

      <div style="margin-top: 15px;">
        <button type="button" id="submitBtn">Submit Request</button>
        <input type="submit" id="realSubmit" style="display: none;">
      </div>
    </form>
  </div>

  <div class="info-box">
    <h3>Request Order Status</h3>
    <table class="info-table">
      <tr>
        <td>Current Request</td>
        <td>Request On Process</td>
      </tr>
      <tr>
        <td>Last Updated</td>
        <td>Just now</td>
      </tr>
    </table>
  </div>
</div>

<script>
  const serviceSelect = document.getElementById('service');
  const quantityInput = document.getElementById('quantity');
  const totalDisplay = document.getElementById('total');
  const submitBtn = document.getElementById('submitBtn');
  const realSubmit = document.getElementById('realSubmit');

  function updateTotal() {
    const service = serviceSelect.value;
    const quantity = parseInt(quantityInput.value) || 0;
    let price = 0;

    if (service === 'regular') price = 400000;
    if (service === 'premium') price = 500000;

    const total = price * quantity;
    totalDisplay.textContent = total > 0 ? `$${total.toLocaleString()}` : '-';
  }

  serviceSelect.addEventListener('change', updateTotal);
  quantityInput.addEventListener('input', updateTotal);

  submitBtn.addEventListener('click', () => {
    if (!serviceSelect.value || !quantityInput.value || quantityInput.value <= 0) {
      alert("Please complete the form correctly.");
      return;
    }

    let countdown = 3;
    submitBtn.disabled = true;
    submitBtn.textContent = `Submitting in ${countdown}...`;

    const timer = setInterval(() => {
      countdown--;
      if (countdown > 0) {
        submitBtn.textContent = `Submitting in ${countdown}...`;
      } else {
        clearInterval(timer);
        realSubmit.click(); // Trigger form submit
      }
    }, 1000);
  });
</script>

</body>
</html>