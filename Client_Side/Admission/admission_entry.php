<?php 

include "../../Connection/connection.php";


class admission extends DatabaseConnection{
    public function admission_data($admissiontype,$course,$firstname,$middlename,$lastname,$suffix,$bod,$phone,$street,$city,$province,$country,$zipcode,$email,$gender,$civilstatus,$fatherfirstname,$fathermiddlename,$fatherlastname,$fathersuffix,$fatheroccupation,$motherfirstname,$mothermiddlename,$motherlastname,$mothersuffix,$motheroccupation,$pri_name,$pri_year,$sec_name,$sec_year,$last_name,$last_year,$guardian_num,$id){


    if(empty($id)){

        $stmt = $this->conn->prepare("INSERT INTO `tbl_student_info`(`firstName`, `middleName`, `lastName`, `Suffix`, `gender`, `street`, `city`, `province`, `country`, `zipCode`, `email`, `number`, `civilStatus`, `fatherFirstname`, `fatherMiddlename`, `fatherLastname`, `fatherSuffix`, `fatherOccupation`, `motherFirstname`, `motherMiddlename`, `motherLastname`, `motherSuffix`, `MotherOccupation`, `course`, `Bod`, `admissionType`,`Student_Type`, `pri-name`, `pri-year`, `sec`, `sec-year`, `last`, `last-year`,`gnumber`) VALUES (:firstname,:middlename,:lastname,:suffix,:gender,:street,:city,:province,:country,:zipcode,:email,:phone,:civilstatus,:fatherfirstname,:fathermiddlename,:fatherlastname,:fathersuffix,:fatheroccupation,:motherfirstname,:mothermiddlename,:motherlastname,:mothersuffix,:motheroccupation,:course,:bod,:admissiontype,'NE',:pri_name,:pri_year,:sec_name,:sec_year,:last_name,:last_year,:guardian_num)");


        $stmt->bindParam(':pri_name', $pri_name);
        $stmt->bindParam(':pri_year', $pri_year);

        $stmt->bindParam(':sec_name', $sec_name);
        $stmt->bindParam(':sec_year', $sec_year);

        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':last_year', $last_year);
        

        $stmt->bindParam(':admissiontype', $admissiontype);
        $stmt->bindParam(':course', $course);
        
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':middlename', $middlename);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':suffix', $suffix);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':bod', $bod);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':civilstatus', $civilstatus);
        $stmt->bindParam(':street', $street);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':province', $province);
        $stmt->bindParam(':zipcode', $zipcode);
        $stmt->bindParam(':country', $country);
    
        $stmt->bindParam(':fatherfirstname', $fatherfirstname);
        $stmt->bindParam(':fathermiddlename', $fathermiddlename);
        $stmt->bindParam(':fatherlastname', $fatherlastname);
        $stmt->bindParam(':fathersuffix', $fathersuffix);
        $stmt->bindParam(':fatheroccupation', $fatheroccupation);
    
        $stmt->bindParam(':motherfirstname', $motherfirstname);
        $stmt->bindParam(':mothermiddlename', $mothermiddlename);
        $stmt->bindParam(':motherlastname', $motherlastname);
        $stmt->bindParam(':mothersuffix', $mothersuffix);
        $stmt->bindParam(':motheroccupation', $motheroccupation);

        $stmt->bindParam(':guardian_num',$guardian_num);

        
        
        
        
        $inserted = $stmt->execute();
    
        $lastInsertedId = $this->conn->lastInsertId();
        $status = 'Pending';
    
    
        $stmt2 = $this->conn->prepare("INSERT INTO `tbl_admission`(`id`,`status`) VALUES (:id,:status)");
        $stmt2->bindParam(':status', $status);
        $stmt2->bindParam(':id', $lastInsertedId);
        $stmt2->execute();
    
        if ($inserted) {
            return 200;
        } else {
            return 400;
        }




    }else{

        

        $stmt = $this->conn->prepare("UPDATE `tbl_student_info` SET `Student_Type` = 'NE' , admissionType = 'Returnee' WHERE student_id = :id ");
        $stmt->bindParam(':id', $id);
        
        $inserted = $stmt->execute();
    
        if ($inserted) {
            return 200;
        } else {
            return 400;
        }
    

     
    
    }

$this->conn = null;
      
    }
}

class Course extends DatabaseConnection{

    public function Show_Course(){

        $show_course = "SELECT * FROM `tbl_course`";
        $stmt = $this->conn->prepare($show_course);
        $stmt->execute(); 
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;
        $this->conn = null;
          
    }
    

 


}



?>