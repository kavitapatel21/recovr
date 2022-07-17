<?php
/* Child theme generated with WPS Child Theme Generator */

if (!function_exists('b7ectg_theme_enqueue_styles')) {
    add_action('wp_enqueue_scripts', 'b7ectg_theme_enqueue_styles');

    function b7ectg_theme_enqueue_styles()
    {
        wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
        wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
    }
}


add_action('wp_footer', 'wp_result_page_script');
function wp_result_page_script()
{
?>
    <script>
        jQuery('.app_button').on('click', function() {
            alert("here");
            // function for add lead event for facebook pixel start
            console.log("viewcontent for facebook pixel");
            var getsessionemail = "test@gmail.com"; //window.sessionStorage.getItem("step_email");
            var getsessionname = "kavita"; //window.sessionStorage.getItem("step_name");
            var getsessionlastname = "patel"; //window.sessionStorage.getItem("step_lastname");
            jQuery.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                data: {
                    'action': 'lead_event',
                    'firstname': getsessionname,
                    'lastname': getsessionlastname,
                    'email': getsessionemail,
                },
                success: function(response) {
                    console.log("success");
                }
            });
            // function for add lead event for facebook pixel end
        });
    </script>
<?php
}

// function for add lead for facebook pixel start
add_action('wp_ajax_lead_event', 'lead_event_callback');
add_action('wp_ajax_nopriv_lead_event', 'lead_event_callback');
function lead_event_callback()
{
    //echo 'here';
    //die;
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $fullURL = 'https://recovr.com/download/?=landing';
    $emailhased = hash('SHA256', $email);
    $fn = hash('SHA256', $fname);
    $ln = hash('SHA256', $lname);
    $time = time();
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://graph.facebook.com/v14.0/684242939375861/events?access_token=EAAKYCQBdU44BAABTDUHYd3ZCo1gOigWr1uNNqKWZCMIxKxhfqjEr11IuoM1NG698EBhOpOv6r2GhnNVbsbVNq4wTUy43r9W4MEEl1ZAJT4LZCUhZBZBO7vqqd2nZCejUiES3pdP6kCNEHb2qsBRagU4MZC5QKQFnZAhs0NRH1eyPicnZB7KsoZC17oK%0A',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
            "data": [
                {
                    "event_name": "Lead",
                    "event_time": "' . $time . '",
                    "action_source": "email",
                    "event_source_url"  : "' . $fullURL . '",
                    "user_data": {
                        "em": [
                            "' . $emailhased . '"
                        ],
                        "fn": [
                            "' . $fn . '"
                        ],
                        "ln": [
                            "' . $ln . '"
                        ],
                    },
                    "custom_data": {
                        "name": "download-landing-page",
                    }
                
                }
            ]
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    return true;
}

// function for add lead for facebook pixel start end

add_action('wp_footer', 'wp_result_page');
function wp_result_page()
{
?>
    <script>
        jQuery('#payment_btnn').on('click', function() {
            alert("here");
            var fname = jQuery('#fname').val();
            var lname = jQuery('#lname').val();
            var email = jQuery('#inputEmail4').val();
            var cardnumber = jQuery('#cardnumber').val();
            var month = jQuery('#month').val();
            var year = jQuery('#year').val();
            var cvv = jQuery('#cvv').val();
            jQuery.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                data: {
                    'action': 'event',
                    'firstname': fname,
                    'lastname': lname,
                    'email': email,
                    'cardnumber': cardnumber,
                    'month': month,
                    'year': year,
                    'cvv': cvv,
                },
                success: function(response) {
                    console.log(response);
                    if (response === false) {
                        $("#error").html("invalid card details");
                    }
                }
            });
        });
    </script>
<?php
}

// function for add lead for facebook pixel start
add_action('wp_ajax_event', 'lead_event');
add_action('wp_ajax_nopriv_event', 'lead_event');
function lead_event()
{
    //echo '<pre>';
    //print_r($_POST);
    $fname = $_POST['firstname'];
    $email = $_POST['email'];
    $card_type = 'card';
    $card_numner = $_POST['cardnumber'];
    $exmonth = $_POST['month'];
    $exyear = $_POST['year'];
    $cvv = $_POST['cvv'];
    $subscribe_id = "price_1L7z8HGSLZI5qKJBIY1R3Tjt";

    //Curl start for check customer already exist or not
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.stripe.com/v1/customers',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_POSTFIELDS => 'email=' . $email . '',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer sk_test_51KMnalGSLZI5qKJB7ANMSnomf1xE8BcIIBotP1mMtpnpiCj0DMVVhlBrLDX3Eg20CURzSjUcR9GhTn0NTbNwbcxG00syBBR6Wi',
            'Content-Type: application/x-www-form-urlencoded'
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($response, TRUE);
    //print_r($result);
    //Curl end for check customer exist or not
    
    if ($result['data'][0]['id']) {
        $customer_id = $result['data'][0]['id'];
        //echo 'customer already exist';
    } else {
        //echo 'create cutomer';
        // Curl Call For Create Customer in strip start 
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.stripe.com/v1/customers',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'name=' . $fname . ' & email=' . $email . '',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer sk_test_51KMnalGSLZI5qKJB7ANMSnomf1xE8BcIIBotP1mMtpnpiCj0DMVVhlBrLDX3Eg20CURzSjUcR9GhTn0NTbNwbcxG00syBBR6Wi',
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($response, TRUE);
        $customer_id = $result['id'];
        // Curl Call For Create Customer in strip end 
    }

    // For Create a PaymentMethod START
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.stripe.com/v1/payment_methods',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => 'type=' . $card_type . '&card%5Bnumber%5D=' . $card_numner . '&card%5Bexp_month%5D=' . $exmonth . '&card%5Bexp_year%5D=' . $exyear . '&card%5Bcvc%5D=' . $cvv . '',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer sk_test_51KMnalGSLZI5qKJB7ANMSnomf1xE8BcIIBotP1mMtpnpiCj0DMVVhlBrLDX3Eg20CURzSjUcR9GhTn0NTbNwbcxG00syBBR6Wi',
            'Content-Type: application/x-www-form-urlencoded'
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($response, TRUE);
    $payment_id = $result['id'];
    if ($result['id'] == '') {
        echo 'false';
        exit;
    }
    // print_r($result);
    // For Create a PaymentMethod END

    //Attach a PaymentMethod to a Customer STRT
    // IN URL You must pass Create a PaymentMethod response id like pm_1L8kAqGSLZI5qKJBrDDH59eQ and customer id in post data
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.stripe.com/v1/payment_methods/' . $payment_id . '/attach',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => 'customer=' . $customer_id,
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer sk_test_51KMnalGSLZI5qKJB7ANMSnomf1xE8BcIIBotP1mMtpnpiCj0DMVVhlBrLDX3Eg20CURzSjUcR9GhTn0NTbNwbcxG00syBBR6Wi',
            'Content-Type: application/x-www-form-urlencoded'
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($response, TRUE);
    $createdDate = $result['created'];
    $timestamp = strtotime('+7 days', $createdDate);
    //print_r($result);
    //die;
    //Attach a PaymentMethod to a Customer END

    //Create a subscription START
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.stripe.com/v1/subscriptions',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => 'customer=' . $customer_id . '&items%5B0%5D%5Bprice%5D=' . $subscribe_id . '&default_payment_method=' . $payment_id . '&trial_end=' . $timestamp . '',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer sk_test_51KMnalGSLZI5qKJB7ANMSnomf1xE8BcIIBotP1mMtpnpiCj0DMVVhlBrLDX3Eg20CURzSjUcR9GhTn0NTbNwbcxG00syBBR6Wi',
            'Content-Type: application/x-www-form-urlencoded'
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $result_subscriptions = json_decode($response, TRUE);

    $subscription_id = $result_subscriptions['id'];
    $subscriptionExpiredDate = date('Y-m-d H:i:s', $result_subscriptions['current_period_start']);
    $subscriptionPurchaseDate = date('Y-m-d H:i:s', $result_subscriptions['current_period_end']);
    print_r($response);

    //Create a subscription END

}
