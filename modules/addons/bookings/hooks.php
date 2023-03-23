<?php
if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

use Carbon\Carbon;
use WHMCS\View\Menu\Item as MenuItem;

// Move the Contact Us to a dropdown option
add_hook('ClientAreaNavbars', 1, function ()
{
    // Get the current navigation bars.
    $primaryNavbar = Menu::primaryNavbar();
    $secondaryNavbar = Menu::secondaryNavbar();

if (!is_null($primaryNavbar->getChild('Contact Us'))){
 
    // Save the "Contact Us" link and remove it from the primary navigation bar.
    $contactUsLink = $primaryNavbar->getChild('Contact Us');
 
    // Add the book a call link to the link's drop-down menu.
    $contactUsLink->addChild('book-a-call', array(
        'label' => 'Book a Call',
        'uri' => '/index.php?m=bookings',
        'order' => 1,
        'icon' => 'far fa-fw fa-calendar',
    ));
 
    // Add the normal contact page link.
    $contactUsLink->addChild('Contact Us', array(
        'label' => 'Sales Team',
        'uri' => '/contact.php',
        'order' => 2,
        'icon' => 'fas fa-fw fa-user-tie',
    ));

    // Add the a link to the submitticket page link.
    $contactUsLink->addChild('Open Ticket', array(
        'label' => 'Open a Ticket',
        'uri' => '/submitticket.php',
        'order' => 3,
        'icon' => 'fas fa-fw fa-life-ring',
    ));
}});
