<?php

function gravity_css_off_theme_activate() {
	update_option( 'rg_gforms_disable_css', '1' );
	update_option( 'rg_gforms_enable_html5', '1' );
}
add_action('after_switch_theme','gravity_css_off_theme_activate');

function gravityform_activate() {
	update_option( 'rg_gforms_disable_css', '1' );
	update_option( 'rg_gforms_enable_html5', '1' );
}
register_activation_hook(__FILE__,'gravityform_activate');

add_action( 'gform_after_submission_3', 'landing_post_to_acton', 10, 2 );

function landing_post_to_acton( $entry, $form ) {

    $post_url = 'http://marketing.specopssoft.com/acton/eform/7896/0060/d-ext-0001';
    $body = array(
        'First Name' => rgar( $entry, '1' ),
        'Last Name' => rgar( $entry, '2' ),
        'Company' => rgar( $entry, '3' ),
        'Phone' => rgar( $entry, '4' ),
        'Email' => rgar( $entry, '5' ),
        'Lead Source' => rgar( $entry, '6' ),
        'Last request' => rgar( $entry, '7' ),
        'Product Interest' => rgar( $entry, '8' ),
        'Mailing Country' => rgar( $entry, '9' ),
        'uReset Last Message' => rgar( $entry, '10' ),
        'Field 29' => rgar( $entry, '12.1' )
        );

    $request = new WP_Http();
    $response = $request->post( $post_url, array( 'body' => $body ) );

}

add_action( 'gform_after_submission_4', 'email_post_to_acton', 10, 2 );

function email_post_to_acton( $entry, $form ) {

    $post_url = 'http://marketing.specopssoft.com/acton/eform/7896/0033/d-ext-0001';
    $body = array(
        'First Name' => rgar( $entry, '1' ),
        'Last Name' => rgar( $entry, '2' ),
        'Email' => rgar( $entry, '3' )
        );

    $request = new WP_Http();
    $response = $request->post( $post_url, array( 'body' => $body ) );

}

//add_action( 'gform_after_submission_5', 'contact_post_to_acton', 10, 2 );

function contact_post_to_acton( $entry, $form ) {

    $post_url = 'http://marketing.specopssoft.com/acton/eform/7896/0054/d-ext-0001';
    $body = array(
        'First Name' => rgar( $entry, '1' ),
        'Last Name' => rgar( $entry, '2' ),
        'Company' => rgar( $entry, '3' ),
        'Mailing Country' => rgar( $entry, '4' ),
        'Email' => rgar( $entry, '5' ),
        'Inquiries type' => rgar( $entry, '6' ),
        'Last request' => rgar( $entry, '7' ),
        'Comments ' => rgar( $entry, '8' ),
        'Lead Source' => rgar( $entry, '9' )
	);

    $request = new WP_Http();
    $response = $request->post( $post_url, array( 'body' => $body ) );

}

add_action( 'gform_after_submission_7', 'content_offer_post_to_acton', 10, 2 );

function content_offer_post_to_acton( $entry, $form ) {
    if (! $post_url = get_field('act-on_post_url', rgar($entry, '4'))) {
        return;
    }

    $body = array(
        'First Name' => rgar( $entry, '1' ),
        'Last Name' => rgar( $entry, '3' ),
        'Email' => rgar( $entry, '2' )
    );

    $request = new WP_Http();
    $response = $request->post( $post_url, array( 'body' => $body ) );
}

//Force tabindex on newsletter form
add_filter( 'gform_tabindex_4', function( $tabindex, $form ) {
    return 15;
}, 10, 2 );

//Add timestamp to 'Last Message' fielsd
add_filter("gform_field_value_timestamp", "forge_populate_timestamp");
function forge_populate_timestamp( $value ){
    return 'Last submission at ' . date( 'n/j/Y g:i A' );
}

/**
 * Gravity Wiz // Gravity Forms // Email Domain Validator
 *
 * This snippets allows you to exclude a list of invalid domains or include a list of valid domains for your Gravity Form Email fields.
 *
 * @version   1.0
 * @author    David Smith <david@gravitywiz.com>
 * @license   GPL-2.0+
 * @link      http://gravitywiz.com/banlimit-email-domains-for-gravity-form-email-fields/
 */
class GW_Email_Domain_Validator {

    private $_args;

    function __construct($args) {

        $this->_args = wp_parse_args( $args, array(
            'form_id' => false,
            'field_id' => false,
            'domains' => false,
            'validation_message' => __( 'Sorry, <strong>%s</strong> email accounts are not eligible for this form.' ),
            'mode' => 'ban' // also accepts "limit"
        ) );

        // convert field ID to an array for consistency, it can be passed as an array or a single ID
        if($this->_args['field_id'] && !is_array($this->_args['field_id']))
            $this->_args['field_id'] = array($this->_args['field_id']);

        $form_filter = $this->_args['form_id'] ? "_{$this->_args['form_id']}" : '';

        add_filter("gform_validation{$form_filter}", array($this, 'validate'));

    }

    function validate($validation_result) {

        $form = $validation_result['form'];

        foreach($form['fields'] as &$field) {

            // if this is not an email field, skip
            if(RGFormsModel::get_input_type($field) != 'email')
                continue;

            // if field ID was passed and current field is not in that array, skip
            if($this->_args['field_id'] && !in_array($field['id'], $this->_args['field_id']))
                continue;

            $domain = $this->get_email_domain($field);

            // if domain is valid OR if the email field is empty, skip
            if($this->is_domain_valid($domain) || empty($domain))
                continue;

            $validation_result['is_valid'] = false;
            $field['failed_validation'] = true;
            $field['validation_message'] = sprintf($this->_args['validation_message'], $domain);

        }

        $validation_result['form'] = $form;
        return $validation_result;
    }

    function get_email_domain( $field ) {
        $email = explode('@', rgpost("input_{$field['id']}"));
        return rgar($email, 1);
    }

    function is_domain_valid( $domain ) {

        $mode   = $this->_args['mode'];
        $domain = strtolower( $domain );

        foreach( $this->_args['domains'] as $_domain ) {

            $_domain = strtolower( $_domain );

            $full_match   = $domain == $_domain;
            $suffix_match = strpos( $domain, '.' ) === 0 && $this->str_ends_with( $domain, $_domain );
            $has_match    = $full_match || $suffix_match;

            if( $mode == 'ban' && $has_match ) {
                return false;
            } else if( $mode == 'limit' && $has_match ) {
                return true;
            }

        }

        return $mode == 'limit' ? false : true;
    }

    function str_ends_with( $string, $text ) {

        $length      = strlen( $string );
        $text_length = strlen( $text );

        if( $text_length > $length ) {
            return false;
        }

        return substr_compare( $string, $text, $length - $text_length, $text_length ) === 0;
    }

}

class GWEmailDomainControl extends GW_Email_Domain_Validator { }

// Configuration
new GW_Email_Domain_Validator( array(
    'form_id' => 3,
    'field_id' => 5,
    'domains' => array(
        'gmail.com',
        'hotmail.com',
        'msn.com',
        'aol.com',
        'yahoo.com',
        'facebook.com',
        '163.com'
    ),
    'validation_message' => __( '<strong>%s</strong> email accounts are not eligible for this form.' )
) );


// Force Gravity Forms to init scripts in the footer and ensure that the DOM is loaded before scripts are executed
add_filter( 'gform_init_scripts_footer', '__return_true' );
add_filter( 'gform_cdata_open', 'wrap_gform_cdata_open', 1 );

function wrap_gform_cdata_open( $content = '' ) {
    if ( ( defined('DOING_AJAX') && DOING_AJAX ) || isset( $_POST['gform_ajax'] ) ) {
        return $content;
    }
    $content = 'document.addEventListener( "DOMContentLoaded", function() { ';
    return $content;
}

add_filter( 'gform_cdata_close', 'wrap_gform_cdata_close', 99 );

function wrap_gform_cdata_close( $content = '' ) {
    if ( ( defined('DOING_AJAX') && DOING_AJAX ) || isset( $_POST['gform_ajax'] ) ) {
        return $content;
    }
    $content = ' }, false );';
    return $content;
}