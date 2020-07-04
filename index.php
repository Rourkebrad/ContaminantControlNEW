<?php
$result='';
if(isset($_POST['submit']))
{
  require 'PHPmailer/PHPMailerAutoload.php';
  $mail = new PHPMailer;      //new object created
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 587;
  $mail->SMTPAuth = true;
  $mail ->SMTPSecure = "tls";
  $mail->Username = "rourkebradley@gmail.com";
  $mail->Password ="";
  $mail->setFrom($_POST['email'], $_POST['name']);
  $mail->addAddress('rourkebradley@gmail.com');
  $mail->addReplyTo($_POST['email'], $_POST['name']);
  $mail->isHTML(true);
  $mail->Subject = "Contaminant Control Contact Form";
  $mail->Body = "Name: " . $_POST['name'] . "<br> Email Address: "
  . $_POST['email'] . "<br> Phone Number: " . $_POST['phone'] . "<br> Message: "
  . $_POST['comment'] . "<br> Areas of interest: " . "<br> " . $_POST["rareEarthMagnets"] . "<br>"
  . $_POST["magnetTesting"] . "<br>" . $_POST["detectableProducts"];

  if(!$mail->send())
  {
    $result = "Something Went Wrong, Please try again.";
  } else {
    $result = $_POST['name'] .  " :Success, your message was sent";
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
  <div id="index" class="container text-center">
  <!-- <h1 class="display-1">Contaminant Control</h1> -->
  <p>&nbsp;</p>
  <p class="lead"><span style="color: red; font-weight: bold">Contaminant Control</span> supply Food & Pharma producers throughout Ireland from our base in Dublin.</p>
  <p class="lead">We represent both <span style="color: blue; font-weight: bold">BST</span> Detectable Products & <span style="color:rgb(19, 135, 107); font-weight: bold">Greenwood</span> Magnetics here.</p>
  <p class="lead">Our aim is to provide single-sourced protection from plastic & ferrous / paramagnetic (metal) contamination for you, your product & customers.</p>
  <p class="lead">We want to help you <strong>reduce the risk</strong> of a costly product recall potentially involving financial penalties and long term damage to your company & brand image
  </p>
  </div>
<!-- /Home -->

  <div id="detectables" class="container pt-5">
    <div class="row">
      <div class="col">
        <h2 class="display-4 text-sm-center">BST Detectable Products</h2>
        <p class="lead">
          BST was established in 1985.
          They invented the original (and world's first) detectable pen in 1994 & now supply over 1.8m of these annually.<br>
          Through performance & reputation BST remain the preferred choice supplier of many leading companies worldwide.<br>
          BST offer a complete range of product to meet the BRC - HACCP - GMP due diligence obligations of the bakery - confectionery - meat - fish - fruit - veg & pre-prepared meal sectors.<br>
          BST's new XDETECT material is one of the most detectable , strong and colourful plastic compounds available.<br>
          BST products made from XDETECT benefit from the following properties:<br>
          <ul>
            <li>Detectable & distinctive</li>
            <li>X-ray visible</li>
            <li>Robust & shatter resistant</li>
            <li>Anti-bacterial protection</li>
            <li>Food safe to FDA & EU standards</li>
          </ul>
          For more details please go to www.bst-detectable.com
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
    <div class="row">
      <div class="col">
        <h2 class="display-4 text-sm-center">Hi-Strength Rare Earth Magnets & On-Site Gauss Testing</h2>
        <p class="lead">
          Greenwood Magnetics is a 3rd generation family run business that was set up in 1948.<br>
          They supply to food, pharma, powder handling & plastics companies globally.<br>
          Greenwood can offer bespoke magnetic separation solutions at a reasonable cost.<br>
          Rare Earth magnets guard against ferrous / paramagnetic contaminants (down to sub-micron size) to reduce the risk of a costly product recall and / or damage to machinery.<br>
          For more details please go to www.greenwoodmagnetics.com

        </p>
      </div>
      <div class="col">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/bsyyC0ZBePY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>


  <div id="contact" class="container pt-5">
    <div class="row">
      <div class="col">
        <h2 class="display-3 text-center"><span style=" color: red">Contact Us</span></h2>
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
        <?php echo  $result; ?>
      </div>
      </div>

      <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">

        <h4 class="modal-title">Enquiry Form</h4>
      </div>
      <div class="modal-body">
        <form action="#contact" method="post">

          <div class="form-group">
          <input type="text"  id="name" name="name" placeholder="Name" required>
        </div>
        <div class="form-group">
          <input type="text" id="phone" name="phone" placeholder="Contact Number">
          </div>

          <div class="form-group">
          <input type="text" id="email" name="email" placeholder="Email Address" required>
          </div>
          <div class="form-group">
          <textarea cols="21" rows="7" id="comment" name="comment" placeholder="Message" required></textarea>
          </div>
          <div class="form-group">
            <p>Product areas of interest (tick box)</p>
            <input type="checkbox" id="rareEarthMagnets" name="rareEarthMagnets" value="Rare Earth Magnets">
            <label for="rareEarthMagnets">Rare Earth Magnets</label><br>
            <input type="checkbox" id="magnetTesting" name="magnetTesting" value="Magnet Testing">
            <label for="magnetTesting">Magnet Testing</label><br>
            <input type="checkbox" id="detectableProducts" name="detectableProducts" value="Detectable Products">
            <label for="rareEarthMagnets">Detectable Products</label><br>
          </div>
          <div class="form-group">
          <input type="submit" name="Submit" value="Submit" >
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
</body>
</html>
