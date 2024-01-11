<?php
session_start();
include_once "php/config.php";
if (!isset($_SESSION['unique_id'])) {
  header("location: login.php");
}
?>
<?php include_once "header.php"; ?>

<body>
  <div class="wrapper chating">
    <section class="chat-area">
      <header>
        <?php
        $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
        if (mysqli_num_rows($sql) > 0) {
          $row = mysqli_fetch_assoc($sql);
        } else {
          header("location: users.php");
        }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="php/images/<?php echo $row['img']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
        <!-- <div class="theme">
        <i id="night" class="fas fa-moon"></i>
          </div> -->
      </header>
      <div class="chat-box">
        <div class="chat">

        </div>
      </div>
      
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

      <script src="javascript/chat.js"></script>

    </section>
  </div>
  <!-- <script>
    let moon = document.getElementById("night");
    let sun = document.querySelector("#day");
    moon.onclick = () => {
      moon.classList.add("active");
        document.documentElement.style.setProperty('--pink-color', '#263238');
        document.querySelector(".chat-area header").style.background = "#37474F";
        document.querySelector(".chat-area header").style.color = "#fff";
    }
    sun.onclick = () => {
      moon.classList.remove("active");
        document.documentElement.style.setProperty('--pink-color', '#00838F');
        document.querySelector(".chat-area header").style.background = "#e3e3e3";
        document.querySelector(".chat-area header").style.color = "#eee";
    }

    // function changeTheme(theme) {
    //   if (theme == "night") {
       
    //   } else {
       
    //   }
    // }
  </script> -->


</body>

</html>