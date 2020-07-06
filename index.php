<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor\autoload.php';
$result="";


if(isset($_POST['Submit']) && isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
{
  try {
    $mail = new PHPMailer(true);      //new object created
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail ->SMTPSecure = "tls";
    $mail->Username = "rourkebradley@gmail.com";
    $mail->Password = "";
    $secret = '6LeFYK4ZAAAAANFmd0nZva7ZR7Fw8Bte3BudlVNb';
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
      $responseData = json_decode($verifyResponse);
      $mail->setFrom(filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL), filter_input(INPUT_POST,"name",FILTER_SANITIZE_STRING));
      $mail->addAddress('rourkebradley@gmail.com');
      $mail->addReplyTo(filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL), filter_input(INPUT_POST,"name",FILTER_SANITIZE_STRING));
      $mail->isHTML(true);
      $mail->Subject = "Contaminant Control Contact Form";
      $mail->Body = "Name: " . filter_input(INPUT_POST,"name",FILTER_SANITIZE_STRING);
      $mail->Body .= "<br> Email Address: ". filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL);
      $mail->Body .= "<br> Phone Number: " . filter_input(INPUT_POST,"phone",FILTER_SANITIZE_NUMBER_INT);
      $mail->Body .= "<br> Message: ". filter_input(INPUT_POST,"comment",FILTER_SANITIZE_STRING);
      $mail->Body .= "<br> Areas of interest: ";
      if(isset($_POST['rareEarthMagnets']))
      {
        $mail->Body .= "<br> " . $_POST["rareEarthMagnets"] . "<br>";
      }
      if(isset($_POST['magnetTesting']))
      {
        $mail->Body .= $_POST["magnetTesting"] . "<br>";
      }
      if(isset($_POST['detectableProducts']))
      {
        $mail->Body .= $_POST["detectableProducts"];
      }

      $mail->send();

      if($responseData->success)
      {
        $result =  "Your message has been sent";
      } else

      {
        $errMsg = 'Robot verification failed, please try again.';
      }
    }

    catch (Exception $e)
    {
      echo "Error: Message did not send <br>";
      echo $e->errorMessage();
    }
    catch (\Exception $e)
    {
      echo $e->getMessage();
    }
  }
  ?>

  <!doctype html>
  <html lang="en">

  <!-- header -->
  <?php include("inc/header.php");  ?>
  <!-- /header -->

  <body data-spy="scroll" data-target=".navbar">

    <!-- navbar -->
    <?php include("inc/nav.php");  ?>
    <!-- /navbar -->

    <!-- Home -->
    <?php
    $bst = "<span style=\"color: #005C9D; font-weight: bold\">BST</span>";
    $greenwood = "<span style=\"color: rgb(14, 139, 40); font-weight: bold\">Greenwood</span>";
    ?>
    <div id="index" class="container text-center ">
      <!-- <h1 class="display-1">Contaminant Control</h1> -->
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p class="lead"><span style="color: red; font-weight: bold">Contaminant Control</span> supply Food & Pharma producers throughout Ireland from our base in Dublin.</p>
      <p class="lead">We represent both <?php echo $bst;?> Detectable Products & <?php echo $greenwood; ?> Magnetics here.</p>
      <p class="lead">Our aim is to provide single-sourced protection from plastic & ferrous / paramagnetic (metal) contamination for you, your product & customers.</p>
      <p class="lead">We want to help you <strong>reduce the risk</strong> of a costly product recall potentially involving financial penalties and long term damage to your company & brand image
      </p>
      <p>&nbsp;</p>
    </div>
    <!-- /Home -->

    <div id="detectables" class="container pt-5 mb-4">
      <h2 class="display-3 text-center"><span style=" color: red">BST Detectable Products</span></h2>
      <p>&nbsp;</p>
      <div class="row">
        <div class="col">
          <p class="lead">
            <?php echo $bst;?> was established in 1985.
            They invented the <strong>original</strong> (and world's first) detectable pen in 1994 & now supply over 1.8m of these annually.<br>
            Through performance & reputation <?php echo $bst;?> remain the preferred choice supplier of many leading companies worldwide.<br>
            <?php echo $bst;?> offer a <strong>complete range</strong> of product to meet the BRC - HACCP - GMP due diligence obligations of the bakery - confectionery - meat - fish - fruit - veg & pre-prepared meal sectors.<br>
            <?php echo $bst;?>'s new <strong>XDETECT</strong> material is one of the most detectable , strong and colourful plastic compounds available.<br>
            <?php echo $bst;?> products made from <strong>XDETECT</strong> benefit from the following properties:<br>
            <ul>
              <li>Detectable & distinctive</li>
              <li>X-ray visible</li>
              <li>Robust & shatter resistant</li>
              <li>Anti-bacterial protection</li>
              <li>Food safe to FDA & EU standards</li>
            </ul>
          </p>
          <p class="lead">
            For more details please go to <br> <a href="https://www.bst-detectable.com/" target="_blank"><span style="color: #005C9D;font-weight: bold">www.bst-detectable.com</span></a>
          </p>
        </div>
        <div class="col">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/lBtN2R9wPq0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>

    <div id="magnet" class="container pt-5">
      <h2 class="display-3 text-center"><span style=" color: red">Hi-Strength Rare Earth Magnets & On-Site Gauss Testing</span></h2>
      <p>&nbsp;</p>
      <div class="row">
        <div class="col">
          <p class="lead">
            <?php echo $greenwood; ?> Magnetics is a 3rd generation family run business that was set up in 1948.<br>
            They supply to food, pharma, powder handling & plastics companies globally.<br>
            <?php echo $greenwood; ?> can offer <span style="color: red;">bespoke magnetic separation solutions</span> at a reasonable cost.<br>
            Rare Earth <strong>magnets guard against</strong> ferrous / paramagnetic contaminants (down to sub-micron size) to reduce the risk of a costly product recall and / or damage to machinery.<br>
          </p>
          <p class="lead">
            For more details please go to <a href="https://www.greenwoodmagnetics.com/"target="_blank"><span style="color:rgb(14, 139, 40);font-weight: bold ">www.greenwoodmagnetics.com</span></a>
          </p>

        </div>
        <div class="col">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/bsyyC0ZBePY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
      </div>
      <p>&nbsp;</p>
    </div>


    <div id="contact" class="container pt-5">
      <div class="row">
        <div class="col">
          <h2 class="display-3 text-center"><span style=" color: red">Contact Us</span></h2>
          <p>&nbsp;</p>
          <p class="lead">
            <strong>David Bradley</strong><br>
            Contaminant Control<br>
            Kingswood, Dublin 24<br>
            D24-YNFK<br>
            <br>
            <strong>Tel: </strong> 353-87-2591488 & 01-558-2988<br>
            <strong>Fax: </strong> 353-1-696-8999<br>
            <br>
            <strong>Email: </strong><a href="mailto:david@contaminant-control.com"> david@contaminant-control.com</a><br>
            <strong>Web: </strong>www.contaminant-control.com<br>
            <br>
            Standard BST items ex-Dublin stock for a <strong>next day delivery</strong>.<br>
            Please do not hesitate to contact us for brochures, samples or on-site visits / consultations.
          </p>



          <div class="text-center">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Send us an enquiry!</button>
            <?php echo "<br>" .  $result; ?>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header navbar">

                <h4 class="modal-title w-100 text-center text-light">Enquiry Form</h4>
              </div>
              <div class="modal-body">
                <form action="#contact" method="post" id="captcha_form">

                  <div class="form-group w-100 text-center">
                    <input type="text"  id="name" name="name" placeholder="Name" required>
                  </div>
                  <div class="form-group w-100 text-center">
                    <input type="tel" id="phone" name="phone" placeholder="Contact Number">
                  </div>

                  <div class="form-group w-100 text-center">
                    <input type="email" id="email" name="email" placeholder="Email Address" required>
                  </div>
                  <div class="form-group w-100 text-center">
                    <textarea cols="50" rows="7" id="comment" name="comment" placeholder="Message" required></textarea>
                  </div>
                  <div class="form-group  text-center">
                    <p>Product areas of interest (tick box)</p>
                    <input type="checkbox" id="rareEarthMagnets" name="rareEarthMagnets" value="Rare Earth Magnets">
                    <label for="rareEarthMagnets">Rare Earth Magnets</label><br>
                    <input type="checkbox" id="magnetTesting" name="magnetTesting" value="Magnet Testing">
                    <label for="magnetTesting">Magnet Testing</label><br>
                    <input type="checkbox" id="detectableProducts" name="detectableProducts" value="Detectable Products">
                    <label for="rareEarthMagnets">Detectable Products</label><br>
                  </div>
                  <div class="form-group">
                    <div align="center" class="g-recaptcha"  data-sitekey="6LeFYK4ZAAAAAIydiztcaGe9vzE_pib8vpEUFC2P" data-callback="enableBtn">
                    </div>
                  </div>
                  <div class="form-group w-100 text-center">
                    <input type="submit" class="btn btn-info btn-lg" name="Submit" value="Submit" id="button1" disabled="disabled" >
                  </div>

                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>

        <div class="col">
          <!-- img -->
          <div class="container text-sm-center pt-5">
            <img  src="images/contamiant-control-map.jpg" class="img-fluid" alt="Contaminant Control - Official Distributor of BST Detectable Products"/>
          </div>
          <!-- /img -->
        </div>
      </div>
      <br>
    </div>

    <!-- footer -->
    <?php include("inc/footer.php"); ?>
    <!-- /footer -->


    <!-- Optional JavaScript  -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
    function enableBtn(){
      document.getElementById("button1").disabled = false;
    }
    </script>

  </body>
  </html>
