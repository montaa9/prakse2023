<?php include_once 'header.php';?>
<body>

<section class="home">
    <div class="content">
    <h3>Paštaisītas sveces</h3>
        <p>Sveicināts mūsu sveču veikalā, kurā atradīsi plašu izvēli ar dažādām sveču krāsām, formas un izmēriem. Ja vēlies iepriecināt savu māju ar mierīgu, romantisku vidi, vai iespaidīgu un svinīgu atmosfēru, mēs piedāvājam visu to un vēl daudz ko citu.</p>
        <?php if(isset($_SESSION['user_id'])):?>
        <a href="products.php" class="hbtn">Iepirkties</a>
        <?php endif; ?>
        <?php if(!isset($_SESSION['user_id'])):?>
        <a href="login.php" class="hbtn">Iepirkties</a>
        <?php endif; ?>
    </div>
    
</section>

<section class="about" id="about">

    <h1 class="heading">  Par mums </h1>

    <body>
  <div class="aboutuscontainer">
   
    <div class="whatwedo">
      <div class="wedo">
        <img src="images/make.webp" class="wedo-img">

        <h3 class="wedoh">Mēs taisam</h3>
        <p>Mēs radām unikālas sveces ar rūpīgi izvēlētiem materiāliem, krāsām un aromātiem, lai radītu unikālu atmosfēru un mierīgu noskaņu.</p>
      </div>
      <div class="wedo">
        <img src="images/sell.webp" class="wedo-img">

        <h3 class="wedoh">Mēs pārdodam</h3>
        <p>Mēs pārdodam unikālas un kvalitatīvas sveces, kas radītas ar mīlestību un rūpēm. </p>
      </div>
      <div class="wedo">
        <img src="images/happiness.jpg" class="wedo-img">

        <h3 class="wedoh">Mēs radam </h3>
        <p>Mūsu sveces ir radītas, lai dotu prieku un radītu mierīgu atmosfēru. </p>
      </div>
    </div>
  </div>
</body>

</html>
</section>

<br><h1 class="heading">  Mēs piedāvajam </h1>
<section class="icons-container">
    <div class="icons">
        <img src="images/freedeliv.png" alt="">
        <div class="info">
            <h3>Bezmaksas piegāde</h3>
            <span>Visiem pasūtijumiem virs 10$</span>
        </div>
    </div>

    <div class="icons">
        <img src="images/cash.png" alt="">
        <div class="info">
            <h3>14 dienu atgriešanu</h3>
            <span>Naudas garantija</span>
        </div>
    </div>

    <div class="icons">
        <img src="images/gifts.webp" alt="">
        <div class="info">
            <h3>Piedāvājumi & Dāvanas</h3>
            <span>Nedēļas nogalēs un svētkos</span>
        </div>
    </div>

    <div class="icons">
        <img src="images/payments.png" alt="">
        <div class="info">
            <h3>Droši maksājumi</h3>
            <span>Bankas nodoršināti</span>
        </div>
    </div>
   
</section>


<?php include_once 'footer.php'; ?>



</body>
</html>