<?php 
include "../../Connection/connection.php";

class Student_Record extends DatabaseConnection{
    public function Show_Requirements(){

    $admissiom_list = "SELECT * FROM (SELECT * FROM tbl_requirements ) tbl_requirements
    JOIN (SELECT * FROM tbl_student_info ) tbl_student_info on tbl_requirements.student_id = tbl_student_info.student_id 
    JOIN (SELECT * FROM tbl_enrollment ) tbl_enrollment on tbl_student_info.student_id  = tbl_enrollment.student_id  
    Group by tbl_enrollment.student_id ";
    $stmt = $this->conn->prepare($admissiom_list);
    $stmt->execute(); 
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);


    
    return $data;
    $this->conn = null;
      
    }

    public function Search_Requirements($search_name){

        $admissiom_list = "SELECT * FROM (SELECT * FROM tbl_requirements ) tbl_requirements
        JOIN (SELECT * FROM tbl_student_info WHERE firstName LIKE '$search_name%' or lastName LIKE '$search_name%' ) tbl_student_info on tbl_requirements.student_id = tbl_student_info.student_id 
        JOIN (SELECT * FROM tbl_enrollment ) tbl_enrollment on tbl_student_info.student_id  = tbl_enrollment.student_id  
        Group by tbl_enrollment.student_id ";

        $stmt = $this->conn->prepare($admissiom_list);
        $stmt->execute(); 
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;

    
        $this->conn = null;
          
    }

    public function update_requirements($id,$items,$remark){


        // loop the items bcuz it is array
        foreach($items as $requirements){

            $insert_requirements = "INSERT INTO `tbl_requirements`(`student_id`,`requirement_name`) VALUES (:id,:requirements)";
            $stmt2 = $this->conn->prepare($insert_requirements);

            $stmt2->bindParam(':id', $id);
            $stmt2->bindParam(':requirements', $requirements);
            $stmt2->execute();

        }   

            $update_enrollan = "UPDATE `tbl_enrollment` SET `Remark`= :remark WHERE student_id = :id ";
            $stmt = $this->conn->prepare($update_enrollan);

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':remark', $remark);
            $stmt->execute();

            return 200;
            $this->conn = null;


    }

    // PAYMENT

    public function Show_Payment(){

        $admissiom_list = "SELECT * FROM (SELECT * FROM tbl_semester_payment ) tbl_semester_payment
        JOIN (SELECT * FROM tbl_student_info WHERE Student_Type = 'E' ) tbl_student_info on tbl_semester_payment.student_id = tbl_student_info.student_id 
        JOIN (SELECT * FROM tbl_enrollment order by date desc ) tbl_enrollment on tbl_semester_payment.enrollment_id  = tbl_enrollment.enrollment_id  
        group by tbl_semester_payment.payment_id";
        $stmt = $this->conn->prepare($admissiom_list);
        $stmt->execute(); 
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
        
        return $data;
        $this->conn = null;
          
        }

    
    public function Search_Show_Payment($search_name){

            $admissiom_list = "SELECT * FROM (SELECT * FROM tbl_semester_payment  ) tbl_semester_payment 
            JOIN (SELECT * FROM tbl_student_info WHERE firstName LIKE '$search_name%' AND Student_Type = 'E'  or lastName LIKE '$search_name%' AND Student_Type = 'E'  ) tbl_student_info on tbl_semester_payment .student_id = tbl_student_info.student_id 
            JOIN (SELECT * FROM tbl_enrollment order by date desc ) tbl_enrollment on tbl_student_info.student_id  = tbl_enrollment.student_id  
            Group by tbl_enrollment.enrollment_id";
    
            $stmt = $this->conn->prepare($admissiom_list);
            $stmt->execute(); 
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $data;
    
        
            $this->conn = null;
              
        }

        public function Update_Payment($id,$paid,$amount){

            $sem_fee = 4975;
            $total_paid = $amount + $paid;
            
            
            if($total_paid >= $sem_fee){
                $status = 'Fully Paid';
                $balance = 0;
            }else{
                $status = 'Not Fully Paid';
                $balance = $sem_fee - $total_paid;
            }

            $payment_update = "UPDATE `tbl_semester_payment` SET `payment`=:total_paid ,`balance`=:balance,`status`= :status WHERE payment_id = :id ";
            $stmt = $this->conn->prepare($payment_update);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':total_paid', $total_paid);
            $stmt->bindParam(':balance', $balance);
           $stmt->execute();  
            
            return 200;
            $this->conn = null;
              
            }

        // STUDENT RECORD

        public function Student_Records(){

            $student_record = "SELECT * FROM (SELECT * FROM tbl_student_info WHERE Student_Type = 'E' ) tbl_student_info
            INNER JOIN (SELECT enrollment_id,student_id,date,Year,Sem,Remark,
            @Sid:= Section as Section,
            (SELECT `section_name` from tbl_section where section_id = @Sid) as section_name,
            (SELECT `schedule_id` from tbl_section where section_id = @Sid) as schedule_id
             FROM tbl_enrollment order by date desc ) 
             tbl_enrollment on tbl_student_info.student_id = tbl_enrollment.student_id group by tbl_student_info.student_id
             
             ";
            $stmt = $this->conn->prepare($student_record);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data;
            $this->conn = null;


        }

        // search student record
        
        public function Search_Records($name){

            $searchTerm = '%' . $name;

            $student_search = "SELECT * FROM (SELECT * FROM tbl_student_info WHERE firstName LIKE :searchTerm AND Student_Type = 'E'  OR lastName LIKE :searchTerm  AND Student_Type = 'E'  ) tbl_student_info
            INNER JOIN (SELECT enrollment_id,student_id,date,Year,Sem,Remark,
            @Sid:= Section as Section,
            (SELECT `section_name` from tbl_section where section_id = @Sid) as section_name,
            (SELECT `schedule_id` from tbl_section where section_id = @Sid) as schedule_id
             FROM tbl_enrollment ) 
             tbl_enrollment on tbl_student_info.student_id = tbl_enrollment.student_id group by tbl_student_info.student_id
             ";
            $stmt = $this->conn->prepare($student_search);
            $stmt->bindParam(':searchTerm', $searchTerm);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data;
            $this->conn = null;
            
        }

        // filter student record

        public function Student_Filter($course,$year,$section,$semester){

            $student_search = "SELECT * FROM (SELECT * FROM tbl_student_info WHERE course =:course AND Student_Type = 'E') tbl_student_info
            INNER JOIN (SELECT  enrollment_id,student_id,date,Year,Sem,Remark,
            @Sid:= Section as Section,
            (SELECT `section_name` from tbl_section where section_id = @Sid) as section_name,
            (SELECT `schedule_id` from tbl_section where section_id = @Sid) as schedule_id
             FROM tbl_enrollment WHERE Year = :year AND Section = :section AND Sem = :semester ) 
             tbl_enrollment on tbl_student_info.student_id = tbl_enrollment.student_id 
             group by tbl_student_info.student_id
             ";
            $stmt = $this->conn->prepare($student_search);
            $stmt->bindParam(':course',$course);
            $stmt->bindParam(':year',$year);
            $stmt->bindParam(':section',$section);
            $stmt->bindParam(':semester',$semester);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data;
            $this->conn = null;
            
        }


        public function Delete_Records($id){


         
            $delete_requirements = "DELETE FROM `tbl_requirements` WHERE student_id = :id ";
            $stmt1 = $this->conn->prepare($delete_requirements);
            $stmt1->bindParam(':id', $id);
            $stmt1->execute();

            $delete_enrollment = "DELETE FROM `tbl_enrollment` WHERE student_id = :id ";
            $stmt2 = $this->conn->prepare($delete_enrollment);
            $stmt2->bindParam(':id', $id);
            $stmt2->execute();

            $delete_admission = "DELETE FROM `tbl_admission` WHERE id = :id ";
            $stmt3 = $this->conn->prepare($delete_admission);
            $stmt3->bindParam(':id', $id);
            $stmt3->execute();


            $delete_record = "DELETE FROM `tbl_student_info` WHERE student_id = :id ";
            $stmt = $this->conn->prepare($delete_record);
            $stmt->bindParam(':id', $id);
            $stmt->execute();


            return 200;
            $this->conn = null;



        }


        // update record

        public function Update_Student($enrollment_id,$id,$firstname,$middlename,$lastname,$suffix,$gender,$status,$bod,$email,$number,$street,$city,$province,$country,$zipcode,$ffirstname,$fmiddlename,$flastname,$fsuffix,$foccupation,$mfirstname,$mmiddlename,$mlastname,$msuffix,$moccupation,$admissiontype,$course,$year,$semester,$section,$gnumber,$primary,$priyear,$secondary,$secyear,$last,$lastyear){


            $student_update = "UPDATE `tbl_student_info` SET 
            `firstName`=:firstname,
            `middleName`=:middlename,
            `lastName`=:lastname,
            `Suffix`=:suffix,
            `gender`=:gender,
            `street`=:street,
            `city`=:city,
            `province`=:province,
            `country`=:country,
            `zipCode`=:zipcode,
            `email`=:email,
            `number`=:number,
            `civilStatus`= :status,
            `fatherFirstname`=:ffirstname,
            `fatherMiddlename`=:fmiddlename,
            `fatherLastname`=:flastname,
            `fatherSuffix`=:fsuffix,
            `fatherOccupation`= :foccupation,
            `motherFirstname`=:mfirstname,
            `motherMiddlename`=:mmiddlename,
            `motherLastname`=:mlastname,
            `motherSuffix`=:msuffix,
            `MotherOccupation`=:moccupation,
            `course`=:course,
            `Bod`=:bod,
            `admissionType`=:admissiontype,
            `gnumber`=:gnumber,
            `pri-name`= :primary,
            `pri-year`= :priyear,
            `sec`=:secondary,
            `sec-year`=:secyear,
            `last`=:last,
            `last-year`=:lastyear
            WHERE student_id = :id ";
            $stmt = $this->conn->prepare($student_update);

               // $primary,$priyear,$secondary,$secyear,$last,$lastyear

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':middlename', $middlename);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':suffix', $suffix);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':bod', $bod);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':number', $number);
            $stmt->bindParam(':street', $street);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':province', $province);
            $stmt->bindParam(':country', $country);
            $stmt->bindParam(':zipcode', $zipcode);

            $stmt->bindParam(':ffirstname', $ffirstname);
            $stmt->bindParam(':fmiddlename', $fmiddlename);
            $stmt->bindParam(':flastname', $flastname);
            $stmt->bindParam(':fsuffix', $fsuffix);
            $stmt->bindParam(':foccupation', $foccupation);

            $stmt->bindParam(':mfirstname', $mfirstname);
            $stmt->bindParam(':mmiddlename', $mmiddlename);
            $stmt->bindParam(':mlastname', $mlastname);
            $stmt->bindParam(':msuffix', $msuffix);
            $stmt->bindParam(':moccupation', $moccupation);

            $stmt->bindParam(':admissiontype', $admissiontype);
            $stmt->bindParam(':course', $course);
            $stmt->bindParam(':gnumber', $gnumber);

         
            $stmt->bindParam(':primary', $primary);
            $stmt->bindParam(':priyear', $priyear);
            $stmt->bindParam(':secondary', $secondary);
            $stmt->bindParam(':secyear', $secyear);
            $stmt->bindParam(':last', $last);
            $stmt->bindParam(':lastyear', $lastyear);

            $stmt->execute();  


            $update_enrollment = "UPDATE `tbl_enrollment` SET `Section`=:section,`Year`=:year,`Sem`= :semester WHERE enrollment_id = :enrollment_id ";
            $stmt1 = $this->conn->prepare($update_enrollment);
            $stmt1->bindParam(':enrollment_id',$enrollment_id);
            $stmt1->bindParam(':year', $year);
            $stmt1->bindParam(':section', $section);
            $stmt1->bindParam(':semester', $semester);
            $stmt1->execute();  
            return 200;
            $this->conn = null;


        }


        
        // select all course

        public function Select_Course(){

            $student_record = "SELECT * FROM tbl_course";
            $stmt = $this->conn->prepare($student_record);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data;
            $this->conn = null;


        }

        // select section

        
        public function Select_Section(){

            $student_record = "SELECT * FROM tbl_section";
            $stmt = $this->conn->prepare($student_record);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data;
            $this->conn = null;


        }

        public function Select_Cor(){

            $student_record = "SELECT * FROM (SELECT * FROM tbl_student_info WHERE Student_Type = 'E' ) tbl_student_info
            INNER JOIN (SELECT enrollment_id,student_id,date,Year,Sem,Remark,Cor,
            @Sid:= Section as Section,
            (SELECT `section_name` from tbl_section where section_id = @Sid) as section_name,
            (SELECT `schedule_id` from tbl_section where section_id = @Sid) as schedule_id
             FROM tbl_enrollment order by date desc ) 
             tbl_enrollment on tbl_student_info.student_id = tbl_enrollment.student_id group by tbl_student_info.student_id
             
             ";
            $stmt = $this->conn->prepare($student_record);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data;
            $this->conn = null;


        }

        public function Get_Cor($id,$id_enroll){

            $show_cor = " SELECT * FROM (SELECT * FROM tbl_schedule where schedule_id = :id) tbl_schedule JOIN
            (SELECT schedule_id,
                    schedule_day_id,
                    day,
                    time_in,
                    time_out,
                    @sid:= subject as subject,
                    (SELECT `subject_name` from tbl_subject where subject_id = @sid) as subject_name,
                    (SELECT `subject_code` from tbl_subject where subject_id = @sid) as subject_code,
                    (SELECT `subject_description` from tbl_subject where subject_id = @sid) as subject_description,
                    (SELECT `subject_unit` from tbl_subject where subject_id = @sid) as subject_unit
             from tbl_schedule_day WHERE schedule_id = :id ) tbl_schedule_day on tbl_schedule.schedule_id = tbl_schedule_day.schedule_id";
            $stmt = $this->conn->prepare($show_cor);
            $stmt->bindParam(':id',$id);
            $stmt->execute(); 
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        

            $update_cor_status = "UPDATE `tbl_enrollment` SET `Cor`='Generated' WHERE enrollment_id = :id_enroll";
            $stmt1 = $this->conn->prepare($update_cor_status);
            $stmt1->bindParam(':id_enroll',$id_enroll);
            $stmt1->execute(); 

            return $data;
            $this->conn = null;


              
        }



    


    
}






?>