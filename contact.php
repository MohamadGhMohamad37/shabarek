
<?php
include("heade.php");
?>

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Contact Us</h3>
          <span class="breadcrumb"><a href="#">Home</a>  >  Contact Us</span>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-page section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="left-text">
            <div class="section-heading">
              <h6>Contact Us</h6>
              <h2><?php echo$data[7]; ?></h2>
            </div>
            <p><?php echo$data[8]; ?></p>
            <ul>
              <li><span>Address</span> <?php echo$data[11]; ?></li>
              <li><span>Phone</span> <?php echo$data[9]; ?></li>
              <li><span>Whatsapp</span><a href="https://wa.me/<?php echo$data[14];?>"><?php echo$data[14];?></a></li>
              <li><span>Email</span><a href= "mailto: <?php echo$data[10]; ?>"> <?php echo$data[10]; ?> </a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="right-content">
            <div class="row">
              <div class="col-lg-12">
                <div id="map">
                <iframe src="<?php echo$data[12]; ?>" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
              </div>
              <div class="col-lg-12">
                <form id="contact-form" action="assets/mailer.php" method="post">
                  <div class="row">
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="name"  name="name" id="name" placeholder="Your Name..." autocomplete="on" required>
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="surname" name="surname" id="surname" placeholder="Your Surname..." autocomplete="on" required>
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail..." required="">
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="subject" name="subject" id="subject" placeholder="Subject..." autocomplete="on" >
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <textarea name="message" id="message" placeholder="Your Message"></textarea>
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" name="send" id="form-submit" class="orange-button">Send Message Now</button>
                      </fieldset>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  

  <?php
include("footer.php");
?>