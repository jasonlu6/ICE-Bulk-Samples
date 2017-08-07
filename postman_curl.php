<?php
/**
 * Created by PhpStorm.
 * User: jasonlu
 * Date: 8/7/17
 * Time: 11:09 AM
 */

/**
 * File: file_imports.php
 * Author: Jason Lu (jasonlu6@bu.edu)
 *
 * Collaboration:
 * Professor Douglas Densmore (dougd@bu.edu)
 * Marliene Pavan (mapavan@bu.edu)
 * Blade Olson (bladeols@bu.edu)
 * Christopher Rodriguez (Fluigi Lab)
 * Hector Plahar (ICE Software Developer at JBEI) (haplahar@lbl.gov)
 */

/* Source (from Stack Overflow / Calling a rest API in PHP):
 https://stackoverflow.com/questions/9802788/call-a-rest-api-in-php */

/* Connects with the REST API endpoint with Postman application */

// Methods: POST, PUT, GET, DELETE, UPDATE, etc.

// Note: the REST API endpoint that Hector provided is:

// POST /rest/parts/{part_id}/samples

// Note II: the data parameter form is:

/*

{
	label: 'label'
	location: {
		type: 'PLATE96'
		name: 'my_plate'
		display: '001'
		child: {
			type: 'WELL',
			display: 'A01'
			child: {
				type: 'TUBE',
				display: '001'
			}
		}
	}
}

This example is for a sample in a tube in a 96 well plate at position
'A01' with tube ID '001'. The identifier for tubes need to be unique
across all samples.
*/

function CallPostman($method, $link, $data) {

    // initialize the curl object
    $curl = curl_init();

    // switch statement to deal with various CRUD calls (POST, PUT, GET...)
    switch($method) {
        case "POST":
            // set the endpoint option to POST:
            // key,value pair: {option,value}
            curl_setopt($curl, CURLOPT_POST, 1);
            // determine if the POST endpoint is connected
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;

        case "PUT":
            // set the endpoint option to PUT:
            // key,value pair: {option,value}
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;

        case "GET":
            // set the endpoint option to GET (similar to POST)
            // key,value pair: {option,value}
            curl_setopt($curl, CURLOPT_GET, 1);
            // determine if the GET endpoint is connected
            if ($data)
                curl_setopt($curl, CURL_GETFIELDS, $data);
            break;

        case "DELETE":
            // set the endpoint option to DELETE:
            // key,value pair: {option,value}
            curl_setopt($curl, CURLOPT_DELETE, 1);
            break;

        case "UPDATE":
            // set the endpoint option to UPDATE:
            // key,value pair: {option,value}
            curl_setopt($curl, CURL_UPDATE, 1);
            // determine if the UPDATE endpoint is connected
            if ($data)
                curl_setopt($curl, CURLPOST_UPDATE, 1);
            break;

        // default case, connect to rest API
        default:
            if ($data)
                // special print statement based on file pointer
                $link = sprintf("%s?%s", $link, http_build_query($data));

    }

    // O-Auth (Authentication):
    // Not necessary for now in Densmore lab, maybe later if the code becomes
    // FOSS (Free and Open Source Site)
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // change the username and password!!!
    curl_setopt($curl, CURLOPT_USERPWD, "username:password");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    // execute the CURL request
    $request = curl_exec($curl);
    // close the CURL request
    curl_close($curl);

    // return the result (in front end) to the USER (endpoint)
    return $request;
}