<?php
namespace Phppot;

class Config
{

    const ROOT_PATH = "http://localhost/stripe-apple-pay/";

    /* Stripe API test keys */
    const STRIPE_PUBLISHIABLE_KEY = "";

    const STRIPE_SECRET_KEY = "";

    const STRIPE_WEBHOOK_SECRET = "";

    const RETURN_URL = Config::ROOT_PATH . "/success.php";

    /* PRODUCT CONFIGURATIONS BEGINS */
    const PRODUCT_NAME = 'A6900 MirrorLess Camera';

    const PRODUCT_IMAGE = Config::ROOT_PATH . '/images/camera.jpg';

    const PRODUCT_PRICE = '289.61';

    const CURRENCY = 'usd';

    const US_SHIPPING = 7;

    const UK_SHIPPING = 12;
}
