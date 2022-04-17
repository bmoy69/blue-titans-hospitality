<?php
/*
Template Name: Smoobu properties
Author: Vasileios Moysidis
Description: this is a custom page template which uses API communication with both Smoobu and Google Drive.
It gets the Property ID and property name from Smoobu and retrieves the corresponding photo stored with the property ID number in Google Drive. 
*/

//Show the header of your WordPress site so the page does not look out of place
get_header();
?>
<style>
  @media screen and (min-width: 1025px) {
    .apartment {
      width: 30%;
    }

  }

  @media screen and (max-width: 1024px) {
    .apartment {
      width: 40%;
    }
    .title {
      font-size: 80%;
	}
  }

  .site-main {
    text-align: center;
    position: relative;
    margin-bottom: 30px;
  }

  .all-apartments {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
  }

  .apartment {
	position: relative;
    padding: 1%;
    float: left;
    justify-content: center;
    align-items: center;
  }

  .apartment-title{
    top: 40px;
    position: absolute;
    background: rgba(0, 113, 130, .4);
    margin: auto;
    width: 94%;
  }
	
  .title {
	color: white;
  }

  .photo {
    max-width: 100%;
	margin-top: 25px;  
    /* border-radius: 15px; */
  }

  #toggle-area {
    float: right;
    position: relative;
    top: 8px;
    right: 6px;
    width: 35px;
    height: 35px;
  }

  #toggle-titan {
    float: right;
    position: relative;
    top: 8px;
    right: 6px;
    width: 35px;
    height: 35px;
  }

  #toggle-map {
    float: right;
    position: relative;
    top: 8px;
    right: 6px;
    width: 35px;
    height: 35px;
  }

  #popout-area {
    top: 165px;
    position: fixed;
    height: 50px;
    width: 260px;
    background: rgb(0, 113, 130);
    background: rgba(0, 113, 130, .9);
    color: white;
    left: -215px;
    border-radius: 15px;
    z-index: 10;
  }

  #popout-area {
    overflow-y: scroll;
    scrollbar-width: none;
    /* Firefox */
    -ms-overflow-style: none;
    /* Internet Explorer 10+ */
  }

  #popout-area::-webkit-scrollbar {
    /* WebKit */
    width: 0;
    height: 0;
  }

  #popout-titan {
    top: 220px;
    position: fixed;
    height: 50px;
    width: 260px;
    background: rgb(0, 113, 130);
    background: rgba(0, 113, 130, .9);
    color: white;
    left: -215px;
    border-radius: 15px;
    z-index: 5;
  }

  #popout-titan {
    overflow-y: scroll;
    scrollbar-width: none;
    /* Firefox */
    -ms-overflow-style: none;
    /* Internet Explorer 10+ */
  }

  #popout-titan::-webkit-scrollbar {
    /* WebKit */
    width: 0;
    height: 0;
  }

  #popout-map {
    top: 110px;
    position: fixed;
    height: 50px;
    width: 360px;
    background: rgba(0, 113, 130, .9);
    background-image: "http://www.bluetitanshospitality.com/wp-content/themes/getaway-child/images/Greece.png";
    color: white;
    left: -315px;
    border-radius: 15px;
    z-index: 20;
  }

  #popout-map {
    overflow-y: scroll;
    scrollbar-width: none;
    /* Firefox */
    -ms-overflow-style: none;
    /* Internet Explorer 10+ */
  }

  #popout-map::-webkit-scrollbar {
    /* WebKit */
    width: 0;
    height: 0;
  }

  #halkidiki {
    top: 120px;
    left: 142px;
    position: absolute;
  }

  #pelion {
    top: 170px;
    left: 138px;
    position: absolute;
  }

  #pella {
    top: 100px;
    left: 100px;
    position: absolute;
  }

  #serres {
    top: 85px;
    left: 130px;
    position: absolute;
  }

  #volvi {
    top: 100px;
    left: 153px;
    position: absolute;
  }

  .nav-menu li {
    border-top: 3px solid #eee;
    padding-left: 25px;
    width: 100%;
    list-style-type: none;
    text-align: start;
    font-weight: 600;
  }

  .nav-sub-menu li {
    border-top: 1px solid #eee;
    padding-left: 50px;
    width: 100%;
    list-style-type: none;
    text-align: start;
    font-weight: 200;
  }

  .nav-menu li:hover {
    background: #CCC;
  }

  .nav-menu a li {
    color: #FFF;
    text-decoration: none;
    width: 100%;
  }
</style>

<div id="primary" class="content-area">
  <main id="main" class="site-main">
    <div id="popout-area">
      <div id="toggle-area">
        <img src="http://www.bluetitanshospitality.com/wp-content/themes/getaway-child/images/searchbyarea.png" alt="Show" />
      </div>
      <h4 style="color: white">Search by area</h4>
      <ul class="nav-menu" style="height:15px">
        <a href="https://www.bluetitanshospitality.com/properties">
          <li>All Properties</li>
        </a>
      </ul>
      <ul class="nav-menu">
        <a href="https://www.bluetitanshospitality.com/properties/?area=Halkidiki">
          <li>Halkidiki</li>
        </a>
        <ul class="nav-sub-menu">
          <a href="https://www.bluetitanshospitality.com/properties/?area=Afytos">
            <li>Afytos</li>
          </a>
          <a href="https://www.bluetitanshospitality.com/properties/?area=Katsari">
            <li>Katsari</li>
          </a>
          <a href="https://www.bluetitanshospitality.com/properties/?area=Kriopigi">
            <li>Kriopigi</li>
          </a>
          <a href="https://www.bluetitanshospitality.com/properties/?area=Marmaras">
            <li>Marmaras</li>
          </a>
          <a href="https://www.bluetitanshospitality.com/properties/?area=Mendi">
            <li>Mendi</li>
          </a>
          <a href="https://www.bluetitanshospitality.com/properties/?area=Pefkochori">
            <li>Pefkochori</li>
          </a>
          <a href="https://www.bluetitanshospitality.com/properties/?area=Polychrono">
            <li>Polychrono</li>
          </a>
          <a href="https://www.bluetitanshospitality.com/properties/?area=Posidi">
            <li>Posidi</li>
          </a>
          <a href="https://www.bluetitanshospitality.com/properties/?area=Sane">
            <li>Sane</li>
          </a>
          <a href="https://www.bluetitanshospitality.com/properties/?area=Siviri">
            <li>Siviri</li>
          </a>
          <a href="https://www.bluetitanshospitality.com/properties/?area=Vourvourou">
            <li>Vourvourou</li>
          </a>
        </ul>
        <a href="https://www.bluetitanshospitality.com/properties/?area=Pella">
          <li>Pella</li>
        </a>
        <ul class="nav-sub-menu">
          <a href="https://www.bluetitanshospitality.com/properties/?area=Palaios_Agios_Athanasios">
            <li>Palaios Agios Athanasios</li>
          </a>
        </ul>
        <a href="https://www.bluetitanshospitality.com/properties/?area=Pelion">
          <li>Pelion</li>
        </a>
        <ul class="nav-sub-menu">
          <a href="https://www.bluetitanshospitality.com/properties/?area=Agios_Georgios">
            <li>Agios Georgios</li>
          </a>
          <a href="https://www.bluetitanshospitality.com/properties/?area=Mouresi">
            <li>Mouresi</li>
          </a>
          <a href="https://www.bluetitanshospitality.com/properties/?area=Pinakates">
            <li>Pinakates</li>
          </a>
        </ul>
        <a href="https://www.bluetitanshospitality.com/properties/?area=Serres">
          <li>Serres</li>
        </a>
        <ul class="nav-sub-menu">
          <a href="https://www.bluetitanshospitality.com/properties/?area=Ano_Poroia">
            <li>Ano Poroia</li>
          </a>
        </ul>
        <a href="https://www.bluetitanshospitality.com/properties/?area=Volvi">
          <li>Volvi</li>
        </a>
        <ul class="nav-sub-menu">
          <a href="https://www.bluetitanshospitality.com/properties/?area=Stavros">
            <li>Stavros</li>
          </a>
        </ul>
      </ul>
    </div>

    <div id="popout-titan">
      <div id="toggle-titan">
        <img src="http://www.bluetitanshospitality.com/wp-content/themes/getaway-child/images/searchbytitan.png" alt="Show" />
      </div>
      <h4 style="color: white">Search by Titan</h4>
      <ul class="nav-menu" style="height:15px">
        <a href="https://www.bluetitanshospitality.com/properties">
          <li>All Properties</li>
        </a>
      </ul>
      <ul class="nav-menu">
        <a title="Apartments up to 200m close to the beach" href="https://www.bluetitanshospitality.com/properties/?titan=OCEANUS">
          <li>OCEANUS</li>
        </a>
        <a title="Apartments above 200m from the beach" href="https://www.bluetitanshospitality.com/properties/?titan=THEIA">
          <li>THEIA</li>
        </a>
        <a title="Apartments on a mountain" href="https://www.bluetitanshospitality.com/properties/?titan=RHEA">
          <li>RHEA</li>
        </a>
      </ul>
    </div>

    <div id="popout-map">
      <div id="toggle-map">
        <img src="http://www.bluetitanshospitality.com/wp-content/themes/getaway-child/images/searchbymap.png" alt="Show" />
      </div>
      <h4 style="color: white">Greece</h4>
      <div>
        <img src="http://www.bluetitanshospitality.com/wp-content/themes/getaway-child/images/Greece.png" alt="Show" />
      </div>
      <div id="halkidiki">
        <a title="Halkidiki" href="https://www.bluetitanshospitality.com/properties/?area=Halkidiki">
          <img src="http://www.bluetitanshospitality.com/wp-content/themes/getaway-child/images/pin.png" alt="Show" />
        </a>
      </div>
      <div id="pelion">
        <a title="Pelion" href="https://www.bluetitanshospitality.com/properties/?area=Pelion">
          <img src="http://www.bluetitanshospitality.com/wp-content/themes/getaway-child/images/pin.png" alt="Show" />
        </a>
      </div>
      <div id="pella">
        <a title="Pella" href="https://www.bluetitanshospitality.com/properties/?area=Pella">
          <img src="http://www.bluetitanshospitality.com/wp-content/themes/getaway-child/images/pin.png" alt="Show" />
        </a>
      </div>
      <div id="serres">
        <a title="Serres" href="https://www.bluetitanshospitality.com/properties/?area=Serres">
          <img src="http://www.bluetitanshospitality.com/wp-content/themes/getaway-child/images/pin.png" alt="Show" />
        </a>
      </div>
      <div id="volvi">
        <a title="Volvi" href="https://www.bluetitanshospitality.com/properties/?area=Volvi">
          <img src="http://www.bluetitanshospitality.com/wp-content/themes/getaway-child/images/pin.png" alt="Show" />
        </a>
      </div>
    </div>


    <?php
    if (isset($_GET['area'])) {
      $filter = filter_input(INPUT_GET, 'area', FILTER_SANITIZE_URL);
      // echo "<script type='text/javascript'>alert('before $filter');</script>";
      $filter = str_replace("_", " ", $filter);
      // echo "<script type='text/javascript'>alert('after $filter');</script>";
    } else if (isset($_GET['apartments'])) {
      $filter = filter_input(INPUT_GET, 'apartments', FILTER_SANITIZE_URL);
      $filter = str_replace("_", " ", $filter);
    } else if (isset($_GET['titan'])) {
      $filter = filter_input(INPUT_GET, 'titan', FILTER_SANITIZE_URL);
    } else {
      // Fallback behaviour goes here 
    }
    ?>
    <h2>Blue Titans Hospitality <?php echo (isset($_GET['titan'])) ? $filter : '' ?> apartments <?php echo (isset($_GET['area'])) ? 'in ' . $filter : '';
                                                                                                echo (isset($_GET['apartments'])) ? '- ' . $filter : ''; ?></h2>

    <div id="apartmentIframeAll">
      <script type="text/javascript" src="https://login.smoobu.com/js/Settings/BookingToolIframe.js"></script>
      <script>
        BookingToolIframe.initialize({
          "url": "https://login.smoobu.com/en/booking-tool/iframe/188685",
          "baseUrl": "https://login.smoobu.com",
          "target": "#apartmentIframeAll"
        })
      </script>
    </div>

    <div>
      <h3 style="padding-left:20px; padding-right:20px;">Click on the pictures below to see details for each property and booking availability</h3>
    </div>

    <?php
    // ********************** Get the token from Google Drive **************************
    $service_key = json_decode('{
      "type": "service_account",
      "project_id": "blue-titans-hosp-1607419360295",
      "private_key_id": "e10343c751c0f1e8bb9bb920ed98c5a868ca9576",
      "private_key": "-----BEGIN PRIVATE KEY-----\nMIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQDCFX7pnuGHXlQi\nmv2luCr0i3IRLAVQfo6TrWtDVYsus2+cX83mzxEbPZ9jeI8P8RNJxhP6hj1x4ILn\nuatlVyc5oWASmSU9wBxEk0XS6MsDExiZ7ebFhW+oKigrj5zkf/QbrlJjIRCfOMk1\n2pNrmugQ2ynST23WuAgahCxItK/ru0DYzx1rwFhOXFo31hkdpfD+0B2lBWKDW9bm\nLvxJRmWSN8ShBl+LtoAmEOnQXT1FtmmnhVcrijQcCNiSmHGAZtTIUiIre/MOWVzZ\n8snyAyHZyr+oSjcinct7QgWJF+DPKl593+STjpLyGTXTPOSrtDIUWeEukzNBYe85\nojL6ksVtAgMBAAECgf8GZKkgvW7ZMdIk/tQLx7vXjuCEDqStZZFxnbTL28FOZ2wa\nyNLWnbnzk0OEVFRxQUgIpHUZlOqwOh0zMg9AujSBaqf5y5DxSzrC56PE1UWLxeBW\nSrBiEMxuIzgDOx8TFilJkw7sCJdDJ8MMS32RYqm42EUuGzTnR8Y78P6j8LygoQSF\nnCc1X+mMXX7b2wbWptPicmJpYYvpJuV76DkA5n8UUkDNbIxkD6PUEtCnENMt0ves\nnbNGK/xPruIIStZ1dHfBeQCI1+q+XoWkx2J4gcp+opkY0oKp3hcL21hO2yo5mHnQ\n1psW37e6nFXvaaJGkB8jlRN3o/4W05DJrjdwayECgYEA9XRnGS8S6J62z3hwtk7y\naWZytevXDppthlIrGbYVYRGO4vSnuXjhpU3HnBzN/1GRYFpia1ENu76b9wSFahR1\nzH/0c+Mn6dAZAQcteu34GKg467FEArPl48+Z7mRorMo64KAu8g698kTpI4HMiCEb\ne0Ds6U9Wd9pENwy36H8BDisCgYEAymwZgTWYhZjHhvfx4UtK9cxMKKhQBBgQ+ezW\nlUexQptQs3jtzLNXwyxr6f2/3MzysHydw6zXn6iBMKMkz10bGgOaWukBJ1Iran6O\neaHM2nPZuMQA1Idh7WaDksJA0GEzwSMjtwoaWAuiNVF0hEjdwxDKTIIi+n6iV8iL\nDpUjRscCgYEAq5JMJqxi+TtH6cn0b1rL06UK9eL+lnSXrlZtTjGazBkr2bTOMLUw\ndQ3jQ1pXG+r2RXWoaf9kLCHWf1onr7jRhrrCMudLlQIjGDbeMZl53DJqZ0WnloQN\nY6pPnPWOvYk2kqElb4mieGB23pzyTQ1nWkZN09/jPy/QkvJO8zMjl7UCgYEAqlS6\nRXK/DDQaOaVsIONFiX3G3DN9WWSS7GtxyZ3RODYPe2YX3DdRc0du6y/+AaNn2ECU\nVLKdopidVTsC34b+Ji6/9R26Pcc0B2HFK+6NvYjcvVAZTr05FxY7QwQ4m+AfN7cE\n96IFtu7bKLiJLkNOcDUxtZ2QJ27l1q5G7Rdr3sMCgYAtQhihaDA4GM6zVaf3z/nc\nWZZDEeR1NV3ScYHR6+442b3dINkVN3ZRXSX8waKLtsH677p4f90wmnmxeaKiHFwH\nzdk38S7ZhMRfHHN56PKzmFoij6eaGSOrC8W0DfUqZENo+gckZDJ52Spw8KhyaVTa\nEp0UMspKK1rjilju/7CmYw==\n-----END PRIVATE KEY-----\n",
      "client_email": "bth-service-account@blue-titans-hosp-1607419360295.iam.gserviceaccount.com",
      "client_id": "112511276232090928611",
      "auth_uri": "https://accounts.google.com/o/oauth2/auth",
      "token_uri": "https://oauth2.googleapis.com/token",
      "auth_provider_x509_cert_url": "https://www.googleapis.com/oauth2/v1/certs",
      "client_x509_cert_url": "https://www.googleapis.com/robot/v1/metadata/x509/bth-service-account%40blue-titans-hosp-1607419360295.iam.gserviceaccount.com"
    }', true);

    // Takes 2 arguments, the service key as an array and the scope to authenticate.
    // You can find differenct API scopes here <https://developers.google.com/oauthplayground/>
    $gcp_service_account = new WPGoogleServiceAccount($service_key, 'https://www.googleapis.com/auth/drive');

    // Takes care of retrieving, storing, and refreshing the token as needed.
    $token  = $gcp_service_account->get_token();
    // **********************************************************************************

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://login.smoobu.com/api/apartments",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Api-Key: XyklSmNcHEshMWTl4bNB8gZuzgy~YGXy",
        "Cache-Control: no-cache"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      if ($debug) echo "cURL Error #:" . $err;
      else echo "Oops, something went wrong.  Please try again later.";
    } else {
      //Create an array of objects from the JSON returned by the API
      $jsonObj = json_decode($response);
      $apartObj = $jsonObj->apartments;
    ?>
      <div class='all-apartments'>
        <?php
        $multiCurl = array();
        $result = array();
        $mh = curl_multi_init();

        foreach ($apartObj as $i => $apart) {
          $multiCurl[$i] = curl_init();
          curl_setopt($multiCurl[$i], CURLOPT_URL, "https://www.googleapis.com/drive/v3/files?q=name%20contains%20%27" . $apart->id . "%27%20AND%20name%20contains%20%27fill%27");
          curl_setopt($multiCurl[$i], CURLOPT_RETURNTRANSFER, true);
          curl_setopt($multiCurl[$i], CURLOPT_FOLLOWLOCATION, true);
          curl_setopt($multiCurl[$i], CURLOPT_ENCODING, "");
          curl_setopt($multiCurl[$i], CURLOPT_MAXREDIRS, 10);
          curl_setopt($multiCurl[$i], CURLOPT_TIMEOUT, 30);
          curl_setopt($multiCurl[$i], CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
          curl_setopt($multiCurl[$i], CURLOPT_CUSTOMREQUEST, "GET");
          curl_setopt($multiCurl[$i], CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . $token,
          ));
          curl_multi_add_handle($mh, $multiCurl[$i]);
        }

        $index = null;
        do {
          curl_multi_exec($mh, $index);
        } while ($index > 0);

        // get content and remove handles
        foreach ($multiCurl as $k => $ch) {
          $result[$k] = curl_multi_getcontent($ch);
          $fileObj = json_decode($result[$k]);
          $src = "https://drive.google.com/uc?id=" . $fileObj->files[0]->id;
          // $siteUrl = 'https://blue-titans-hospitality.bookingturbo.com/en/apartment/' . str_replace(' ', '', $apartObj[$k]->name) . '/' . $apartObj[$k]->id;
          // $siteUrl = 'https://bluetitanshospitality.com/en/apartment/' . str_replace(' ', '', $apartObj[$k]->name) . '/' . $apartObj[$k]->id;
          $siteUrl = 'https://properties.bluetitanshospitality.com/en/apartment/' . str_replace(' ', '', $apartObj[$k]->name) . '/' . $apartObj[$k]->id;
          $space_pos = strpos($apartObj[$k]->name, " ") + 1;
		  $cut_pos = strrpos($apartObj[$k]->name, " in ");
		  $length = $cut_pos - $space_pos;
		  $titan = substr($apartObj[$k]->name, 0, $space_pos);
		  $pname = substr($apartObj[$k]->name, $space_pos, $length);
		  $parea = substr($apartObj[$k]->name, $cut_pos+3);
		  if (isset($_GET['area']) || isset($_GET['titan']) || isset($_GET['apartments'])) { // filter is applied
            if (strpos($apartObj[$k]->name, $filter) !== false) {
        ?>
            <div class='apartment'>
              <a href='<?php echo $siteUrl ?>' target="_blank">
				  <div class='apartment-title'>
					<h4 class="title"><strong><?php echo $pname ?></strong> </h4>
					<h4 class="title"><?php echo $parea ?></h4>
				  </div> <!-- apartment-title -->
                  <img class="photo" src='<?php echo $src ?>' />
			  </a>
            </div><!-- .apartment -->
            <?php
            }
          } else {	// no filter is applied
            ?>
            <div class='apartment'>
              <a href='<?php echo $siteUrl ?>' target="_blank">
				  <div class='apartment-title'>
					<h4 class="title"><strong><?php echo $pname ?></strong> </h4>
					<h4 class="title"><?php echo $parea ?></h4>
				  </div> <!-- apartment-title -->
                  <img class="photo" src='<?php echo $src ?>' />
			  </a>
            </div><!-- .apartment -->
        <?php
          }
          curl_multi_remove_handle($mh, $ch);
        }
        // close
        curl_multi_close($mh);
        ?>
      </div><!-- .all-appartments -->
    <?php
    } // end of check for curl error
    ?>
  </main><!-- #main -->
</div><!-- #primary -->
<?php
//Show the footer of the WordPress site to keep the page in context
get_footer();
