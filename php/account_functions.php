<?php
    require("connect.php");
    $msg = '';

    // Function to get the client IP address
    function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

     // === Create BUSINESS ACCOUNT ===
     function createBusinessAccount($tableName){
        # sanitize textfields info
        $business_account_type = mysqli_real_escape_string($con, $_POST['$business_account_type']);
        $business_name = mysqli_real_escape_string($con, $_POST['$business_name']);
        $business_brief = mysqli_real_escape_string($con, $_POST['$business_brief']);
        $business_country = mysqli_real_escape_string($con, $_POST['$business_country']);
        $business_location_operation = mysqli_real_escape_string($con, $_POST['$business_location_operation']);
        $business_inc_status = mysqli_real_escape_string($con, $_POST['$business_inc_status']);
        $business_anti_laundering_status = mysqli_real_escape_string($con, $_POST['$business_anti_laundering_status']);
        $business_anti_laundering_link = mysqli_real_escape_string($con, $_POST['$business_anti_laundering_link']);
        $business_registration_docs = mysqli_real_escape_string($con, $_POST['$business_registration_docs']);
        $business_operational_license = mysqli_real_escape_string($con, $_POST['$business_operational_license']);
        $business_official_logo = mysqli_real_escape_string($con, $_POST['$business_official_logo']);
        $business_ceo = mysqli_real_escape_string($con, $_POST['$business_ceo']);
        $business_cofounder = mysqli_real_escape_string($con, $_POST['$business_cofounder']);
        $business_revenue_status = mysqli_real_escape_string($con, $_POST['$business_revenue_status']);
        $business_official_website = mysqli_real_escape_string($con, $_POST['$business_official_website']);
        $business_postal_address = mysqli_real_escape_string($con, $_POST['$business_postal_address']);
        $business_residential_address = mysqli_real_escape_string($con, $business_residential_address);
        $business_email = mysqli_real_escape_string($con, $_POST['$business_email']);
        $business_tel_number = mysqli_real_escape_string($con, $_POST['$business_tel_number']);
        # -- business password --
        $business_password = mysqli_real_escape_string($con, password_hash($_POST['business_password'], PASSWORD_BCRYPT));
        $business_password_hash = mysqli_real_escape_string($con, md5( rand(0,1000) ) );

        #add account
        $sql = mysqli_query($con, "
            INSERT INTO $tableName (
                business_account_type,
                business_name,
                business_brief,
                business_country,
                business_location_operation,
                business_inc_status,
                business_anti_laundering_status,
                business_anti_laundering_link,
                business_registration_docs,
                business_operational_license,
                business_official_logo,
                business_ceo,
                business_cofounder,
                business_revenue_status,
                business_official_website,
                business_postal_address,
                business_residential_address,
                business_email,
                business_tel_number,
                business_password,
                business_password_hash,
                business_ip_address,
                business_sign_up_date
            )

            VALUES (
                '$business_account_type',
                '$business_name',
                '$business_brief',
                '$business_country',
                '$business_location_operation',
                '$business_inc_status',
                '$business_anti_laundering_status',
                '$business_anti_laundering_link',
                '$business_registration_docs,'
                '$business_operational_license',
                '$business_official_logo',
                '$business_ceo',
                '$business_cofounder',
                '$business_revenue_status',
                '$business_official_website',
                '$business_postal_address',
                '$business_residential_address',
                '$business_email',
                '$business_tel_number',
                '$business_password',
                '$business_password_hash',
                '$business_ip_address',
                '$business_sign_up_date'
        ) LIMIT 1 ");

        // check if executed successfully
        if ($sql) {$msg = "Account Created Successfully";
        }else{ $msg = "Error Trying To Create Account"; }
        return $msg;
     }

     // === Edit BUSINESS ACCOUNT ===
     function editBusinessAccount($tableName, $bizId){
        # sanitize textfields info
        $business_account_type = mysqli_real_escape_string($con, $_POST['$business_account_type']);
        $business_name = mysqli_real_escape_string($con, $_POST['$business_name']);
        $business_brief = mysqli_real_escape_string($con, $_POST['$business_brief']);
        $business_country = mysqli_real_escape_string($con, $_POST['$business_country']);
        $business_location_operation = mysqli_real_escape_string($con, $_POST['$business_location_operation']);
        $business_inc_status = mysqli_real_escape_string($con, $_POST['$business_inc_status']);
        $business_anti_laundering_status = mysqli_real_escape_string($con, $_POST['$business_anti_laundering_status']);
        $business_anti_laundering_link = mysqli_real_escape_string($con, $_POST['$business_anti_laundering_link']);
        $business_registration_docs = mysqli_real_escape_string($con, $_POST['$business_registration_docs']);
        $business_operational_license = mysqli_real_escape_string($con, $_POST['$business_operational_license']);
        $business_official_logo = mysqli_real_escape_string($con, $_POST['$business_official_logo']);
        $business_ceo = mysqli_real_escape_string($con, $_POST['$business_ceo']);
        $business_cofounder = mysqli_real_escape_string($con, $_POST['$business_cofounder']);
        $business_revenue_status = mysqli_real_escape_string($con, $_POST['$business_revenue_status']);
        $business_official_website = mysqli_real_escape_string($con, $_POST['$business_official_website']);
        $business_postal_address = mysqli_real_escape_string($con, $_POST['$business_postal_address']);
        $business_residential_address = mysqli_real_escape_string($con, $business_residential_address);
        $business_email = mysqli_real_escape_string($con, $_POST['$business_email']);
        $business_tel_number = mysqli_real_escape_string($con, $_POST['$business_tel_number']);
        # -- business password --
        $business_password = mysqli_real_escape_string($con, password_hash($_POST['business_password'], PASSWORD_BCRYPT));
        $business_password_hash = mysqli_real_escape_string($con, md5( rand(0,1000) ) );

        #edit query
        $sql = mysqli_query($con, "
            UPDATE $tableName
            SET business_account_type = '$business_account_type',
                business_name = '$business_name',
                business_brief = '$business_brief',
                business_country = '$business_country',
                business_location_operation = '$business_location_operation',
                business_inc_status = '$business_inc_status',
                business_anti_laundering_status = '$business_anti_laundering_status',
                business_anti_laundering_link = '$business_anti_laundering_link',
                business_registration_docs = '$business_registration_docs',
                business_operational_license = '$business_operational_license',
                business_official_logo = '$business_official_logo',
                business_ceo = '$business_ceo',
                business_cofounder = '$business_cofounder',
                business_revenue_status = '$business_revenue_status',
                business_official_website = '$business_official_website',
                business_postal_address = '$business_postal_address',
                business_residential_address = '$business_residential_address',
                business_email = '$business_email',
                business_tel_number = '$business_tel_number',
                business_password = '$business_password',
                business_password_hash = '$business_password_hash',
                business_ip_address = get_client_ip(),
                business_sign_up_date = CURRENT_TIMESTAMP,
            WHERE id = '$bizId'
        LIMIT 1 ");

        // check if executed successfully
        if ($sql) {$msg = "Elements Updates Successfully";
        }else{ $msg = "Error Trying To Update Elements"; }
        return $msg;
    }

    // Delete ELEMENT
    function deleteElement($tableName, $elemID){
        $sql = mysqli_query($con, "DELETE FROM $tableName WHERE id = '$elemID' ");
        // check if executed successfully
        if ($sql) {$msg = "Element Deleted Successfully";
        }else{ $msg = "Error Trying To Delete Element"; }
        return $msg;
    }

    // Delete ELEMENT AND REDIRECT TO URI
    function deleteElementURI($tableName, $elemID, $URI){
        $sql = mysqli_query($con, "DELETE FROM $tableName WHERE id = '$elemID' ");
        // check if executed successfully
        if ($sql) {$msg = "Element Deleted Successfully";
        }else{ $msg = "Error Trying To Delete Element"; }
        return $msg;
        echo "<script>window.location.href=$URI</script>";
    }

    // Delete ELEMENT AND ELEMENT IMAGE
    function deleteElement($tableName, $elemID, $rowName){
        // read and delete image
		$sql = mysqli_query($con, "SELECT * FROM $tableName WHERE id='$elemID' ");
		while ($row = mysqli_fetch_assoc($sql)) {
			$img_path = '../'.$row[$rowName];
			if (!unlink($img_path)) {
				$msg = "Image Not Deleted<br>";
			}else{
				$msg = 'Done Deleting Image<br>';
			}
		}
        $sql = mysqli_query($con, "DELETE FROM $tableName WHERE id = '$elemID' ");
        if ($sql) {
            $msg .= "Element Deleted Successfully";
        }else{ $msg .= "Error Trying To Delete Element"; }
        return $msg;
    }

    // Delete ELEMENT, ELEMENT IMAGE AND REDIRECT TO URI
    function deleteElementURI($tableName, $elemID, $rowName, $URI){
        // read and delete image
		$sql = mysqli_query($con, "SELECT * FROM $tableName WHERE id='$elemID' ");
		while ($row = mysqli_fetch_assoc($sql)) {
			$img_path = '../'.$row[$rowName];
			if (!unlink($img_path)) {
				$msg = "Image Not Deleted<br>";
			}else{
				$msg = 'Done Deleting Image<br>';
			}
		}
        $sql = mysqli_query($con, "DELETE FROM $tableName WHERE id = '$elemID' ");
        if ($sql) {
            $msg .= "Element Deleted Successfully";
        }else{ $msg .= "Error Trying To Delete Element"; }
        return $msg;
        echo "<script>window.location.href=$URI</script>";
    }

    // === Create INDIVIDUAL BUSINESS ACCOUNT ===
    function createIndividualBusinessAccount($tableName){
       # sanitize textfields info
       $individual_fullname = mysqli_real_escape_string($con, $_POST['individual_fullname']);
       $individual_position = mysqli_real_escape_string($con, $_POST['individual_position']);
       $individual_company = mysqli_real_escape_string($con, $_POST['individual_company']);
       $individual_birth_date = mysqli_real_escape_string($con, $_POST['individual_birth_date']);
       $individual_postal_address = mysqli_real_escape_string($con, $_POST['individual_postal_address']);
       $individual_residential_address = mysqli_real_escape_string($con, $_POST['individual_residential_address']);
       $individual_tel_number = mysqli_real_escape_string($con, $_POST['individual_tel_number']);
       $individual_email = mysqli_real_escape_string($con, $_POST['individual_email']);
       # -- individual password --
       $individual_password = mysqli_real_escape_string($con, password_hash($_POST['business_password'], PASSWORD_BCRYPT));
       $individual_password_hash = mysqli_real_escape_string($con, md5( rand(0,1000) ) );
       $individual_ip_address = get_client_ip();
       $individual_sign_up_date = CURRENT_TIMESTAMP;
       $sql = mysqli_query($con, "
           INSERT INTO $tableName (
               individual_fullname,
               individual_position,
               individual_company,
               individual_birth_date,
               individual_postal_address,
               individual_residential_address,
               individual_tel_number,
               individual_email,
               individual_password,
               individual_password_hash,
               individual_ip_address,
               individual_sign_up_date
           )

           VALUES (
               '$individual_fullname',
               '$individual_position',
               '$individual_company',
               '$individual_birth_date',
               '$individual_postal_address',
               '$individual_residential_address',
               '$individual_tel_number',
               '$individual_email',
               '$individual_password,'
               '$individual_password_hash',
               '$individual_ip_address',
               '$individual_sign_up_date'
       ) LIMIT 1 ");

       // check if executed successfully
       if ($sql) {$msg = "Account Created Successfully";
       }else{ $msg = "Error Trying To Create Account"; }
       return $msg;
    }

    // === Edit INDIVIDUAL BUSINESS ACCOUNT ===
    function editBusinessAccount($tableName, $bizId){
       # sanitize textfields info
       $individual_fullname = mysqli_real_escape_string($con, $_POST['individual_fullname']);
       $individual_position = mysqli_real_escape_string($con, $_POST['individual_position']);
       $individual_company = mysqli_real_escape_string($con, $_POST['individual_company']);
       $individual_birth_date = mysqli_real_escape_string($con, $_POST['individual_birth_date']);
       $individual_postal_address = mysqli_real_escape_string($con, $_POST['individual_postal_address']);
       $individual_residential_address = mysqli_real_escape_string($con, $_POST['individual_residential_address']);
       $individual_tel_number = mysqli_real_escape_string($con, $_POST['individual_tel_number']);
       $individual_email = mysqli_real_escape_string($con, $_POST['individual_email']);
       # -- indidividual password --
       $individual_password = mysqli_real_escape_string($con, password_hash($_POST['business_password'], PASSWORD_BCRYPT));
       $individual_password_hash = mysqli_real_escape_string($con, md5( rand(0,1000) ) );
       $individual_ip_address = get_client_ip();
       $individual_sign_up_date = CURRENT_TIMESTAMP;
       #edit query
       $sql = mysqli_query($con, "
           UPDATE $tableName
           SET individual_fullname = '$individual_fullname',
               individual_position = '$individual_position',
               individual_company = '$individual_company',
               individual_birth_date = '$individual_birth_date',
               individual_postal_address = '$individual_postal_address',
               individual_residential_address = '$individual_residential_address',
               individual_tel_number = '$individual_tel_number',
               individual_email = '$individual_email',
               individual_password = '$individual_password',
               individual_password_hash = '$individual_password_hash',
               individual_ip_address = '$individual_ip_address',
               individual_sign_up_date = '$individual_sign_up_date',
               business_password = '$business_password',
               business_password_hash = '$business_password_hash',
               business_ip_address = get_client_ip(),
               business_sign_up_date = CURRENT_TIMESTAMP,
           WHERE id = '$bizId'
       LIMIT 1 ");

       // check if executed successfully
       if ($sql) {$msg = "Your Accoount Has Been Updated Successfully";
       }else{ $msg = "Error Trying To Update Your Accoount"; }
       return $msg;
   }

?>
