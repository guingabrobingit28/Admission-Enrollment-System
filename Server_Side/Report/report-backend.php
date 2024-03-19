<?php 
include "../../Connection/connection.php";

class Report extends DatabaseConnection{
        public function Insert_Report($report,$year,$sem,$gender,$section){

        $insert_post = "INSERT INTO `tbl_reports`(`report_title`,`year`,`Semester`,`gender`,`section`) VALUES (:report,:year,:sem,:gender,:section)";
        $stmt = $this->conn->prepare($insert_post);
        $stmt->bindParam(':report', $report);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':sem', $sem);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':section', $section);
        
        $stmt->execute();
        return 200;
        $this->conn = null;
          
    }

    public function Show_Report(){

        $show_post = "SELECT report_id , report_title , year , Semester ,gender , section , date ,
        @Sid:= section as section,
        (SELECT `section_name` from tbl_section where section_id = @Sid) as section_name 
        
        FROM `tbl_reports` order by date ASC";
        $stmt = $this->conn->prepare($show_post);
        $stmt->execute(); 
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;
        $this->conn = null;
          
    }

    // male or female
    public function Show_Pending_admission($gender){

        $admissiom_list = "SELECT * FROM (SELECT * FROM tbl_admission order by date ASC ) tbl_admission 
        JOIN (SELECT * FROM tbl_student_info WHERE Student_Type = 'NE' AND gender = :gender ) tbl_student_info on tbl_admission.id = tbl_student_info.student_id GROUP BY tbl_admission.id";
        $stmt = $this->conn->prepare($admissiom_list);
        $stmt->bindParam(':gender', $gender);
        $stmt->execute(); 
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
        
        return $data;
        $this->conn = null;
          
        }

    // all admission

    public function Show_Pending_admission_all(){

        $admissiom_list = "SELECT * FROM (SELECT * FROM tbl_admission order by date ASC ) tbl_admission 
        JOIN (SELECT * FROM tbl_student_info WHERE Student_Type = 'NE') tbl_student_info on tbl_admission.id = tbl_student_info.student_id GROUP BY tbl_admission.id";
        $stmt = $this->conn->prepare($admissiom_list);
        $stmt->execute(); 
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
        
        return $data;
        $this->conn = null;
          
        }

    // all enrolled student

    public function Show_Enrolled_Students_by_section($year,$sem,$section){

        $enrollment_list = "SELECT * FROM (SELECT Year , Sem , student_id , date ,
        @Sid:= Section as Section,
        (SELECT `section_name` from tbl_section where section_id = @Sid) as section_name 
        
        FROM tbl_enrollment WHERE Year = :year  And Sem = :sem AND section = :section order by date ASC ) tbl_enrollment 
        JOIN (SELECT * FROM tbl_student_info WHERE Student_Type = 'E') tbl_student_info on tbl_enrollment.student_id = tbl_student_info.student_id GROUP BY tbl_enrollment.student_id";
        $stmt = $this->conn->prepare($enrollment_list);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':sem', $sem);
        $stmt->bindParam(':section', $section);
        $stmt->execute(); 
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
        
        return $data;
        $this->conn = null;
          
        }

        public function Show_Enrolled_Students_all($year,$sem){

            $enrollment_list = "SELECT * FROM (SELECT Year , Sem , student_id , date ,
            @Sid:= Section as Section,
            (SELECT `section_name` from tbl_section where section_id = @Sid) as section_name
            
            FROM tbl_enrollment WHERE Year = :year  And Sem = :sem order by date ASC ) tbl_enrollment 
            JOIN (SELECT * FROM tbl_student_info WHERE Student_Type = 'E') tbl_student_info on tbl_enrollment.student_id = tbl_student_info.student_id GROUP BY tbl_enrollment.student_id";
            $stmt = $this->conn->prepare($enrollment_list);
            $stmt->bindParam(':year', $year);
            $stmt->bindParam(':sem', $sem);
            $stmt->execute(); 
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
            
            return $data;
            $this->conn = null;
              
            }

        public function Show_Enrolled_Students_gender($year,$sem,$gender){

            $enrollment_list = "SELECT * FROM (SELECT Year ,Sem ,student_id ,date,
            @Sid:= Section as Section,
            (SELECT `section_name` from tbl_section where section_id =  @Sid ) as section_name
            FROM tbl_enrollment WHERE Year = :year  And Sem = :sem  order by date ASC ) tbl_enrollment 
            JOIN (SELECT * FROM tbl_student_info WHERE Student_Type = 'E' AND gender = :gender ) tbl_student_info on tbl_enrollment.student_id = tbl_student_info.student_id GROUP BY tbl_enrollment.student_id";
            $stmt = $this->conn->prepare($enrollment_list);
            $stmt->bindParam(':year', $year);
            $stmt->bindParam(':sem', $sem);
            $stmt->bindParam(':gender', $gender);
            $stmt->execute(); 
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
            
            return $data;
            $this->conn = null;
              
            }

            public function Show_Enrolled_Students_gender_section($year,$sem,$gender,$section){

                $enrollment_list = "SELECT * FROM (SELECT Year ,Sem ,student_id ,date,
                Section
                FROM tbl_enrollment WHERE Year = :year  And Sem = :sem AND Section = :section  order by date ASC ) tbl_enrollment 
                JOIN (SELECT * FROM tbl_student_info WHERE Student_Type = 'E' AND gender = :gender ) tbl_student_info on tbl_enrollment.student_id = tbl_student_info.student_id GROUP BY tbl_enrollment.student_id";
                $stmt = $this->conn->prepare($enrollment_list);
                $stmt->bindParam(':year', $year);
                $stmt->bindParam(':sem', $sem);
                $stmt->bindParam(':gender', $gender);
                $stmt->bindParam(':section', $section);

                $stmt->execute(); 
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            
                
                return $data;
                $this->conn = null;
                  
                }

    //get specific section

    public function specific_section($section){

        $section_list = "SELECT section_id , section_name as section FROM tbl_section where section_id = :section";
        $stmt = $this->conn->prepare($section_list);
        $stmt->bindParam(':section', $section);
        $stmt->execute(); 
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $data;
        $this->conn = null;

       

    }


    public function Show_Section(){

        $section_list = "SELECT * FROM tbl_section ";
        $stmt = $this->conn->prepare($section_list);
        $stmt->execute(); 
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $data;
        $this->conn = null;



    }



    


    public function Delete_Report($id){

        $delete_report = "DELETE FROM `tbl_reports` WHERE report_id = $id ";
        $stmt = $this->conn->prepare($delete_report);
        $stmt->execute(); 

        return 200;
        $this->conn = null;
          
    }
    

 


    
}








?>