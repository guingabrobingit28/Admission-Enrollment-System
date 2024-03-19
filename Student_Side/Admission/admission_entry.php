<?php 

include "../../Connection/connection.php";


class admission extends DatabaseConnection{
    public function admission_data($id,$first_name,$middle_name,$lastname,$suffix,$bod,$phone,$street,$city,$province,$zipcode,$country,$email,$g_firstname,$g_middle,$g_lastname,$g_suffix,$g_number,$gender,$civil_status){

    $stmt = $this->conn->prepare("INSERT INTO `tbl_personal_info`(`id`, `first_name`, `last_name`, `email`, `bod`, `street`, `city`, `province`, `zip_code`, `country`, `contact_number`, `guardian_firstname`, `guardian_lastname`, `guardian_number`,`middle_name`,`suffix`,`guardian_middlename`,`guardian_suffix`,`gender`,`civil_status`) 
    VALUES (:id,:first_name,:last_name,:email,:bod,:street,:city,:province,:zipcode,:country,:phone,:g_firstname,:g_lastname,:g_number,:middle_name,:suffix,:g_middle,:g_suffix,:gender,:civil_status)");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':middle_name', $middle_name);
    $stmt->bindParam(':last_name', $lastname);
    $stmt->bindParam(':suffix', $suffix);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':bod', $bod);
    $stmt->bindParam(':street', $street);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':province', $province);
    $stmt->bindParam(':zipcode', $zipcode);
    $stmt->bindParam(':country', $country);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':g_firstname', $g_firstname);
    $stmt->bindParam(':g_middle', $g_middle);
    $stmt->bindParam(':g_lastname', $g_lastname);
    $stmt->bindParam(':g_suffix', $g_suffix);
    $stmt->bindParam(':g_number', $g_number);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':civil_status', $civil_status);
    
    $inserted = $stmt->execute();

    $status = 'Pending';


    $stmt2 = $this->conn->prepare("INSERT INTO `tbl_admission`(`id`,`status`) VALUES (:id,:status)");
    $stmt2->bindParam(':status', $status);
    $stmt2->bindParam(':id', $id);
    $stmt2->execute();

    
    $stmt3 = $this->conn->prepare("UPDATE `tbl_account` SET `admission_status`='Off' WHERE id = :id");
    $stmt3->bindParam(':id', $id);
    $stmt3->execute();

    if ($inserted) {
        return 200;
    } else {
        return 400;
    }


$this->conn = null;
      
    }
}

class admission_status extends DatabaseConnection{

    public function admission_status_check($id){
        $admission_status = "SELECT * FROM tbl_account WHERE id = :id";
        $stmt = $this->conn->prepare($admission_status);
        $stmt->bindParam(':id', $id);
        $stmt->execute(); 
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

}



?>