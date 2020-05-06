<!DOCTYPE html>
<html lang="en">
<!--author: Reforest Sri Lanka | 05-2020-->
<?php
/////loading google sheets api to load past and upcoming events data. replace with your own data source
require_once 'google/vendor/autoload.php';
require_once 'google/vendor/googlesheetdata.php'; //gsheetid

$client = new \Google_Client();
$client->setApplicationName('reforestweb');
$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
//LIVE SITE: $client->setAuthConfig(__DIR__ . '/google/reforestwebsite-f4325a8b651f.json');
$client->setAuthConfig(__DIR__ . '\google\reforestwebsite-f4325a8b651f.json'); 
$service = new Google_Service_Sheets($client);
$range = 'Sheet1!A2:E';
$response = $service->spreadsheets_values->get($spreadsheetId, $range);
$values = $response->getValues();
////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<head>
  <title>Reforest Sri Lanka - Sri Lanka's largest citizen driven reforestation movement</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="main.css">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
</head>

<body>

    <nav class="navbar navbar-expand-md">
        <a class="navbar-brand" href="images/small_logo.png">Reforest Sri Lanka</a>
        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main-navigation">
            <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link nvvolunteer" href="#">Volunteer</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nvsponsor" href="#">Sponsor</a>
            </li>
              <li class="nav-item">
                  <a class="nav-link nvbmerc" href="#">Merchandise</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link nvbplants" href="#">Order Plants</a>
              </li>
            </ul>
        </div>
    </nav>

    <header class="page-header header container-fluid">
      <div class="overlay"></div>
      <div class="description">
        <h1>Volunteer with us</h1>
        <p>Help us reforest earth, one tree at a time.</p>
        <button class="btn btn-outline-secondary btn-lg" data-toggle="modal" data-target="#tellMore">Become a member!</button>
      </div>
      <div class="modal fade bd-example-modal-xl" id="tellMore" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Join us</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-12">
                  <p>Change begins with you. Join us to be a part of the global green change.</p>
                  <div class="iframe-container">
                  <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSfZ0q9RhAaKn-ES9FztENeQVB-ia4Izsl5eoR0_l8I5lUyBcQ/viewform?embedded=true">Loading…</iframe>
                </div></div>
              </div>  
            </div>
          </div>
        </div>
      </div>        
    </header>
    <div class="container features">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">How it all started</h3>
            <img src="images/column-1.jpg" class="img-fluid">
            <p>We are a product of humanity's greatest worth, hope. We also believe that, as earth's most intelligent species, we should act to protect all life on earth. 
              Sadly earth's devastation is also one of our own creations. And it's vital we correct our mistakes. It all began, when our founders selected one idea of a team member to plant 500 trees in the last quarter of 2015.

            </p>
            <p class="read-more">Read More...</p>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title">Where we are going</h3>
            <img src="images/column-2.jpg" class="img-fluid">
            <p>While expanding our community of members as well as the number of trees planted, we now understand that it is more about conservation of what is left than tree planting anew. 
              Our vision now encompasses broader actions, going so far as to automate the Ministry of Environment and seek legal reforms to help combat illegal activities. We also have refined a sustainable land use policy for Sri Lanka, and earth.</p>
            <p class="read-more">Read More...</p>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-12">    
            <h3 class="feature-title">Get in Touch!</h3>
            <div id="mail-status"></div>
            <form>
            <div class="form-group">
            <input type="text" class="form-control" placeholder="Name" id="userName" name="userName">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" id="userEmail" name="userEmail" placeholder="Enter email">
             
            </div>
            <div class="form-group">
            <input type="phone" class="form-control" placeholder="Phone Number" name="phoneNumber" id="phoneNumber">
            </div>
            <div class="form-group">
            <textarea class="form-control" name="msg" id="msg" rows="4"></textarea>
            </div>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email/ number with anyone else.</small>
            <button type="submit" class="btn btn-block" onClick="sendContact();">Submit</button>
          </form>
          </div>
        </div> 
      </div>

      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="panel panel-primary" id="result_panel">
              <div class="panel-heading">
                <h3 class="panel-title">Upcoming events</h3>
                <p>We might be planting near you, join us.</p>
              </div>
              <div class="panel-body">
              <p>All events postponed due to Covid-19</p>
            </div>
          </div>

          </div>

          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="panel panel-primary" id="result_panel">
              <div class="panel-heading">
                <h3 class="panel-title">Past events</h3>
                <p>Have we planted trees near you? Send us a site update.</p>
              </div>
              <div class="panel-body">
              <ul class="list-group">
                <?php
                if (empty($values)) {
                    print 'No data found.';
                 } else {
                    $values1 = array_reverse($values);
                    foreach ($values1 as $row) {
                      //phase 2: load event map locations using gps points of events and show location name
                        echo '<li style="font-size:11px" class="list-group-item eventlist">'.$row[0].' - '.$row[1].'</li>';
                    }
                 }
                ?>
              </ul>
            </div>
          </div>

        </div>

        <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="panel-title">Member Profiles</h3>
            <img src="images/profiles.jpg" class="img-fluid">
            <p>
              We are a product of many many people's contributions, over 11,000 people have volunteered with us. 
              From children, univeristy students, engineers, doctors, software people, architects, peons, businessmen,
              plumbers, labourers to any citizen of earth who feel for others as they do for themselves. 

              See our member profiles and see how we all want and do work for a better planet which is sustainable.
            </p>
            <p class="read-more">Read More...</p>
          </div>
        </div> 
      </div>

      <div class="container cost">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12">
          <h3 class="feature-title section-title">How much does it cost?</h3>
            <p>
Planting trees with volunteers is the most cost effective method to plant trees. There are a multitude of benefits other than cost which include stronger environmental advocacy from partipants, awareness creation, ethical & honest reporting  etc. 
We also use modern equipment including Earth Augers to ensure we carry out tree planting activities efficiently while guaranteeing the best possible outcomes. Cost of each plant goes into the following budget lines.

              <ul>
                <li>Cost of Trees and their logistics</li>
                <li>Event coordination & approval processing</li>
                <li>Volunteer transport and sustenance</li>
                <li>Land preparation and maintainance</li>
                <li>5% for organizations’ administration</li>
              </ul>
            </p>

            <!-- <div class="d-flex justify-content-center">
            <button class="btn btn-primary btn-lg">See our financial reports</button></div>  -->

          </div> 
          
          <div class="col-lg-6 col-md-6 col-sm-12 costoftrees">
            <img src="images/tree.jpg" alt="cost of tree planting"/>
          </div> 
          
        </div> 
      </div>


      <div class="container sponsor">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12">
            <h3 class="feature-title section-title">Sponsoring Trees</h3>
            <p>We work with leading corporates, individuals and entrepreneurs in creating a better world for all of us. 
              Our code of ethics ensures that we do not partner with corporations related to liquor, mini-hydro power, tobacco industries. However,  we do partner with environmentally unsustainable but necessary segments like cement, oil and gas because these industries are still important for us while we transition to sustainable building materials and clean renewable energy sources. And they should give back more to conservation.
            </p>
           <!-- <div class="d-flex justify-content-center">
            <button class="btn btn-primary btn-lg">Sponsor Trees</button></div> -->
          </div>  

          <div class="col-lg-6 col-md-6 col-sm-12 costoftrees">
            <img src="images/sponsors.jpg" class="img-fluid" alt="cost of tree planting"/>
          </div> 

        </div> 
      </div>

      <div class="container volunteer">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12">
            <h3 class="feature-title section-title">Why volunteers matter</h3>
            <p>Volunteers are the heart and soul of Reforest Sri Lanka. We strongly believe that environmental conservation should always be led and carried out by volunteers. Well known international agencies have failed for decades at conservation because their goals are overshadowed by the need to earn more and more to saddle bag employee payments, travel budgets and unnecessary gatherings of bureaucrats at leading hotels. 
              
            This is where you come in; yes, you are important because all of us are needed to be part  of this change.
            </p>
            <!-- <div class="d-flex justify-content-center">
            <button class="btn btn-primary btn-lg">Become a Volunteer Member</button></div>-->
          </div>  

          <div class="col-lg-6 col-md-6 col-sm-12 costoftrees">
            <img src="images/volunteers.jpg" class="img-fluid" alt="cost of tree planting"/>
          </div>

        </div> 
      </div>

      <div class="container buyplants">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title section-title">Ordering plants from Reforest Sri Lanka</h3>
            <p>We source saplings from rural communities and farmers as a means of support and encouragement of the local communities. While most organizations would set up their own nurseries, we have ensured the communities earn sustainable income by outsourcing our production needs.
 
            </p>
           <!-- <div class="d-flex justify-content-center">
            <a href="#">See who potted your saplings</a></div> -->
            
          </div>  

          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="panel panel-primary" id="result_panel">
              <div class="panel-heading">
                <h3 class="feature-title section-title">Buy Plants</h3>
              </div>
              <div class="panel-body">
              
                <div class="plantslider">
                  <div><h5>Mee</h5>
                    <img src="images/mee.jpg" class="" alt="Mee tree">
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <button type="button" class="btn btn-secondary 15ft" data-toggle="modal" data-target="#mee">Rs.100</button>
                      <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#mee">Rs.250</button>
                    </div>                 
                  </div>

                  <div><h5>Kumbuk</h5>
                    <img src="images/kumbuk.jpg" class="" alt="Kumbuk tree">
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <button type="button" class="btn btn-secondary 15ft" data-toggle="modal" data-target="#kumbuk">Rs.100</button>
                      <button type="button" class="btn btn-secondary 2ft" data-toggle="modal" data-target="#kumbuk">Rs.250</button>
                    </div></div>

                  <div><h5>Ahala</h5>
                    <img src="images/ahala.jpg" class="" alt="Ahala tree">
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <button type="button" class="btn btn-secondary 15ft"  data-toggle="modal" data-target="#ahala">Rs.100</button>
                      <button type="button" class="btn btn-secondary 2ft"  data-toggle="modal" data-target="#ahala">Rs.250</button>
                    </div></div>

                  <div><h5>Karanda</h5>
                    <img src="images/karanda.jpg" class="" alt="Karanda tree">
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <button type="button" class="btn btn-secondary 15ft"  data-toggle="modal" data-target="#karanda">Rs.100</button>
                      <button type="button" class="btn btn-secondary 2ft"  data-toggle="modal" data-target="#karanda">Rs.250</button>
                    </div></div>

                  <div><h5>Kohomba</h5>
                    <img src="images/kohomba.jpg" class="" alt="Kohomba tree">
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <button type="button" class="btn btn-secondary 15ft"  data-toggle="modal" data-target="#kohomba">Rs.100</button>
                      <button type="button" class="btn btn-secondary 2ft"  data-toggle="modal" data-target="#kohomba">Rs.250</button>
                    </div></div>

                  <div><h5>Kos</h5>
                    <img src="images/kos.jpg" class="" alt="Kos tree - jack fruit tree">
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <button type="button" class="btn btn-secondary 15ft"  data-toggle="modal" data-target="#kos">Rs.100</button>
                      <button type="button" class="btn btn-secondary 2ft"  data-toggle="modal" data-target="#kos">Rs.250</button>
                    </div></div>

                    <div><h5>Kon</h5>
                    <img src="images/kon.jpg" class="" alt="Kon tree">
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <button type="button" class="btn btn-secondary 15ft "  data-toggle="modal" data-target="#kon">Rs.100</button>
                      <button type="button" class="btn btn-secondary 2ft"  data-toggle="modal" data-target="#kon">Rs.250</button>
                    </div></div>
                </div> 

                <div class="content">
                 <p style="text-align:center; font-seize:10px; margin-top:20px;">Click on a plant's price tag to place an order.</p>
                </div>

                <!-- Plant modal -->
                <?php include 'trees_include.php';?>
                <!-- /Plant-modal -->
              
              </div>  
            </div> 
          </div>
        
        </div>
      </div>

      <div class="container buymerchandise">
        <div class="row">

          <div class="col-lg-4 col-md-4 col-sm-12">
            <h3 class="feature-title section-title">Support us - Get Merchandise</h3>

            <img src="images/reforest-tshirt-models.jpg" class="img-fluid">

            <p>All proceeds goto sustainable initiatives of Reforest Sri Lanka</p>

            
            <p>Yes fabric is not sustainable,.. but out Tshirts are made from recycled plastic. 
              Get yours today!!!
            </p>

           </div>
           
           
              <div class="col-lg-8 col-md-8 col-sm-12"> 
              <h5 class="feature-title section-title">Reforester T-Shirts, Jerseys, Caps and Hats</h5> 
                
              <div class="tshirtslider">
              
                <div>
                  <img src="images/tree.jpg" class="" alt="Reforest Sri Lanka Tshirt">
                </div>
                <div>
                  <img src="images/tree.jpg" class="" alt="Reforest Sri Lanka Tshirt">
                </div>
                <div>
                  <img src="images/tree.jpg" class="" alt="Reforest Sri Lanka Tshirt">
                </div>
                <div>
                  <img src="images/tree.jpg" class="" alt="Reforest Sri Lanka Tshirt">
                </div>
                
              </div>
              <div class="content">    
                <button class="btn btn-outline-secondary btn-lg" data-toggle="modal" data-target="#orderMerchandise">Place your order!</button>
              </div>

              <div class="modal fade bd-example-modal-xl" id="orderMerchandise" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Join us</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                      <!-- <div class="col-5">
                        <img src="images/tree.jpg" class="img-fluid rounded" alt="Reforest Sri Lanka Tshirt">
                      </div> -->
                      <div class="col-12">
                        <p>Place your merchandise order below (remember to wear this for 5 years to reduce consumption of resources)</p>
                        <div class="iframe-container">
                        <iframe style="width:100%; height:100%;" src="https://docs.google.com/forms/d/e/1FAIpQLSeZw0ddxeDfpUdDzbmB4eMpvQtldqqxogUjgmsrRqlMXMDvjQ/viewform?embedded=true" >Loading…</iframe>
                        </div>

                        </div></div>
                    </div>  
                  </div>
                  </div>
                </div>
                </div>
                </div>  

              
            
            </div>  
        </div> 
      </div>




  <footer class="page-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12">
        <h6 class="text-uppercase font-weight-bold">Additional Information</h6>
        <p>We are citizen first, flat structured and action oriented. Join us and be a climate warrior.</p>
        <p>Read our articles of association to know how we keep to strict transparency protocols, envionmental conservation is not for profit</p>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12">
        <h6 class="text-uppercase font-weight-bold">Contact</h6>
        <p>335A, Sangabogama Rd, Angunawala, Peradeniya
        <br/>info@reforestsrilanka.com
        <br/>+94772834561
        <br/>+94714530990</p>
      </div>
    </div>
    <div class="footer-copyright text-center">© 2020 Copyright: Reforest Sri Lanka</div>
  </footer>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="js/main.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <script type="text/javascript">

    $('.plantslider').slick({
      slidesToShow: 6,
      slidesToScroll: 1,
      autoplay: false,
      arrows: false,
      responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
    });


    $('.tshirtslider').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: false,
    });


    $(".nvvolunteer").click(function() {
    $('html, body').animate({
        scrollTop: $(".volunteer").offset().top
    }, 2000);
    });

    $(".nvsponsor").click(function() {
    $('html, body').animate({
        scrollTop: $(".sponsor").offset().top
    }, 2000);
    });

    $(".nvbplants").click(function() {
    $('html, body').animate({
        scrollTop: $(".buyplants").offset().top
    }, 2000);
    });

    $(".nvbmerc").click(function() {
    $('html, body').animate({
        scrollTop: $(".buymerchandise").offset().top
    }, 2000);
    });

    function sendContact() {
    //var valid;	
    //valid = validateContact();
    //if(valid) {
        jQuery.ajax({
            url: "sendmail.php",
            data:'userName='+$("#userName").val()+'&userEmail='+
            $("#userEmail").val()+'&subject='+
            $("#subject").val()+'&content='+
            $(content).val(),
            type: "POST",
            success:function(data){
                $("#mail-status").html(data);
            },
            error:function (){}
        });
    //}
}

  </script>

</body>
</html>