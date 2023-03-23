<?php
    /** This is an addon to embed the high level booking calendar widget into your WHMCS site as a client area page. */
    function bookings_config() {
        $configarray = array(
            "name"          => "High Level Client Area Booking",
            "description"   => "This addon module adds a client area page, menu link, and allows you to embed your highlevel booking calendar widget into your WHMCS site.",
            "version"       => "1.3",
            "author"        => "Stoute Web Solutions",
            "language"      => "english",
            "fields"        => array(
                "ghl_embed_code"    => array(
                    "FriendlyName"  => "High Level Embed Code",
                    "Type"          => "textarea",
                    "Rows"          => "2",
                    "Cols"          => "50",
                    "Description"   => "Add your calendar's embed code here."
                )
            )
        );
        return $configarray;
    }

    function bookings_activate() {
        return [
            "status"        => "success",
            "description"   => "You have activated the High Level Booking Page successfully. If you do not have the embed code entered into the config, nothing will be displayed on the client area page."
        ];
    }

    function bookings_deactivate() {
        return [
            "status"        => "success",
            "description"   => "You have deactivated the High Level Booking Page successfully."
        ];
    }

    function bookings_clientarea($vars) {
        $modulelink = $vars['modulelink'];
        $embedcode = $vars['ghl_embed_code'];
        $LANG = $vars['_lang'];

        return array(
            "pagetitle"     => $LANG['book_a_call'],
            "breadcrumb"    => array('index.php?m=bookings' => $LANG['book_a_call']),
            "templatefile"  => "clientbooking",
            "requirelogin"  => false,
            "forcessl"      => false,
            "vars"          => array(
                "iframe"                => $embedcode,
                "lang_book_a_call"      => $LANG['book_a_call'],
                "form_description"      => $LANG['form_description'],
            )
        );
    }