<style>
.countdown-container {
  max-width: 600px;
  margin: 50px auto;
  text-align: center;
  background: #ffffff;
  padding: 30px;
  border-radius: 20px;
  box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

.countdown-container h2 {
  color: #007B55;
  font-size: 28px;
  margin-bottom: 20px;
}

#countdown {
  font-size: 32px;
  font-weight: bold;
  color: #e63946;
  background: #f8f9fa;
  padding: 20px;
  border-radius: 10px;
  display: inline-block;
}
</style>

<div class="countdown-container">
  <h2>Tarikh Akhir Mengundi<br><?php echo date("d M Y, h:i A", strtotime($tarikh)); ?></h2>
  <div id="countdown">Loading...</div>
</div>

<script>
const countDownDate = new Date("<?php echo $tarikh; ?>").getTime();
const countdownEl = document.getElementById("countdown");

const x = setInterval(() => {
  const now = new Date().getTime();
  const distance = countDownDate - now;

  if (distance < 0) {
    clearInterval(x);
    countdownEl.innerHTML = "🛑 Masa Mengundi Tamat!";
    countdownEl.style.color = "#6c757d";
    return;
  }

  const days = Math.floor(distance / (1000 * 60 * 60 * 24));
  const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((distance % (1000 * 60)) / 1000);

  countdownEl.innerHTML = `${days} hari ${hours} jam ${minutes} minit ${seconds} saat`;
}, 1000);
</script>