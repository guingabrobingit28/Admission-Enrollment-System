<?php 
include "../../Connection/connection.php";

class Schedule extends DatabaseConnection{
    public function Insert_Schedule($name,$day,$subject,$time_in,$time_out){

        $insert_sched = "INSERT INTO `tbl_schedule`(`schedule_name`) VALUES (:name)";
        $stmt = $this->conn->prepare($insert_sched);
        $stmt->bindParam(':name', $name);
       
        
        $stmt->execute();
        $id = $this->conn->lastInsertId();


        $insert_day = "INSERT INTO `tbl_schedule_day`(`schedule_id`,`subject`, `day`, `time_in`, `time_out`) VALUES (:id,:subject,:day,:time_in,:time_out)";
        $stmt2 = $this->conn->prepare($insert_day);
        
        for ($i = 0; $i < count($day); $i++) {
            $stmt2->bindParam(':id', $id);
            $stmt2->bindParam(':day', $day[$i]);
            $stmt2->bindParam(':subject', $subject[$i]);
            $stmt2->bindParam(':time_in', $time_in[$i]);
            $stmt2->bindParam(':time_out', $time_out[$i]);
        
            // Execute the query
            $stmt2->execute();
        }

        return 200 ;
        $this->conn = null;
          
    }

    public function Show_Schedule(){

        $show_sched= " SELECT * FROM tbl_schedule ";
        $stmt = $this->conn->prepare($show_sched);
        $stmt->execute(); 
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;
        $this->conn = null;
          
    }

    public function Show_Subject(){

        $show_sched= " SELECT * FROM tbl_subject ";
        $stmt = $this->conn->prepare($show_sched);
        $stmt->execute(); 
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;
        $this->conn = null;
          
    }

    public function Update_Course($course_title,$course_description,$course_id){

        $update_course = "UPDATE `tbl_course` SET `course_name`=:course_title,`course_description`=:course_description WHERE course_id = :course_id";
        $stmt = $this->conn->prepare($update_course);
        $stmt->bindParam(':course_id',$course_id);
        $stmt->bindParam(':course_description', $course_description);
        $stmt->bindParam(':course_title', $course_title);
        $stmt->execute(); 

        return 200;
        $this->conn = null;
          
    }

    
    public function Delete_Schedule($id){

        $delete_schedule = "DELETE FROM `tbl_schedule` WHERE schedule_id = :id";
        $stmt = $this->conn->prepare($delete_schedule);
        $stmt->bindParam(':id',$id);
        $stmt->execute(); 

        $delete2 = "DELETE FROM `tbl_schedule_day` WHERE schedule_id = :id";
        $stmt2 = $this->conn->prepare($delete2);
        $stmt2->bindParam(':id',$id);
        $stmt2->execute(); 

        return 200;
        $this->conn = null;
          
    }

    public function View_Schedule($id){

        $show_sched= " SELECT * FROM (SELECT * FROM tbl_schedule where schedule_id = :id) tbl_schedule JOIN
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
        $stmt = $this->conn->prepare($show_sched);
        $stmt->bindParam(':id',$id);
        $stmt->execute(); 
        
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;
        $this->conn = null;
          
    }

    public function Update_Schedule($id,$time_in,$time_out){

        $time_one = date('H:i:s.u',strtotime($time_in));
        $time_two = date('H:i:s.u',strtotime($time_out));

        $show_sched= "UPDATE `tbl_schedule_day` SET `time_in`= :time_one,`time_out`= :time_two WHERE schedule_day_id = :id";
        $stmt = $this->conn->prepare($show_sched);
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':time_one',$time_one);
        $stmt->bindParam(':time_two',$time_two);
        $stmt->execute(); 
        
        return 200;
        $this->conn = null;




    }
    

 


    
}








?>