<?php 
include "../../Connection/connection.php";

class Schedule extends DatabaseConnection{
       
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