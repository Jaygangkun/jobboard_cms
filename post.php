<?php
header('Access-Control-Allow-Origin: *');  
$curl = curl_init();

if(isset($_POST['company_id'])){
    $company_id = $_POST['company_id'];
}
else{
    die();
}


if(isset($_POST['email'])){
    $email = $_POST['email'];
}
else{
    $email = '';
}

if(isset($_POST['fname'])){
    $fname = $_POST['fname'];
}
else{
    $fname = '';
}

if(isset($_POST['lname'])){
    $lname = $_POST['lname'];
}
else{
    $lname = '';
}

if(isset($_POST['custom_phone'])){
    $custom_phone = $_POST['custom_phone'];
}
else{
    $custom_phone = '';
}

if(isset($_POST['custom_city'])){
    $custom_city = $_POST['custom_city'];
}
else{
    $custom_city = '';
}

if(isset($_POST['custom_state'])){
    $custom_state = $_POST['custom_state'];
}
else{
    $custom_state = '';
}

if(isset($_POST['custom_zip'])){
    $custom_zip = $_POST['custom_zip'];
}
else{
    $custom_zip = '';
}

if(isset($_POST['custom_are_you_23_years_of_age_or_older'])){
    $custom_are_you_23_years_of_age_or_older = $_POST['custom_are_you_23_years_of_age_or_older'];
}
else{
    $custom_are_you_23_years_of_age_or_older = '';
}

if(isset($_POST['custom_do_you_have_a_cdl'])){
    $custom_do_you_have_a_cdl = $_POST['custom_do_you_have_a_cdl'];
}
else{
    $custom_do_you_have_a_cdl = '';
}

if(isset($_POST['custom_previous_tractor_trailer_experience_if_required'])){
    $custom_previous_tractor_trailer_experience_if_required = $_POST['custom_previous_tractor_trailer_experience_if_required'];
}
else{
    $custom_previous_tractor_trailer_experience_if_required = '';
}
                

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://dashboard.tenstreet.com/post/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"<TenstreetData>\r\n    <!--Authentication Node ONLY required for standard POST NOT for SOAP calls. Tenstreet will provide this node of data to you after a vetting & introduction phone call to your organization. -->\r\n    <Authentication>\r\n        <ClientId>303</ClientId>\r\n        <Password>lS%!r3pjy@0SzMs!8Ln</Password>\r\n        <Service>subject_upload</Service>\r\n    </Authentication>\r\n    <Mode>PROD</Mode>\r\n    <Source>TheDriverBoardLead</Source>\r\n    <CompanyId>".$company_id."</CompanyId>\r\n    <PersonalData>\r\n        <PersonName>\r\n            <GivenName>".$fname."</GivenName>\r\n            <FamilyName>".$lname."</FamilyName>\r\n        </PersonName>\r\n        <PostalAddress>\r\n            <Municipality>".$custom_city."</Municipality>\r\n            <Region>".$custom_state."</Region>\r\n        </PostalAddress>\r\n        <ContactData>\r\n            <InternetEmailAddress>".$email."</InternetEmailAddress>\r\n            <PrimaryPhone>".$custom_phone."</PrimaryPhone>\r\n        </ContactData>\r\n    </PersonalData>\r\n    <ApplicationData>\r\n        <DisplayFields>\r\n            <DisplayField>\r\n                <DisplayPrompt>Class A CDL</DisplayPrompt>\r\n                <DisplayValue>".$custom_do_you_have_a_cdl."</DisplayValue>\r\n            </DisplayField>\r\n            <DisplayField>\r\n                <DisplayPrompt>Years of tractor trailer experience</DisplayPrompt>\r\n                <DisplayValue>".custom_previous_tractor_trailer_experience_if_required."</DisplayValue>\r\n            </DisplayField>\r\n            <DisplayField>\r\n                <DisplayPrompt>Are you 23 or older</DisplayPrompt>\r\n                <DisplayValue>".$custom_are_you_23_years_of_age_or_older."</DisplayValue>\r\n            </DisplayField>\r\n        </DisplayFields>\r\n    </ApplicationData>\r\n</TenstreetData>",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/xml"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

?>